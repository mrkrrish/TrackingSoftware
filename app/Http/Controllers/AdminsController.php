<?php

namespace App\Http\Controllers;

use App\Rules\CheckPassword;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\Session;

class AdminsController extends Controller
{
    public function index() {
        return view('admin.index');
    }
    public function show()
    {
        return view('admin.profile');
    }
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'phone_no' =>'nullable|max:20',
            'job_role' => 'nullable|max:30',
            'city' => 'nullable|max:30',
            'state' => 'nullable|max:30',
            'address' => 'nullable|max:30',
            'country' => 'nullable',
            'postal_code' => 'nullable|alpha_num',
        ]);

        if ($validation->fails()) {
            return redirect()
            ->back()
            ->withErrors($validation->errors())
            ->withInput();

        }
        $update_admin = User::where('id', Auth::User()->id)->update($validation->validated());

        if($update_admin) {

            Session::flash('view-message', 'Your Profile Updated!');
            return redirect()->back()->withInput();
        }

    }
    public function change_password(Request $request)
    {
        $password_validator = Validator::make($request->all(), [
            'current_password'=>['required', new CheckPassword],
            'password'=>'required|string|min:8|max:20',
            'confirm_password'=>'required|same:password|required_with:password'
        ]);
        if($password_validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($password_validator->errors())
            ->withInput();
        }else{
            Session::flash('view-message', 'Your Password has been Updated! New Password is: '. $request->password);
            return redirect()->back()->withInput();
        }
    }

}
