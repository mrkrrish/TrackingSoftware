<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OffersController extends Controller
{
    public function show() {
        return view('campaigns.view-campaigns');
    }


    public function create() {
         return view('campaigns.create');
    }

    public function store(Request $request) {
        $request->user_id = Auth::user()->id;
        $user = Offers::create($request->all());
        return $user;

    }
}
