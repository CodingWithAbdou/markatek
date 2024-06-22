<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProjectModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = ProjectModel::where('route_key', 'orders')->first();
        view()->share('model', $this->model);
    }

    public function index()
    {
        $data = Order::orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('data'));
    }

    public function edit(Order $obj)
    {
        $array = [['value' => "pending", 'name' => __('front.pending')], ['value' => "processing", 'name' => __('front.processing')], ['value' => "completed", 'name' => __('front.completed')], ['value' => "cancelled", 'name' => __('front.cancelled')]];
        return view('admin.orders.form', ['data' => $obj, 'array' => $array]);
    }

    public function update(Request $request, Order $obj)
    {
        $data = $request->all();
        $obj->update($data);

        $status = true;
        $msg = __('dash.updated successfully');
        $url = route('dashboard.' . $this->model->route_key . '.index');

        return response()->json(compact('status', 'msg', 'url'));
    }


    public function destroy(Request $request, Order $obj)
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
