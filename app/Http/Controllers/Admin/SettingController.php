<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectModel;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = ProjectModel::where('route_key', 'settings')->first();
        view()->share('model', $this->model);
    }

    public function index()
    {
        $setting = Setting::select('*')->get()->sortBy('order_by');
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'website_name_ar' => 'required',
            'website_name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'footer_description_ar' => 'required',
            'footer_description_en' => 'required',
            'keywords' => 'required',
            'logo' => 'nullable|max:' . getMaxSize() . '|mimes:' . acceptImageType(0),
            'favicon' => 'nullable|max:' . getMaxSize() . '|mimes:' . acceptImageType(0),
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'whatsapp' => 'nullable',
            'gmail' => 'nullable',
            'payment_url' => 'required',
            'api_key' => 'required',
            'dir_production' => 'required',
            'dir_category' => 'required',
            'color_site' => 'required',
        ]);


        $inputs = $request->all();
        foreach ($inputs as $index => $value) {
            $setting = Setting::where('setting_key', $index)->first();
            if ($setting) {
                if ($setting->setting_key == 'pdf_file') {
                    if (isset($inputs['pdf_file_name']) && $inputs['pdf_file_name']) {
                        $setting->update([
                            'setting_value' => generalUpload('Setting', $value)
                        ]);
                    } else {
                        $setting->update([
                            'setting_value' => null
                        ]);
                    }
                } else {
                    if ($setting->type_id == 2) {
                        $setting->update([
                            'setting_value' => generalUpload('Setting', $value)
                        ]);
                    } else {
                        $setting->update([
                            'setting_value' => $value
                        ]);
                    }
                }
            }
        }

        $msg = __('dash.updated successfully');
        $request->session()->flash('success', $msg);
        return redirect()->route('dashboard.home');
    }
}
