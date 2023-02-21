<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostComment;
use DB;

class BlogsController extends Controller
{
    public function index(Request $request)
    {
        $posts=Post::with('getCategory','getComment')->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->paginate(PAGINATE);
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
            $post=Post::with('getCategory','getUser','getComment')->where(['slug'=>$request->sub_slug,'is_active'=>1,'is_deleted'=>0])->first();
            $latestPosts=Post::with('getCategory')->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->limit(5)->get();      
            $postCategory=PostCategory::where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->get();      
            
            return view('blog-detail',compact('post','latestPosts','postCategory'));
        }
        return redirect()->route('home')->with('error', 'Data not found'); 
    }

    public function commentAdd(Request $request){
        $validator = [
            'message'=>'required'
        ];

        $validator = Validator::make($request->all(), $validator);
        
        $post_info=Post::with('getCategory')->where('slug',$request->slug)->first();
        if(is_null($post_info)){
            return redirect()->back()->with('error','Something went wrong! Please try again!!');
        }
        
        if ($validator->fails()) {
            return redirect()->route('getBlogDetail',[$request->slug,$post_info->getCategory->slug])->with('error', join(", ",$validator->errors()->all()));
        } else {

            $data = array(
                "user_id" => auth()->user()->id,
                "post_id" => $post_info->id,
                "comment" => $request->message,
                "parent_id" => $request->parent_id || null
            );
            
            $item_add = PostComment::create($data);
            
            if (!is_null($item_add)) {
                return redirect()->back()->with('success','Thank you for your comment');
            } else {
                return redirect()->back()->with('error','Something went wrong! Please try again!!');
            }
        }

    }
}
