<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\ProjectModel;
use App\Http\Requests\BaanerRequest;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public $model;
    public function __construct()
    {
        $this->model = ProjectModel::where('route_key', 'banners')->first();
        view()->share('model', $this->model);
    }

    public function index()
    {
        $data = Banner::orderBy('created_at', 'desc')->get();
        return view('admin.banners.index', compact('data'));
    }

    public function create()
    {
        return view('admin.banners.form');
    }

    public function store(BaanerRequest $request)
    {
        $data =  $request->validated();
        $data['image_path'] = generalUpload('Banner', $request->image_path);
        Banner::create($data);

        $status = true;
        $msg = __('dash.created successfully');
        $url = route('dashboard.' . $this->model->route_key . '.index');

        return response()->json(compact('status', 'msg', 'url'));
    }

    public function edit(Banner $obj)
    {
        return view('admin.banners.form', ['data' => $obj]);
    }

    public function update(BaanerRequest $request, Banner $obj)
    {
        $data =  $request->validated();
        if ($request->image_path)
            $data['image_path'] = generalUpload('Banner', $request->image_path);
        else   $data['image_path'] = $obj->image_path;

        $obj->update($data);

        $status = true;
        $msg = __('dash.created successfully');
        $url = route('dashboard.' . $this->model->route_key . '.index');

        return response()->json(compact('status', 'msg', 'url'));
    }
    public function destroy(Request $request, Banner $obj)
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
