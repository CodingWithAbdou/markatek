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
        $colors = [
            "248 250 252", "241 245 249", "226 232 240", "203 213 225", "148 163 184", "100 116 139", "71 85 105", "51 65 85", "30 41 59", "15 23 42",
            "249 250 251", "243 244 246", "229 231 235", "209 213 219", "156 163 175", "107 114 128", "75 85 99", "55 65 81", "31 41 55", "17 24 39",
            "250 250 250", "244 244 245", "228 228 231", "212 212 216", "161 161 170", "113 113 122", "82 82 91", "63 63 70", "39 39 42", "24 24 27",
            "250 250 250", "245 245 245", "229 229 229", "212 212 212", "163 163 163", "115 115 115", "82 82 82", "64 64 64", "38 38 38", "23 23 23",
            "250 250 249", "245 245 244", "231 229 228", "214 211 209", "168 162 158", "120 113 108", "87 83 78", "68 64 60", "41 37 36", "28 25 23",
            "254 242 242", "254 226 226", "254 202 202", "252 165 165", "248 113 113", "239 68 68", "220 38 38", "185 28 28", "153 27 27", "127 29 29",
            "255 247 237", "255 237 213", "254 215 170", "253 186 116", "251 146 60", "249 115 22", "234 88 12", "194 65 12", "154 52 18", "124 45 18",
            "255 251 235", "254 243 199", "253 230 138", "252 211 77", "251 191 36", "245 158 11", "217 119 6", "180 83 9", "146 64 14", "120 53 15",
            "247 254 231", "236 252 203", "217 249 157", "190 242 100", "163 230 53", "132 204 22", "101 163 13", "77 124 15", "63 98 18", "54 83 20",
            "240 253 244", "220 252 231", "187 247 208", "134 239 172", "74 222 128", "34 197 94", "22 163 74", "21 128 61", "22 101 52", "20 83 45",
            "236 253 245", "209 250 229", "167 243 208", "110 231 183", "52 211 153", "16 185 129", "5 150 105", "4 120 87", "6 95 70", "6 78 59",
            "240 253 250", "204 251 241", "153 246 228", "94 234 212", "45 212 191", "20 184 166", "13 148 136", "15 118 110", "17 94 89", "19 78 74",
            "236 254 255", "207 250 254", "165 243 252", "103 232 249", "34 211 238", "6 182 212", "8 145 178", "14 116 144", "21 94 117", "22 78 99",
            "240 249 255", "224 242 254", "186 230 253", "125 211 252", "56 189 248", "14 165 233", "2 132 199", "3 105 161", "7 89 133", "12 74 110",
            "239 246 255", "219 234 254", "191 219 254", "147 197 253", "96 165 250", "59 130 246", "37 99 235", "29 78 216", "30 64 175", "30 58 138",
            "238 242 255", "224 231 255", "199 210 254", "165 180 252", "129 140 248", "99 102 241", "79 70 229", "67 56 202", "55 48 163", "49 46 129",
            "245 243 255", "237 233 254", "221 214 254", "196 181 253", "167 139 250", "139 92 246"
        ];

        $setting = Setting::select('*')->get()->sortBy('order_by');
        return view('admin.settings.index', compact('setting', 'colors'));
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
            'terms_ar' => 'required',
            'terms_en' => 'required',
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

        $msg = __('dash.updated_successfully');
        $request->session()->flash('success', $msg);
        return redirect()->route('dashboard.home');
    }
}
