<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartsController extends Controller
{   

    public function index(Request $request){
        $carts=Cart::with('product','product.productOneImage')->orderBy('created_at','DESC')->paginate(PAGINATE);      
        return view('carts',compact('carts'));
    }

    public function addToCart(Request $request){
        if (empty($request->slug)) {
            return redirect()->route('home')->with('error', 'Invalid Products');
        }

        $product = Product::where(['slug'=>$request->slug,'is_active' => 1,'is_deleted'=>0])->first();
        if (empty($product)) {
            return redirect()->route('home')->with('error', 'Invalid Products');
        }

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->first();
        if($already_cart) {
            $already_cart->quantity = $already_cart->quantity + 1;
            $already_cart->amount = $product->price+ $already_cart->amount;
            // if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
            $already_cart->save();
            
        }else{
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            $cart->price = ($product->price-($product->price*$product->discount)/100);
            $cart->quantity = 1;
            $cart->amount=$cart->price*$cart->quantity;
            // if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
            $cart->save();
            // $wishlist=Wishlist::where('user_id',auth()->user()->id)->where('cart_id',null)->update(['cart_id'=>$cart->id]);
        }
        return redirect()->route('home')->with('success', 'Product successfully added to cart');
    }

    public function updateToCart(Request $request){
        // print_r($request->all());

        $error = '';
        $success = '';
        // return $request->quant;
        foreach ($request->quantity as $k=>$quant) {
            // return $k;
            $id = $request->id[$k];
            // return $id;
            $cart = Cart::with('product')->find($id);
            // return $cart;
            if($quant > 0 && $cart) {
                // return $quant;

                /* if($cart->product->stock < $quant){
                    request()->session()->flash('error','Out of stock');
                    return back();
                } */
                // $cart->quantity = ($cart->product->stock > $quant) ? $quant  : $cart->product->stock;
                $cart->quantity = $quant;
                // return $cart;
                
                // if ($cart->product->stock <=0) continue;
                $after_price=($cart->product->price-($cart->product->price*$cart->product->discount)/100);
                $cart->amount = $after_price * $quant;
                // return $cart->price;
                $cart->save();
                $success = 'Cart successfully updated!';
            }else{
                $error = 'Cart Invalid!';
            }
        }
        return redirect()->route('getCarts')->with('success', $success);
    }

    public function deleteToCart(Request $request){
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            return redirect()->route('getCarts')->with('success','Cart successfully removed');
        }
        return redirect()->route('getCarts')->with('error','Error please try again'); 
    }

    public function checkOut(Request $request){
        return view('checkout');
    }
}
