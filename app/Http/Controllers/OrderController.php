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
        $data = Order::where('payment_status', 'paid')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('data'));
    }
}
