<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $model_name = 'User';

    public function index()
    {
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));

    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email,'.$user->id,
            'image' => 'nullable|mimes:'.acceptImageType(0).'|max:'.getMaxSize(),
        ]);

        $input = $request->all();

        try {
            if(isset($input['image'])){
                $input['image'] = generalUpload($this->model_name, $input['image']);
            }else{
                $input['image'] = $user->image;
            }
            $user->update($input);
            // $user->assignRole('admin');
        }catch (\Exception $e){
            $status = false;
            $msg = $e->getMessage();
            return response()->json(compact('status', 'msg'));
        }

        $status = true;
        $msg = __('dash.updated successfully');
        $url = route('dashboard.home');

        return response()->json(compact('status', 'msg', 'url'));
    }

    public function password()
    {
        $user = auth()->user();
        return view('admin.profile.password', compact('user'));
    }

    public function update_password(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'current_password' => 'required|current_password',
            'password' => 'required|string|confirmed',
        ]);

        try {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }catch (\Exception $e){
            $status = false;
            $msg = $e->getMessage();
            return response()->json(compact('status', 'msg'));
        }

        $status = true;
        $msg = __('dash.updated successfully');
        $url = route('dashboard.home');

        return response()->json(compact('status', 'msg', 'url'));
    }
}
