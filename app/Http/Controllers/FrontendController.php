<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;

class FrontendController extends Controller
{
    public function index(){

    	$title = Setting::first()->site_name;
    	return view('index')
    					->with('title', $title)
    					->with('settings', Setting::first())
    					->with('categories', Category::take(5)->get());
    }

    public function category(Category $category){

    	return view('category')->with('category', $category)
    						   ->with('title', $category->name)
    						   ->with('settings', Setting::first())
    						   ->with('categories', Category::take(5)->get());
    }
}
