<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function products(Category $category)
    {
        $products = $category->products()->where('quantity', '>', 0)->get();
        return view('front.products', compact('category', 'products'));
    }
}
