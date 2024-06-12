<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('order_by', 'asc')->get();
        $categories = Category::orderBy('order_by', 'asc')->get();
        $products = Product::orderBy('order_by', 'asc')->get();
        return view('front.home', compact('banners', 'categories', 'products'));
    }
}
