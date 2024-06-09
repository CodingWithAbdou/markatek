<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Models\Place;
use App\Models\ProjectModel;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public $model;
    public function __construct()
    {
        $this->model = ProjectModel::where('route_key', 'places')->first();
        view()->share('model', $this->model);
    }

    public function index()
    {
        $data = Place::orderBy('created_at', 'desc')->get();
        return view('admin.places.index', compact('data'));
    }

    public function create()
    {
        return view('admin.places.form');
    }

    public function store(PlaceRequest $request)
    {
        $data =  $request->validated();
        $data['image_path'] = generalUpload('Place', $request->image_path);
        Place::create($data);

        $status = true;
        $msg = __('dash.created successfully');
        $url = route('dashboard.' . $this->model->route_key . '.index');

        return response()->json(compact('status', 'msg', 'url'));
    }

    public function edit(Place $obj)
    {
        return view('admin.places.form', ['data' => $obj]);
    }

    public function update(PlaceRequest $request, Place $obj)
    {

        $data = $request->validated();
        if ($request->image_path) {
            $data['image_path'] = generalUpload("Place", $request->image_path);
        } else {
            $data['image_path'] = $obj->image_path;
        }
        $obj->update($data);

        $status = true;
        $msg = __('dash.updated successfully');
        $url = route('dashboard.' . $this->model->route_key . '.index');

        return response()->json(compact('status', 'msg', 'url'));
    }

    public function destroy(Request $request, Place $obj)
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
