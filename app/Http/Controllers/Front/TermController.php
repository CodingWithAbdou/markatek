<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index()
    {
        $text = Setting::where('setting_key', 'terms')->first()->setting_value;
        return view('front.terms', compact('text'));
    }
}
