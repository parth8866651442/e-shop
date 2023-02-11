<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;
use DB;

class BlogsController extends Controller
{
    public function index(Request $request)
    {
        $posts=Post::with('getCategory')->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->paginate(PAGINATE);
        $latestPosts=Post::with('getCategory')->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->limit(5)->get();      
        $postCategory=PostCategory::where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->get();      
        
        return view('blogs',compact('posts','latestPosts','postCategory'));
    }

    public function categoryWiseBlogs(Request $request){
        if(isset($request->slug) && !empty($request->slug)){
            $slug = $request->slug;
            $posts=Post::with('getCategory')->whereHas('getCategory', function ($q) use ($slug) {
                $q->where('slug', $slug);
            })->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->paginate(PAGINATE);
            $latestPosts=Post::with('getCategory')->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->limit(5)->get();      
            $postCategory=PostCategory::where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->get();      
            
            return view('blogs',compact('posts','latestPosts','postCategory'));
        }
        return redirect()->route('home')->with('error', 'Data not found'); 
    }

    public function blogDetail(Request $request){
       
        if(isset($request->slug) && !empty($request->slug) && isset($request->sub_slug) && !empty($request->sub_slug)){
            $post=Post::with('getCategory','getUser')->where(['slug'=>$request->sub_slug,'is_active'=>1,'is_deleted'=>0])->first();
            $latestPosts=Post::with('getCategory')->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->limit(5)->get();      
            $postCategory=PostCategory::where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->get();      
            
            return view('blog-detail',compact('post','latestPosts','postCategory'));
        }
        return redirect()->route('home')->with('error', 'Data not found'); 
    }
}
