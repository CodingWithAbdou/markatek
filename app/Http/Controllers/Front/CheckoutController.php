<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Place;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\FatoorahServices;

class CheckoutController extends Controller
{
    private $fatoorahServices;
    public function __construct(FatoorahServices $fatoorahServices)
    {
        $this->fatoorahServices = $fatoorahServices;
    }

    public function index()
    {
        $places = Place::orderBy('order_by', 'asc')->get();
        $sub_total = collect(session()->get('cart', []))->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        $total = $sub_total + $places->first()->delivery_price;
        return view('front.checkout', compact('places', 'sub_total', 'total'));
    }

    public function store(CheckoutRequest $request)
    {
        $input = $request->validated();
        unset($input['terms']);

        $session = collect(session()->get('cart', []));
        $productIds = $session->pluck('id')->toArray();
        $quantities = $session->pluck('quantity')->toArray();
        $totalCost = 0;
        $products = Product::whereIn('id', $productIds)->get();
        for ($i = 0; $i < count($products); $i++) {
            $totalCost += $products[$i]->price * $quantities[$i];
        }
        $input['real_cost'] = $totalCost;

        $input['delivery_cost'] = Place::find($input['place_id'])->delivery_price;

        if ($request->coupon) {
            $coupon = Coupon::where('code', $request->coupon)->first();
            $session = collect(session()->get('cart', []));
            $productIds = $session->pluck('id')->toArray();
            if ($coupon && $coupon->status == 1 && $coupon->code === $request->coupon && $coupon->expired_at > now() && $coupon->usage_limit > 0 && in_array($coupon->product_id, $productIds)) {
                $product_price = Product::find($coupon->product_id)->first()->price;
                $input['coupon_discount'] = round($product_price /  $coupon->discount);
            } else {
                $input['coupon_discount'] = 0;
            }
        } else {
            $input['coupon_discount'] = 0;
        }
        $input['total_cost'] = $input['real_cost'] + $input['delivery_cost'] - $input['coupon_discount'];

        if ($input['paymanet-method'] == 'credit_card')  $paymentMethodId = 2;
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
            }
            $msg = 'change_url';
            $url = $response['Data']['PaymentURL'];
            $status = 'success';
            return response()->json(compact('status', 'msg', 'url'));
        }
    }

    public function error(Request $request)
    {
        return $request;
    }

    public function callback(Request $request)
    {
        $data = [
            'Key'     => $request->paymentId,
            'KeyType' => 'paymentId'
        ];
        $response = $this->fatoorahServices->getPaymentStatus($data);
        return $response;
        if (!isset($response->Data->InvoiceId)) {
            return response()->json(["error" => 'error', 'status' => false], 404);
        }
        $InvoiceId =  $response->Data->InvoiceId; // get your order by payment_id
        if ($response->IsSuccess == true) {
            // if ($response->Data->InvoiceStatus == "Paid") //||$response->Data->InvoiceStatus=='Pending'
            // if ($your_order_total_price == $response->Data->InvoiceValue) {

            /**
             *
             * The payment has been completed successfully. You can change the status of the order
             *
             */
            // }
        }

        // return response()->json(["error" => 'error', 'status' => false], 404);
    }








    public function applyCopoun(Request $request)
    {
        $this->validate($request, [
            'coupon' => 'required|min:4|max:191|string'
        ]);
        $coupon = Coupon::where('code', $request->coupon)->first();
        $session = collect(session()->get('cart', []));
        $productIds = $session->pluck('id')->toArray();
        if ($coupon && $coupon->status == 1 && $coupon->code === $request->coupon && $coupon->expired_at > now() && $coupon->usage_limit > 0 && in_array($coupon->product_id, $productIds)) {
            $product_price = Product::find($coupon->product_id)->first()->price;
            $msg = 'coupon_applied';
            $discount = round($product_price /  $coupon->discount);
        } else {
            $msg = 'coupon_not_applied';
            $discount = 0;
        }
        $status = 'success';
        return response()->json(
            compact('status', 'msg', 'discount')
        );
    }
}
