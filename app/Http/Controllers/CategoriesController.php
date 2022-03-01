<?php

namespace App\Http\Controllers;

use App\Categories;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\support\Facades\Session;

class CategoriesController extends Controller
{
    public function index()
    {
    $categories = Categories::all();
    return view('categories.view_categories', ['categories'=> $categories]);
    }
    public function store(Request $request)
    {
    $validation = Validator::make($request->all(),
    ['category_name' => 'required|alpha_dash|unique:categories|max:20',]
    );
    if ($validation->fails()) {
        return redirect('categories')
        ->withErrors($validation->errors())
        ->withInput();
    }
        $create_category = Categories::create($validation->validated());
        if($create_category) {
            SESSION::flash('message', 'Category Created');
            return redirect('categories');
        }
         abort(401);
    }

    public function show($category_id)
    {
        $view_category = Categories::where('category_id',$category_id)->first();
        $categories = Categories::all();
        if($view_category) {
            return view('categories.view_categories', ['category'=>$view_category,'categories'=> $categories ]);
        } abort(401);
    }

    public function update(Request $request)
    {
    $validation = Validator::make($request->all(),
    ['category_name' => 'required|alpha_dash|unique:categories|max:20',]
    );
    if ($validation->fails()) {
        return redirect()
        ->back()
        ->withErrors($validation->errors())
        ->withInput();
    }
    $update_category = Categories::where('category_id', $request->category_id)->update($validation->validated());
        if($update_category) {
            SESSION::flash('view-message', 'Category updated');
            return redirect('categories');
        }
        return redirect()->back();
    }

    public function delete(Request $request)
    {
    $delete_category = Categories::where('category_id', $request->category_id)->delete();
    if($delete_category) {
        SESSION::flash('view-message', 'Category Deleted');
        return redirect('categories');
        }
        abort(401);
    }
}
