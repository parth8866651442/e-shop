<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners=Banner::where('is_active',1)->orderBy('created_at','ASC')->get();
       /*  echo(Config::get('app.image_url').'/uploads/banner/1675165115_2.jpg');
        exit; */
        return view('home',compact('banners'));
    }
}
