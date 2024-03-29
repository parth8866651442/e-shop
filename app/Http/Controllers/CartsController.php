<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Helper;

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

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
        if($already_cart) {
            if(isset($request->qty)){
                $already_cart->quantity = $already_cart->quantity + $request->qty;
            }else{
                $already_cart->quantity = $already_cart->quantity + 1;
            }

            $already_cart->amount = $product->price * $already_cart->quantity;
            
            if(isset($request->size)){
                $already_cart->size = $request->size;
            }else{
                $sizes=explode(',',$product->size);
                $already_cart->size = $sizes[0];
            }
            // if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
            $already_cart->save();
            
        }else{
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            $cart->price = ($product->price-($product->price*$product->discount)/100);
            if(isset($request->qty)){
                $cart->quantity = $request->qty;
            }else{
                $cart->quantity = 1;
            }

            $cart->amount=$cart->price*$cart->quantity;
            
            if(isset($request->size)){
                $cart->size = $request->size;
            }else{
                $sizes=explode(',',$product->size);
                $cart->size = $sizes[0];
            }
            // if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
            $cart->save();
            // $wishlist=Wishlist::where('user_id',auth()->user()->id)->where('cart_id',null)->update(['cart_id'=>$cart->id]);
        }
        return redirect()->route('getCarts')->with('success', 'Product successfully added to cart');
    }

    public function updateToCart(Request $request){
        
        $id = Helper::decode($request->id);
        $cart = Cart::with('product')->find($id);

        if($cart) {
            if(isset($request->quantity) && !empty($request->quantity > 0)){
                $cart->quantity = $request->quantity;
                
                $after_price=($cart->product->price-($cart->product->price*$cart->product->discount)/100);
                $cart->amount = $after_price * $request->quantity;
            }

            if(isset($request->size)){
                $cart->size = $request->size;
            }

            $cart->save();
            return response()->json(['status' => true, 'message' => 'Cart successfully updated!'], 200);
        }else{
            return response()->json(['status' => false, 'message' => 'Cart Invalid!'], 200);
        }
    }

    public function deleteToCart(Request $request){
        $cart = Cart::find(Helper::decode($request->id));
        if (!is_null($cart)) {
            $cart->delete();
            return response()->json(['status' => true, 'message' => 'Cart successfully removed','url' => route('getCarts')], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'Error please try again','url' => route('getCarts')], 200);
        }
    }
}
