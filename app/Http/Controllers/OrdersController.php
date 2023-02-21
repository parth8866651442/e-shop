<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\ShippingAddress;
use Illuminate\Support\Str;
use Helper,PDF;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::with('orderItems','orderItems.product','orderItems.product.productOneImage')->where('user_id',auth()->user()->id)->get();

        return view('orders',compact('orders'));
    }

    public function orderDetails(Request $request){
        // print_r($request->all());
        $item_id = $request->item_id;
        $orders = Order::with('shippingAddress','shippingAddress.getIDByStateDetail','orderItems','orderItems.product','orderItems.product.productOneImage')->whereHas('orderItems', function ($q) use ($item_id) {
            $q->where('product_id', $item_id);
        })->where('id',$request->order_id)->where('user_id',auth()->user()->id)->first();
        return view('orders-detail',compact('orders'));
    }

    public function checkOut(Request $request){
        $user = auth()->user();
        $shippingAddress = ShippingAddress::with('getIDByStateDetail')->where(['user_id'=>$user->id])->first();
        return view('checkout',compact('shippingAddress'));
    }

    public function store(Request $request){
        if(empty(Cart::where('user_id',auth()->user()->id)->first())){
            return redirect()->route('home')->with('error', 'Cart is Empty !');
        }

        if(isset($request->name) && !empty($request->name)){
            $shippingData = array(
                'user_id' => $user->id, 
                'name' => $request->name, 
                'phone' =>$request->phone, 
                'email' =>$request->email, 
                'pincode' =>$request->pincode, 
                'addressLine2' =>$request->addressLine2, 
                'addressLine1' =>$request->addressLine1, 
                'city' =>$request->city, 
                'state' =>$request->state, 
                'landmark' =>$request->landmark,
                'alternatePhone' =>$request->alternatePhone
            );
            ShippingAddress::updateOrCreate(['id' => $request->shipping_id],$shippingData);
        }

        $order=new Order();
        $order_data['order_number']='ORD-'.strtoupper(Str::random(10));
        $order_data['user_id']=auth()->user()->id;
        $order_data['user_shipping_id']=$request->shipping_id;
        $order_data['shipping_amount']=Helper::settings('delivery_charges');
        $order_data['sub_total']=Helper::totalCartPrice();
        $order_data['items_count']=Helper::cartCount();
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
        $items=$order->save();
        if($items){
            $itmeCart = Cart::with('product')->where('user_id', auth()->user()->id);
            foreach ($itmeCart->get() as $key => $cart) {
                $orderItem = new OrderItems();
                $data = array(
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'size' => $cart->size,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity,
                );
                OrderItems::create($data);
            }
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
            $itmeCart->delete();
            return redirect()->route('home')->with('success', 'Your product successfully placed in order');
        }else{
            return redirect()->route('home')->with('success', 'Your product unsuccessfully');
        }
    }

    public function invoice(Request $request){
        $item_id = $request->item_id;
        $orders = Order::with('shippingAddress','shippingAddress.getIDByStateDetail','orderItems','orderItems.product')->whereHas('orderItems', function ($q) use ($item_id) {
            $q->where('product_id', $item_id);
        })->where('id',$request->order_id)->where('user_id',auth()->user()->id)->first();
        

        $pdf = PDF::loadView('pdf',compact('orders'));
        
        $name = $orders->order_number.'.pdf';
     
        return $pdf->download($name);
    }
}
