<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\CouponApplayRequest;
use App\Mail\OrderMail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Place;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\FatoorahServices;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    private $fatoorahServices;
    public function __construct(FatoorahServices $fatoorahServices)
    {
        $this->fatoorahServices = $fatoorahServices;
    }

    public function calcSubTotal()
    {
        $session = collect(session()->get('cart', []));
        $productIds = $session->pluck('id')->toArray();
        $quantities = $session->pluck('quantity')->toArray();
        $subtotalCost = 0;
        $products = Product::whereIn('id', $productIds)->get();

        for ($i = 0; $i < count($session); $i++) {
            $subtotalCost += Product::where('id', $productIds[$i])->first()->price * $quantities[$i];
        }
        return $subtotalCost;
    }

    public function index()
    {
        $places = Place::orderBy('order_by', 'asc')->get();

        $sub_total = $this->calcSubTotal();
        if ($sub_total == 0) return abort(404);
        return view('front.checkout', compact('places', 'sub_total'));
    }

    public function store(CheckoutRequest $request)
    {
        $input = $request->validated();
        // unset($input['terms']);
        unset($input['full_phone']);
        unset($input['coupon_applay']);
        $session = collect(session()->get('cart', []));
        $input['real_cost'] = $this->calcSubTotal();
        $input['delivery_cost'] = Place::find($input['place_id'])->delivery_price;

        if ($request->coupon) {
            $coupon = Coupon::where('code', $request->coupon)->first();
            $productIds = $session->pluck('id')->toArray();
            if (
                $request->coupon_applay == 1 && $coupon
                && $coupon->status == 1
                && $coupon->code === $request->coupon
                && $coupon->expired_at > now()
                &&  $coupon->used_at < now()
                && $coupon->usage_limit > 0
                && in_array($coupon->product_id, $productIds)
            ) {
                $product_price = Product::find($coupon->product_id)->first()->price;
                $discount = 0;
                if ($coupon->type_discount == 'direct')
                    $discount = $coupon->value_discount;
                else
                    $discount = number_format(($product_price *  $coupon->value_discount) / 100, 3);

                $input['coupon_discount'] =  $discount;
            } else {
                $input['coupon_discount'] = 0;
            }
        } else {
            $input['coupon_discount'] = 0;
        }
        if ($request->coupon_applay == 0) {
            $input['coupon'] = null;
            $input['coupon_discount'] = 0;
        }

        $input['total_cost'] = $input['real_cost'] + $input['delivery_cost'] - $input['coupon_discount'];

        if ($input['payment_method'] == 'credit_card')  $paymentMethodId = 2;
        else $paymentMethodId = 1;

        $data = [
            "PaymentMethodId" => $paymentMethodId,
            "InvoiceValue" => $input['total_cost'],
            "Language" => getLocale(),
            "CalLBackUrl" => route('fatoorah.callback'),
            "Errorurl" => route('fatoorah.error'),
            "DisplayCurrencyIso" => "KWD",
        ];
        $response = $this->fatoorahServices->executePayment($data);

        if (isset($response['IsSuccess'])) {
            if ($response['IsSuccess'] == true) {
                $InvoiceId  = $response['Data']['InvoiceId']; // save this id with your order table
                $InvoiceURL = $response['Data']['PaymentURL'];
                $input['InvoiceId'] = $InvoiceId;
            }
            $msg = 'change_url';
            $url = $response['Data']['PaymentURL'];
            $status = 'success';
        } else {
            $msg = 'dont_change_url';
            $url = '/';
            $status = 'error';
        }
        $input['unique_id'] = session()->get('unique_id');
        if (Order::where('unique_id', $input['unique_id'])->exists() and Order::where('unique_id', $input['unique_id'])->where('payment_status', 'unpaid')->exists()) {
            Order::where('unique_id', $input['unique_id'])->delete();
        }
        $input['phone'] = $request->full_phone;
        Order::create($input);
        return response()->json(compact('status', 'msg', 'url'));
    }

    public function error(Request $request)
    {
        return view('front.error_paid');
    }

    public function callback(Request $request)
    {
        $data = [
            'Key'     => $request->paymentId,
            'KeyType' => 'paymentId'
        ];
        $response = $this->fatoorahServices->getPaymentStatus($data);
        $InvoiceId = $response['Data']['InvoiceId'];
        if ($response['IsSuccess'] == "true" and Order::where('InvoiceId', $InvoiceId)->exists()) {
            if (Order::where('InvoiceId', $InvoiceId)->where('payment_status', 'unpaid')->exists()) {
                $order = Order::where('InvoiceId', $InvoiceId)->first();
                $order->update([
                    'PaymentId' =>  $response['Data']['InvoiceTransactions'][0]['PaymentId'],
                    'TransactionDate' =>  $response['Data']['InvoiceTransactions'][0]['TransactionDate'],
                    'payment_status' => 'paid',
                    'status' => "pending"
                ]);
                if ($order->coupon != null) {
                    $coupon = Coupon::where('code', $order->coupon)->first();
                    $coupon->update([
                        'usage_limit' => $coupon->usage_limit - 1
                    ]);
                }
                $session = collect(session()->get('cart', []));
                $productIds = $session->pluck('id')->toArray();
                $quantities = $session->pluck('quantity')->toArray();
                for ($i = 0; $i < count($productIds); $i++) {
                    $order->products()->attach($productIds[$i], ['quantity' => $quantities[$i]]);
                    Product::find($productIds[$i])->update([
                        'quantity' => Product::find($productIds[$i])->quantity - $quantities[$i] > 0 ? Product::find($productIds[$i])->quantity - $quantities[$i] : 0
                    ]);
                }
                if ($order->email) {
                    Mail::to($order->email)->send(new OrderMail($order));
                }

                session()->forget(['cart', 'unique_id']);
                return view('front.success_paid', compact('order'));
            } else {
                return redirect()->route('main');
            }
        }
    }
}
