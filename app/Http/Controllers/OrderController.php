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

    public function create()
    {
        return view('admin.orders.form');
    }

    public function store(CouponRequest $request)
    {
        $data =  $request->validated();
        Coupon::create($data);

        $status = true;
        $msg = __('dash.created successfully');
        $url = route('dashboard.' . $this->model->route_key . '.index');

        return response()->json(compact('status', 'msg', 'url'));
    }

    public function edit(Coupon $obj)
    {
        return view('admin.coupons.form', ['data' => $obj]);
    }

    public function update(CouponRequest $request, Coupon $obj)
    {

        $data = $request->validated();
        $obj->update($data);

        $status = true;
        $msg = __('dash.updated successfully');
        $url = route('dashboard.' . $this->model->route_key . '.index');

        return response()->json(compact('status', 'msg', 'url'));
    }

    public function destroy(Request $request, Coupon $obj)
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
