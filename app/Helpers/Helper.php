<?php

namespace App\Helpers;
use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\Cart;

class Helper
{
    public static function getHeaderCategory(){
        $category = new Category();
        
        $menu=$category->getAllParentWithChild();
        if($menu){
            // parent category
            foreach($menu as $parentCat){
        ?>
            <span>
                <a class="mega-menu-title" href="<?php echo route('getCategoryWiseproducts',$parentCat->slug)?>"><?php echo $parentCat->title; ?></a>
                <?php
                    // child category
                    foreach($parentCat->getChildCategory as $subCategory){
                ?>
                    <a href="<?php echo route('getSubCategoryWiseproducts',[$parentCat->slug,$subCategory->slug])?>"><?php echo $subCategory->title; ?></a>
                <?php } ?>
            </span>
        <?php
            }
        }
    }

    public static function cartCount(){
       
        if(auth()->check()){
            $user_id=auth()->user()->id;
            return Cart::where('user_id',$user_id)->where('order_id',null)->count('id');
        }
        else{
            return 0;
        }
    }

    public static function getAllProductFromCart(){
        if(auth()->check()){
            $user_id=auth()->user()->id;
            return Cart::with('productLimit','productLimit.productOneImage')->where('user_id',$user_id)->where('order_id',null)->orderBy('created_at','ASC')->limit(3)->get();
        }
        else{
            return 0;
        }
    }

    // Total amount cart
    public static function totalCartPrice(){
        if(auth()->check()){
            $user_id=auth()->user()->id;
            return Cart::where('user_id',$user_id)->where('order_id',null)->sum('amount');
        }
        else{
            return 0;
        }
    }
}