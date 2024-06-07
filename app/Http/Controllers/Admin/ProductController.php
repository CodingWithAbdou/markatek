<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProjectModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = ProjectModel::where('route_key', 'products')->first();
        view()->share('model', $this->model);
    }

    public function index()
    {
        $data = Product::orderBy('created_at', 'desc')->get();
        return view('admin.products.index', compact('data'));
    }
}
