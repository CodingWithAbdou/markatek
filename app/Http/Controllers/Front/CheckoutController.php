<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Coupon;
use App\Models\Place;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $places = Place::orderBy('order_by', 'asc')->get();
        return view('front.checkout', compact('places'));
    }

    public function store(CheckoutRequest $request)
    {
        dd($request->validated());
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
