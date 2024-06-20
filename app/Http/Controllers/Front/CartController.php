<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $global = 0;
        foreach ($cart as $item) {
            $global += $item['price'] * $item['quantity'];
        }
        $session = collect(session()->get('cart', []));
        $product_ids = $session->pluck('id')->toArray();
        $items = Product::whereIn('id', $product_ids)->get();

        return view('front.cart', ['items' => $items, 'global' => $global]);
    }

    public function store(Request $request)
    {
        $product_id = $request->product;
        $cart = session()->get('cart', []);

        $quantity = $request->quantity;
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] =  $quantity;
            $price = $cart[$product_id]['price'];
            $msg = __('show_toast');
        } else {
            $product = Product::find($product_id);
            $cart[$product_id] = [
                "id" => $product_id,
                "quantity" => $quantity,
                "price" => $product->price,
            ];
            $price = $product->price;
            $msg = __('set_number');
        }

        session()->put('cart', $cart);
        $cart_items = count($cart);
        $status = true;
        return response()->json(compact('status', 'msg', 'cart_items', 'price'));
    }

    public function destroy(Request $request)
    {
        $product_id = $request->product;
        $cart = session()->get('cart', []);
        unset($cart[$product_id]);
        session()->put('cart', $cart);
        $cart_items = count($cart);
        $session = collect(session()->get('cart', []));
        $product_ids = $session->pluck('id')->toArray();
        $items = Product::whereIn('id', $product_ids)->get();
        $msg = 'delete';
        $status = true;
        $view = view('front.products_cart', ['items' => $items])->render();
        return response()->json(compact('status', 'msg', 'cart_items', 'view'));
    }
}
