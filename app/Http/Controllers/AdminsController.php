<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index() {
        return view('admin.index');
    }
    public function show()
    {
        return view('admin.profile');
    }
    public function update()
    {
        return view('admin.profile');
    }
    public function change_password()
    {
        return view('admin.profile');
    }
    public function reset_password()
    {
        return view('admin.profile');
    }
}
