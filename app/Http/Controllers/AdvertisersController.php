<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisers;
use App\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class AdvertisersController extends Controller
{
    public function index()
    {
        $advertisers = Advertisers::latest()->paginate(20);
        return view('advertisers.view_advertisers', ['advertisers' => $advertisers]);
    }
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|unique:advertisers,email|email',
            'phone_no' =>'nullable|max:20',
            'password'=>'required|min:8|string',
        ]);

        if ($validation->fails()) {
            return redirect('advertisers')
            ->withErrors($validation->errors())
            ->withInput();
        }
            $validated_data = $validation->validated();
            $password = Hash::make($validated_data['password']);

        $create_advertiser = Advertisers::create([
            'name'=>$request->name,
            'email'=>$validated_data['email'],
            'password'=>$password,
            'phone_no'=>$request->phone_no,
            'job_role'=>$request->job_role,
            'status'=>$request->status,
            'manager'=>$request->manager
        ]);

        if($create_advertiser) {
            Session::flash('view-message', 'New Advertiser Account Created!');
            return redirect()->route('advertisers');
        }

        // return $password;
    }
    public function show($id)
    {
            $advertiser_profile = Advertisers::findOrFail($id);

            return view('advertisers.edit_advertiser', ['advertiser'=>$advertiser_profile]);
    }
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|unique:advertisers,email,'.$request->id,
            'phone_no' =>'nullable|max:20',
            'job_role' => 'nullable|max:30',
            'city' => 'nullable|max:30',
            'state' => 'nullable|max:30',
            'address' => 'nullable|max:30',
            'country' => 'nullable',
            'postal_code' => 'nullable|alpha_num',
            'status' => 'required',
            'manager' => 'nullable',
        ]);

        if ($validation->fails()) {
            return redirect()
            ->back()
            ->withErrors($validation->errors())
            ->withInput();
        }
        $update_advertiser = Advertisers::where('id', $request->id)->update($validation->validated());

        if($update_advertiser) {
            Session::flash('view-message', 'Advertiser Profile Updated!');
            return redirect()->back()->withInput();
        }

}
    public function delete(Request $request)
    {
        $delete_advertiser = Advertisers::where('id', $request->id)->delete();
        if($delete_advertiser) {
            Session::flash('view-message', 'Advertiser account Deleted');
            return redirect()->back()->withInput();
        }
    }
    public function change_password(Request $request)
    {
        $password_validator = Validator::make($request->all(), [
            'password'=>'required|string|min:8|max:20',
            'confirm_password'=>'required|same:password|required_with:password'
        ]);
        if($password_validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($password_validator->errors())
            ->withInput();
        }else{
            $password = Hash::make($request->password);
            $update_advertiser_password = User::where('id', $request->id)->update([
                'password'=>$password,
            ]);
            if($update_advertiser_password) {
                Session::flash('view-message', 'Advertiser Password Updated! New Password is: '. $request->password);
                return redirect()->back()->withInput();
            }abort(401);

        }
    }
    public function reset_password(Request $request)
    {
        $new_password = Str::random(16);
        $password = Hash::make($new_password);
        $update_advertiser_password = Advertisers::where('id', $request->id)->update([
            'password'=>$password,
        ]);
        if($update_advertiser_password) {
            Session::flash('view-message', 'Advertiser Password Updated! New Password is: '.$new_password);
            return redirect()->back()->withInput();
        }
        abort(401);

    }
}
