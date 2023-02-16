<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Str;
use Helper;

class OrdersController extends Controller
{
    public function store(Request $request){
        if(empty(Cart::where('user_id',auth()->user()->id)->where('order_id',null)->first())){
            return redirect()->route('home')->with('error', 'Cart is Empty !');
        }

        $order=new Order();
        $order_data['order_number']='ORD-'.strtoupper(Str::random(10));
        $order_data['first_name']=$request->first_name;
        $order_data['last_name']=$request->last_name;
        $order_data['email']=$request->email;
        $order_data['phone']=$request->phone;
        $order_data['address1']=$request->address1;
        $order_data['address2']=$request->address2;
        $order_data['city']=$request->city;
        $order_data['state']=$request->state;
        $order_data['zip_code']=$request->zip_code;
        $order_data['user_id']=auth()->user()->id;
        $order_data['shipping_amount']=Helper::settings('delivery_charges');
        $order_data['sub_total']=Helper::totalCartPrice();
        $order_data['quantity']=Helper::cartCount();
        $order_data['total_amount']=Helper::totalCartPrice() + Helper::settings('delivery_charges');
        $order_data['status']="new";
        if($request->payment_method=='online'){
            $order_data['payment_method']='online';
            $order_data['payment_status']='paid';
        } else {
            $order_data['payment_method']='cod';
            $order_data['payment_status']='Unpaid';
        }
        $order->fill($order_data);
        $order=$order->save();
        if($order)
        // dd($order->id);
        /* $users=User::where('role','admin')->first();
        $details=[
            'title'=>'New order created',
            'actionURL'=>route('order.show',$order->id),
            'fas'=>'fa-file-alt'
        ];
        Notification::send($users, new StatusNotification($details)); */
        /* if($request->payment_method=='online'){
            return redirect()->route('payment')->with(['id'=>$order->id]);
        } */
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->delete();

        return redirect()->route('home')->with('success', 'Your product successfully placed in order');
    }
}
