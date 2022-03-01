<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffiliatePostback extends Model
{
    public function index()
    {
        return $this->belongsToMany('App\Affiliates');
    }
}
