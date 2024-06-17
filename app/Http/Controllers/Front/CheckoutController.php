<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Coupon;
use App\Models\Place;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
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
        $data = $request->except(['coupon', 'terms', 'real_cost', 'coupon_discount', 'delivery_cost', 'total_cost']);
        $session = collect(session()->get('cart', []));
        $productIds = $session->pluck('id')->toArray();
        $quantities = $session->pluck('quantity')->toArray();

        $totalCost = 0;
        $products = Product::whereIn('id', $productIds)->get();
        for ($i = 0; $i < count($products); $i++) {
            $totalCost += $products[$i]->price * $quantities[$i];
        }
        $data['delivery_cost'] = Place::find($data['place_id'])->delivery_price;
        // $data['coupon_discount'] =
        $data['coupon_name'] =
            dd($totalCost);
    }

    public function applyCopoun(Request $request)
    {
        $this->validate($request, [
            'coupon' => 'required|min:4|max:191|string'
        ]);
        $coupon = Coupon::where('code', $request->coupon)->first();

        if ($coupon && $coupon->status == 1 && $coupon->code === $request->coupon) {
            $msg = 'coupon_applied';
            $discount = $coupon->discount;
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
