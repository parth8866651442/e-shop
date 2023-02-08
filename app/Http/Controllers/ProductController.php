<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    /**
     * Show the application product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function categoryWiseproducts(Request $request)
    {
        if(isset($request->slug) && !empty($request->slug)){
            $categoryID=Category::where('slug',$request->slug)->where(['is_active'=>1,'is_deleted'=>0])->first();
            if(is_null($categoryID)){
                return redirect()->route('home')->with('error', 'Category not available');
            }
            $maxPrice = DB::table('products')->max('price');
            $products=Product::with('productOneImage')->where(['is_active'=>1,'category_id'=>$categoryID->id])->orderBy('created_at','ASC')->paginate(10);
        
            $categories=Category::getAllParentWithChild();
           
            return view('product-lists',compact('categories','products','maxPrice'));
        }
        
    }
}
