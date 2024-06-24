<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrackRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {
        return view('front.track');
    }

    public function search(TrackRequest $request)
    {

        $track = $request->validated();
        $order = Order::where('InvoiceId', $track)->first();
        if (!$order) {
            $msg = 'not_found';
            $status_order = 'not_found';
        } else {
            $msg = 'show_status';
            $status_order = $order->status;
        }
        return response()->json(compact('msg', 'status_order'));
    }
}
