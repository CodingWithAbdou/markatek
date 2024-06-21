<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponApplayRequest;
use App\Models\Coupon;
use App\Models\Place;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutEventController extends Controller
{

    public function applyCopoun(CouponApplayRequest  $request)
    {
        $coupon = Coupon::where('code', $request->coupon)->first();
        $session = collect(session()->get('cart', []));
        $productIds = $session->pluck('id')->toArray();
        if ($coupon && $coupon->status == 1 && $coupon->code === $request->coupon && $coupon->expired_at > now() &&  $coupon->used_at < now() && $coupon->usage_limit > 0 && in_array($coupon->product_id, $productIds)) {
            $product_price = Product::find($coupon->product_id)->first()->price;
            $msg = 'coupon_applied';
            $discount = floor(($product_price *  $coupon->discount) / 100);
        } else {
            $msg = 'coupon_not_applied';
            $discount = 0;
        }
        $status = 'success';
        return response()->json(
            compact('status', 'msg', 'discount')
        );
    }
    public function getPlace(Request $request)
    {
        $this->validate($request, [
            'place' => 'required|integer'
        ]);
        $delivery_price = Place::find($request->place)->delivery_price;
        return response()->json(compact('delivery_price'));
    }


    public function changePlace(Request $request)
    {
        $this->validate($request, [
            'place' => 'required|integer'
        ]);
        $delivery_price = Place::find($request->place)->delivery_price;
        $name_place = Place::find($request->place)->{'name_' . getLocale()};
        return response()->json(compact('delivery_price', 'name_place'));
    }
}
