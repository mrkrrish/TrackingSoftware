<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisers extends Model
{
    protected $fillable = ['name','email', 'password', 'status', 'job_role', 'manager', 'state', 'city', 'country', 'address', 'postal_code', 'phone_no', 'email_verified_at', 'created_at', 'updated_at'];

    public function offers() {
        return $this->hasMany('App\Offers');
    }
    public function user() {
        return $this->belongsTo('User::class');
    }
}
