<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = ['user_id','offer_name','advertiserId','offer_category','modelIn','priceIn','modelOut','priceOut','offer_currency','offer_logo','offer_preview','offer_url','offer_terms','offer_KPI','payoutRules','offer_start_date','offer_end_date','offer_access','offer_status'];

    protected $guarded = [];

    public function index() {
        return $this->belongsTo('User::class');
    }
    public function Categories() {
        return $this->hasMany('App\Categories');
    }
    public function Advertisers() {
        return $this->hasOne('App\Advertisers');
    }
    public function Affiliates() {
        return $this->hasMany('App\Affiliates');
    }
    public static function getAdvertiserList() {
        $advertisers = Advertisers::all();
         return view('campaigns.create', ['advertisers'=> $advertisers]);
     }
}
