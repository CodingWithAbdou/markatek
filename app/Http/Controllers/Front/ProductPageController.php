<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function products(Category $category)
    {
        $products = $category->products()->get();
        return view('front.products', compact('category', 'products'));
    }
}
