<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners=Banner::where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','ASC')->get();
        $categories=Category::where(['is_active'=>1,'is_parent'=>1,'is_deleted'=>0])->orderBy('created_at','ASC')->limit(3)->get();
        $products=Product::with('productOneImage')->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->limit(10)->get();
        $latestPosts=Post::with('getCategory')->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->limit(3)->get();  
       
        return view('home',compact('banners','categories','products','latestPosts'));
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

}
