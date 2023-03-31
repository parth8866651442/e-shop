<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
use DB;

class ProductController extends Controller
{
    public function products(Request $request)
    {
        $oldQuery = request()->query();
        $newQuery = Arr::except($oldQuery, ['_token']);

        if(isset($oldQuery['_token'])){
            return redirect()->route('productSearch', [Arr::query($newQuery)]);
        }

        $sortBy = 'created_at';
        if(isset($request->sortBy)){
            $sortBy = $request->sortBy;
        }

        $show = PAGINATE;
        if(isset($request->show)){
            $show = $request->show;
        }
        
        $priceRange = '';
        if(isset($request->price_range)){
            $priceRange=explode('-',$request->price_range);
        }

        $products=Product::with('productOneImage','getReview')->where(['is_active'=>1,'is_deleted'=>0])->orderBy($sortBy,'ASC');
        if(!empty($priceRange)){
            $products->whereBetween('price',$priceRange);
        }

        if($request->search){
            $products->where('title','like','%'.$request->search.'%')
            ->orwhere('slug','like','%'.$request->search.'%');

        }

        if($request->category_id){
            $products->where('category_id',$request->category_id);
        }

        $products = $products->paginate($show);

        $maxPrice = DB::table('products')->max('price');

        $categories=Category::getAllParentWithChild();
        
        return view('product-lists',compact('categories','products','maxPrice'));
    }

    public function categoryWiseproducts(Request $request)
    {
        if(isset($request->slug) && !empty($request->slug)){
            $slug = $request->slug;
            $categoryID=Category::where('slug',$request->slug)->where(['is_active'=>1,'is_deleted'=>0])->first();
            if(is_null($categoryID)){
                return redirect()->route('home')->with('error', 'Category not available');
            }
            // \DB::enableQueryLog();
            $sortBy = 'created_at';
            if(isset($request->sortBy)){
                $sortBy = $request->sortBy;
            }

            $show = PAGINATE;
            if(isset($request->show)){
                $show = $request->show;
            }
            
            $priceRange = '';
            if(isset($request->price_range)){
                $priceRange=explode('-',$request->price_range);
            }

            $products=Product::with('productOneImage','getReview')->where(['is_active'=>1,'is_deleted'=>0,'category_id'=>$categoryID->id])->orderBy($sortBy,'ASC');
            if(!empty($priceRange)){
                $products->whereBetween('price',$priceRange);
            }
            $products = $products->paginate($show);
            // dd(\DB::getQueryLog());
            $maxPrice = DB::table('products')->max('price');

            $categories=Category::getAllParentWithChild();
           
            return view('product-lists',compact('categories','products','maxPrice','slug'));
        }
        return redirect()->route('home')->with('error', 'Data not found');
    }

    public function subCategoryWiseproducts(Request $request)
    {
        if(isset($request->slug) && !empty($request->slug) && isset($request->sub_slug) && !empty($request->sub_slug)){
            $slug = $request->slug;
            $subSlug = $request->sub_slug;
            $subCategoryID=Category::where('slug',$subSlug)->where(['is_active'=>1,'is_deleted'=>0])->first();
            if(is_null($subCategoryID)){
                return redirect()->route('home')->with('error', 'Category not available');
            }
            
            $sortBy = 'created_at';
            if(isset($request->sortBy)){
                $sortBy = $request->sortBy;
            }

            $show = PAGINATE;
            if(isset($request->show)){
                $show = $request->show;
            }
            
            $priceRange = '';
            if(isset($request->price_range)){
                $priceRange=explode('-',$request->price_range);
            }

            $products=Product::with('productOneImage','getReview')->where(['is_active'=>1,'is_deleted'=>0,'child_category_id'=>$subCategoryID->id])->orderBy($sortBy,'ASC');
            if(!empty($priceRange)){
                $products->whereBetween('price',$priceRange);
            }
            $products = $products->paginate($show);

            $maxPrice = DB::table('products')->max('price');

            $categories=Category::getAllParentWithChild();
           
            return view('product-lists',compact('slug','subSlug','products','maxPrice','categories'));
        }
        return redirect()->route('home')->with('error', 'Data not found'); 
    }

    public function filterParams(Request $request){
        $data= $request->all();
        
        $queryParam=[];
        
        if(isset($data['slug'])){ $queryParam['slug'] = $data['slug']; }
        
        if(isset($data['subSlug']) && !empty($data['subSlug'])){ $queryParam['sub_slug'] = $data['subSlug']; }
        
        if(!empty($data['show'])){ $queryParam['show'] = $data['show']; }
       
        if(!empty($data['sortBy'])){ $queryParam['sortBy'] = $data['sortBy']; }
        
        if(!empty($data['price_range'])){ $queryParam['price_range'] = $data['price_range']; }

        if(isset($data['subSlug']) && !isset($data['subSlug'])){
            return redirect()->route('getSubCategoryWiseproducts',$queryParam);
        }elseif(isset($data['subSlug']) && !empty($data['subSlug'])){
            return redirect()->route('getCategoryWiseproducts',$queryParam);
        }else{
            return redirect()->route('getAllproducts',$queryParam);
        }
    }

    public function productDetail(Request $request){
        if(isset($request->slug) && !empty($request->slug)){
            $slug = $request->slug;
            $product=Product::with('ProductImages','parentCategory','childCategory','getReview')->where('slug',$request->slug)->where(['is_active'=>1,'is_deleted'=>0])->first();
            if(is_null($product)){
                return redirect()->route('home')->with('error', 'Product not available');
            }

            $relatedProduct=Product::with('productOneImage')->where('id','!=',$product->id)->where(['category_id'=>$product->category_id,'is_active'=>1,'is_deleted'=>0])->orderBy('created_at','DESC')->limit(PAGINATE)->get();
            
            return view('product-detail',compact('product','slug','relatedProduct'));
        }
        return redirect()->route('home')->with('error', 'Data not found');
    }

    public function reviewAdd(Request $request){
        $validator = [
            'rate'=>'required|numeric|min:1'
        ];

        $validator = Validator::make($request->all(), $validator);

        if ($validator->fails()) {
            return redirect()->route('getProductDetail',$request->slug)->with('error', join(", ",$validator->errors()->all()));
        } else {

            $product_info=Product::where('slug',$request->slug)->first();
            if(is_null($product_info)){
                return redirect()->back()->with('error','Something went wrong! Please try again!!');
            }

            $data = array(
                "user_id" => auth()->user()->id,
                "product_id" => $product_info->id,
                "rate" => $request->rate,
                "name" => $request->name,
                "email" => $request->email,
                "message" => $request->message,
            );
            
            $item_add = ProductReview::create($data);
            
            if (!is_null($item_add)) {
                return redirect()->back()->with('success','Thank you for your feedback');
            } else {
                return redirect()->back()->with('error','Something went wrong! Please try again!!');
            }
        }
    }
}
