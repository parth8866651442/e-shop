<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class OrdersController extends Controller
{
    public function store(Request $request){
        print_r($request->all());
        exit;
        if(empty(Cart::where('user_id',auth()->user()->id)->where('order_id',null)->first())){
            return redirect()->route('home')->with('error', 'Cart is Empty !');
        }
    }
}
