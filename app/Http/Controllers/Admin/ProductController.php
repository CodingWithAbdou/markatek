<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
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


    public function create()
    {
        return view('admin.products.form');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->except('images');
        $data['cover_path'] = generalUpload('Product', $request->cover_path);
        $product = Product::create($data);

        if ($request->images) {

            foreach ($request->images as $image) {
                $product->images()->create([
                    'product_id' => $product->id,
                    'path' => generalUpload('Product', $image)
                ]);
            }
        }


        $status = true;
        $msg = __('dash.created successfully');
        $url = route('dashboard.' . $this->model->route_key . '.index');

        return response()->json(compact('status', 'msg', 'url'));
    }

    public function edit(Product $obj)
    {
        return view('admin.categories.form', ['data' => $obj]);
    }

    public function update(ProductRequest $request, Product $obj)
    {

        $data = $request->all();
        if ($request->cover_path) {
            $data['cover_path'] = generalUpload("Product", $request->cover_path);
        } else {
            $data['cover_path'] = $obj->cover_path;
        }
        $obj->update($data);

        $status = true;
        $msg = __('dash.updated successfully');
        $url = route('dashboard.' . $this->model->route_key . '.index');

        return response()->json(compact('status', 'msg', 'url'));
    }

    public function destroy(Request $request, Product $obj)
    {
        try {
            $obj->delete();
            $status = true;
            $msg = __('dash.deleted_successfully');
        } catch (\Exception $e) {
            $status = false;
            $msg = $e->getMessage();
        }
        return response()->json(compact('status', 'msg'));
    }
}
