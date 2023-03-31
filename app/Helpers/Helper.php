<?php

namespace App\Helpers;

use Hashids\Hashids;
use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Setting;
use App\Models\State;
use App\Models\Order;

class Helper
{

    public static function encode($id){
        $hashids = new Hashids();
        return $hashids->encode($id);
    }

    public static function decode($id){
        $hashids = new Hashids();

        // $id = $hashids->encode(5555);
        $decode = $hashids->decode($id);
        if(is_array($decode) && isset($decode[0])){
            return $decode[0];
        }
        return '';
    }

    public static function invoiceNumber()
    {
        $latest = Order::latest()->first();

        if (! $latest) {
            return 'WBM0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_number);

        return 'WBM' . sprintf('%04d', $string+1);
    }

    public static function orderNumber($type)
    {
        $latest = App\Models\Order::where('type',$type)->latest()->first();

        if (! $latest) {
            return 'BD/H-0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_no);

        return 'BD/H-' . sprintf('%04d', $string+1);
    }

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
            return Cart::where('user_id',$user_id)->count('id');
        }
        else{
            return 0;
        }
    }

    public static function getAllProductFromCart(){
        if(auth()->check()){
            $user_id=auth()->user()->id;
            return Cart::with('productLimit','productLimit.productOneImage')->where('user_id',$user_id)->orderBy('created_at','ASC')->limit(3)->get();
        }
        else{
            return 0;
        }
    }

    public static function getAllCategory(){
        return Category::where('is_parent',1)->orderBy('created_at','ASC')->get();
    }

    // Total amount cart
    public static function totalCartPrice(){
        if(auth()->check()){
            $user_id=auth()->user()->id;
            return Cart::where('user_id',$user_id)->sum('amount');
        }
        else{
            return 0;
        }
    }

    // settings
    public static function settings($select = '*'){
        $item = Setting::select($select)->first();
        if($select != '*' && !is_null($item)){
            return $item[$select];
        }
        return $item;
    }

    public static function getStates(){
        return State::where('country_id',101)->get();
    }
}