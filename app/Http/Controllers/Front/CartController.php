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
        $product_ids = $session->where('quantity', '>', 0)->pluck('id')->toArray();

        $items = Product::whereIn('id', $product_ids)->get();

        return view('front.cart', ['items' => $items, 'global' => $global]);
    }

    public function store(Request $request)
    {
        $product_id = $request->product;
        $cart = session()->get('cart', []);

        $quantity = $request->quantity;
        $product = Product::find($product_id);

        if (isset($cart[$product_id])) {
            if ($product->quantity < $quantity) {
                $status = false;
                $msg = __('not_enough');
                return response()->json(compact('status', 'msg'));
            }
            if ($quantity != 0) {
                $cart[$product_id]['quantity'] =  $quantity;
                $price = $cart[$product_id]['price'];
            } else {
                $price = 0;
            }
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
        $global = $this->calcGlobalTotla();
        $view = view('front.products_cart', ['items' => $items])->render();
        return response()->json(compact('status', 'msg', 'cart_items', 'view', 'global'));
    }

    public function calcGlobalTotla()
    {
        $session = collect(session()->get('cart', []));
        $productIds = $session->pluck('id')->toArray();
        $quantities = $session->pluck('quantity')->toArray();
        $global = 0;
        $products = Product::whereIn('id', $productIds)->get();

        for ($i = 0; $i < count($session); $i++) {
            $global += Product::where('id', $productIds[$i])->first()->price * $quantities[$i];
        }
        return $global;
    }
}
