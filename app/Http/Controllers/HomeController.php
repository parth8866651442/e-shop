<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Post;
use App\Models\ShippingAddress;
use Helper;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners=Banner::with('parentCategory','childCategory')->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','ASC')->get();
        $categories=Category::where(['is_active'=>1,'is_parent'=>1,'is_deleted'=>0])->orderBy('created_at','ASC')->limit(3)->get();
        $products=Product::with('productOneImage','getReview')->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->limit(10)->get();
        $latestPosts=Post::with('getCategory','getComment')->where(['is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->limit(3)->get();  
        /* echo '<pre>';
        print_r($banners->toArray());
        exit; */
        return view('home',compact('banners','categories','products','latestPosts'));
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
    
    public function MyAccount(){
        $user = auth()->user();
        $shippingAddress = ShippingAddress::where(['user_id'=>$user->id])->first();
        return view('my-account',compact('shippingAddress'));
    }

    public function updatePersonalInfo(Request $request){
        $user = auth()->user();
        
        $validator = [
            'name'    => 'required',
            'email'    => 'required|unique:users,email,' . $user->id . ',id',
            'mobile_no'    => 'required|unique:users,mobile_no,' . $user->id . ',id',
            // 'image' => 'nullable|mimes:jpeg,jpg,png|mimetypes:image/*'
        ];

        $validator = Validator::make($request->all(), $validator);
        
        if ($validator->fails()) {
            return redirect()->route('myAccounts')->with('error', join(", ",$validator->errors()->all()));
        } else {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile_no = $request->mobile_no;
            
            if ($user->save()) {
                return redirect()->route('myAccounts')->with('success', 'Personal Info updated successfully');
            }
            return redirect()->route('myAccounts')->with('error', 'Personal Info updated unsuccessfully');
        }
    }

    public function shippingAddress(Request $request){
        $user = auth()->user();

        $data = array(
           'user_id' => $user->id, 
           'name' => $request->name, 
           'phone' =>$request->phone, 
           'email' =>$request->email, 
           'pincode' =>$request->pincode, 
           'addressLine2' =>$request->addressLine2, 
           'addressLine1' =>$request->addressLine1, 
           'city' =>$request->city, 
           'state' =>Helper::decode($request->state), 
           'landmark' =>$request->landmark,
           'alternatePhone' =>$request->alternatePhone
        );

        $id = '';
        if(!empty($request->id)){
            $id = Helper::decode($request->id);
        }
        
        $item = ShippingAddress::updateOrCreate(['id' => $id],$data);

        if (!is_null($item)) {
            return redirect()->route('myAccounts')->with('success', 'Addresses updated successfully');
        }
        return redirect()->route('myAccounts')->with('error', 'Addresses Info updated unsuccessfully');
    }

    public function support(Request $request){
        return view('support');
    }

    public function termsOfService(Request $request){
        return view('terms-of-service'); 
    }
    
    public function privacyPolicy(Request $request){
        return view('privacy-policy');
    }

    public function returnsPolicy(Request $request){
        return view('returns-policy');
    }

}
