<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\ProjectModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $model;
    public function __construct()
    {
        $this->model = ProjectModel::where('route_key', 'categories')->first();
        view()->share('model', $this->model);
    }

    public function index()
    {
        $data = Category::orderBy('created_at', 'desc')->get();
        return view('admin.categories.index', compact('data'));
    }

    public function create()
    {
        return view('admin.categories.form');
    }

    public function store(CategoryRequest $request)
    {
        $data =  $request->validated();
        $data['image_path'] = generalUpload('Category', $request->image_path);
        Category::create($data);

        $status = true;
        $msg = __('dash.created successfully');
        $url = route('dashboard.' . $this->model->route_key . '.index');

        return response()->json(compact('status', 'msg', 'url'));
    }

    public function edit(Category $obj)
    {
        return view('admin.categories.form', ['data' => $obj]);
    }

    public function update(CategoryRequest $request, Category $obj)
    {

        $data = $request->validated();
        if ($request->image_path) {
            $data['image_path'] = generalUpload("Category", $request->image_path);
        } else {
            $data['image_path'] = $obj->image_path;
        }
        $obj->update($data);

        $status = true;
        $msg = __('dash.updated successfully');
        $url = route('dashboard.' . $this->model->route_key . '.index');

        return response()->json(compact('status', 'msg', 'url'));
    }

    public function destroy(Request $request, Category $obj)
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
