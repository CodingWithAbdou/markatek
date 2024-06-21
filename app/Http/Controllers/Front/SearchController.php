<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'search' => 'required|string|min:3|max:12|regex:/^[\p{L}\s]+$/u'
        ]);
        $search = $request->search;
        $products = Product::where('name_' . getLocale(), 'like', '%' . $search . '%')->get();

        return view('front.search', compact('products', 'search'));
    }


    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required|string|min:3|max:12|regex:/^[\p{L}\s]+$/u'
        ]);
        $url = route('search.index', ['search' =>  $request->search]);
        return response()->json(compact('url'));
    }
}
