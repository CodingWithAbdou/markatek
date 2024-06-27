<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use App\Models\ProjectModel;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = ProjectModel::where('route_key', 'coupons')->first();
        view()->share('model', $this->model);
    }

    public function index()
    {
        $data = Coupon::orderBy('created_at', 'desc')->get();
        return view('admin.coupons.index', compact('data'));
    }

    public function create()
    {
        $array = [['value' => "direct", 'name' => __('dash.discount_$')], ['value' => "percent", 'name' => __('dash.discount_%')]];
        return view('admin.coupons.form', compact('array'));
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
        $array = [['value' => "direct", 'name' => __('dash.discount_$')], ['value' => "percent", 'name' => __('dash.discount_%')]];

        return view('admin.coupons.form', ['data' => $obj, 'array' => $array]);
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
