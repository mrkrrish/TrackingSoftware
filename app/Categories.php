<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model

{

protected $fillable = ['category_name'];

    public function index() {
        return $this->belongsTo('User::class');
}
    public function offer() {
        return $this->belongsTo('App\Offers');
    }

    public static function getCategoriesList()
    {
        $categories = DB::table('categories')->get();
        return $categories;

    }
}
