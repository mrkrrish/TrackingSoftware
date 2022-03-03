<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::group(['middleware' => ['auth']], function() {

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminsController@index')->name('admin.index');

Route::get('/admin/profile', 'AdminsController@show')->name('admin.profile');
Route::post('admin/profile', 'AdminsController@update')->name('admin.edit');
Route::post('admin/change_password', 'AdminsController@change_password')->name('admin.change_password');
Route::post('admin/reset_password', 'AdminsController@reset_password')->name('admin.reset_password');
Route::get('/offers', 'OffersController@show')->name('campaign.view-campaign');
Route::get('/offers/create', 'OffersController@create')->name('campaign.create');
Route::post('offers/create', 'OffersController@store')->name('create.offer');

Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/categories/{category_id}/edit', 'CategoriesController@show')->name('category.edit');

Route::post('/category_update', 'CategoriesController@update')->name('category.update');
Route::post('categories/create', 'CategoriesController@store')->name('category.create');
Route::post('categories', 'CategoriesController@delete')->name('category.delete');


//affiliates section route
Route::get('/affiliates', 'AffiliatesController@index')->name('affiliates');
// Route::get('/create_affiliate', function() {return view('affiliates.create');})->name('affiliate.create');
Route::post('create_affiliate', 'AffiliatesController@store')->name('affiliates.store');
Route::get('/affiliate/{id}/profile', 'AffiliatesController@show')->name('affiliate.profile');

Route::post('/affiliate/delete', 'AffiliatesController@delete')->name('affiliate.delete');
Route::post('/affiliate/edit', 'AffiliatesController@update')->name('affiliate.edit');
Route::post('/affiliate/password', 'AffiliatesController@change_password')->name('affiliate.change_password');
Route::post('/affiliate/reset_password', 'AffiliatesController@reset_password')->name('affiliate.reset_password');

// advertiser section route
Route::get('/advertiser', 'AdvertisersController@index')->name('advertisers');
// Route::get('/create_affiliate', function() {return view('affiliates.create');})->name('affiliate.create');
Route::post('create_advertiser', 'AdvertisersController@store')->name('advertisers.store');
Route::get('/advertiser/{id}/profile', 'AdvertisersController@show')->name('advertiser.profile');

Route::post('/advertiser/delete', 'AdvertisersController@delete')->name('advertiser.delete');
Route::post('/advertiser/edit', 'AdvertisersController@update')->name('advertiser.edit');
Route::post('/advertiser/password', 'AdvertisersController@change_password')->name('advertiser.change_password');
Route::post('/advertiser/reset_password', 'AdvertisersController@reset_password')->name('advertiser.reset_password');

});
