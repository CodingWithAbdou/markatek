<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $places = Place::orderBy('order_by', 'asc')->get();
        return view('front.checkout', compact('places'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
    }

    // public function apply(Request $request)
    // {

    // }
}
