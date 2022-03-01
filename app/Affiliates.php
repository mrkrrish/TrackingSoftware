<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliates extends Model
{
    protected $fillable = ['name','email', 'password', 'status', 'job_role', 'manager', 'state', 'city', 'country', 'address', 'postal_code', 'phone_no', 'email_verified_at', 'created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo('App\User', 'id');
    }

    public function AffiliatePostback()
    {
        return $this->hasMany('App\AffiliatePostback');
    }


}
