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

        return view('front.cart', ['items' => $cart, 'global' => $global]);
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
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "description" => $product->description,
                "image" => $product->cover_path
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
        $msg = 'delete';
        $status = true;
        $view = view('front.products_cart', ['items' => $cart])->render();
        return response()->json(compact('status', 'msg', 'cart_items', 'view'));
    }
}
