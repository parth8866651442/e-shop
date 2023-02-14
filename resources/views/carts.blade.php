@extends('layouts.app')
@section('title','E-SHOP || SHOPPING CARTS PAGE')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area photo-3 margin-bottom-80" style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Shopping Cart</h2>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-BANNER END -->
    <!-- SHOPPING-CART-AREA START -->
    <div class="shopping-cart-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('updateToCart')}}" method="POST">
                        @csrf
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Name</th>
                                        <th class="product-price">price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-name">Size</th>
                                        <th class="product-subtotal">Subtotal</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($carts)>0)
                                        @foreach($carts as $cart)
                                        <tr>
                                            <td class="product-thumbnail"><a href="{{route('getProductDetail',$cart->product->slug)}}"><img src="{{imageUrl($cart->product->productOneImage->name, 'product','product.jpg','false')}}" alt="" /></a></td>
                                            <td class="product-name"><a href="{{route('getProductDetail',$cart->product->slug)}}">{{$cart->product->title}}</a></td>
                                            <td class="product-price"><span class="amount" data-min="1" data-max="100">{{$cart->price}}</span></td>
                                            <td class="product-quantity"><input type="text" name="quantity[]" value="{{$cart->quantity}}" /></td>
                                            <td>
                                            @if($cart->product->size)
                                                @php 
                                                    $sizes=explode(',',$cart->product->size);
                                                @endphp
                                                <select class="form-select form-select-sm" name="size">
                                                    @foreach($sizes as $size)
                                                        <option value="{{$size}}" {{$cart->size == $size ? 'selected' : '' }}>{{ucfirst($size)}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                            </td>
                                            <td class="product-subtotal">{{$cart->amount}}</td>
                                            <input type="hidden" name="id[]" value="{{$cart->id}}">
                                            <td class="product-remove"><a href="{{route('deleteToCart',$cart->id)}}"><i class="pe-7s-close"></i></a></td>
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7"><h4 class="text-warning" style="margin:100px auto;">Your cart is empty.</h4></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @if(count($carts)>0)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="coupon">
                                    <input type="submit" value="update cart" />
                                    <span>do you have coupon code</span>
                                    <input type="text" />
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-5 offset-lg-7">
                                <div class="cart-totals">
                                    <h2>Total</h2>
                                    <div class="table-cart table-responsive">
                                        <table>
                                            <tbody class="cart-totals-list">
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>${{number_format(Helper::totalCartPrice(),2)}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Discount</th>
                                                    <td><span>no discount or coupon code</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>
                                                        <p>free shipping</p>
                                                    </td>
                                                </tr>
                                                <tr class="cart-total">
                                                    <th>Total</th>
                                                    <td>${{number_format(Helper::totalCartPrice(),2)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="we-proceed-to-checkout">
                                            <a href="{{route('getCheckOut')}}">proceed to chackout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPPING-CART-AREA END -->
    <!-- BRAND-LOGO-AREA START -->
    <div class="brand-logo-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="brand-brief">
                        <h2>they are with us</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="brand-logo fix">
                        <div class="single-logo">
                            <img src="{{asset('assets/img/brand/1.png')}}" alt="" />
                        </div>
                        <div class="single-logo">
                            <img src="{{asset('assets/img/brand/2.png')}}" alt="" />
                        </div>
                        <div class="single-logo">
                            <img src="{{asset('assets/img/brand/3.png')}}" alt="" />
                        </div>
                        <div class="single-logo">
                            <img src="{{asset('assets/img/brand/4.png')}}" alt="" />
                        </div>
                        <div class="single-logo">
                            <img src="{{asset('assets/img/brand/5.png')}}" alt="" />
                        </div>
                        <div class="single-logo">
                            <img src="{{asset('assets/img/brand/6.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BRAND-LOGO-AREA END -->
</section>
@endsection