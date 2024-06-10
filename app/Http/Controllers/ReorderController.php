<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\ProjectModel;
use Illuminate\Http\Request;

class ReorderController extends Controller
{
    public function index(Request $request, $segment, $id = 0)
    {
        $model = ProjectModel::where('route_key', $segment)->first();
        if (!$model) {
            abort(403);
        }
        $list  = $model->model_name::orderBy('order_by', 'asc')->get();
        return view('admin.reorder-items.reorder', compact('list', 'model'));
    }

    public function update(Request $request)
    {
        $itemIds = $request->idList;
        $orderIds = $request->orderList;
        $model = ProjectModel::where('route_key', $request->segment)->first();
        if (!$model) {
            abort(403);
        }

        if (!empty($itemIds) && !empty($orderIds)) {
            for ($i = 0; $i < sizeof($itemIds); $i++) {
                $found = $model->model_name::query()->where('id', $itemIds[$i])->first();
                if (!empty($found)) {
                    $found->update(['order_by' => $orderIds[$i]]);
                }
            }
            $status = true;
            $msg = __('dash.updated successfully');
            return response()->json(compact('status', 'msg'));
        } else {
            $status = false;
            $msg = __('dash.something wrong');
            return response()->json(compact('status', 'msg'));
        }
    }
}
