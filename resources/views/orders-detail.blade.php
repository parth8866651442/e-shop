@extends('layouts.app')
@section('title','E-SHOP || ORDERS DETAILS  PAGE')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area" style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">My Orders</h2>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>{{$orders->order_number}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-BANNER END -->
    <!-- SHOP-AREA START -->
    <div class="shop-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="shop-border"></span>
                </div>
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- Shop-Content start -->
                    <div class="shop-content">
                        <!-- product-toolbar start -->
                        <div class="product-toolbar">
                            <!-- pagination -->
                            <div class="shop-pagination">
                                
                            </div>
                        </div>
                        <!-- product-toolbar end -->
                        <!-- Shop-product start -->
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="row shop-list">
                                    <!-- Single-product start -->
                                    <div class="row address-info">
                                        <div class="col-lg-6">
                                            <div class="address-box">
                                                <div class="title-box">
                                                    <span class="title">Delivery Address</span>
                                                </div>
                                                <div class="details">
                                                    <div class="username">
                                                        <div>{{$orders->shippingAddress->name}}</div>
                                                    </div>
                                                    <div class="usermail">{{$orders->shippingAddress->email}}</div>
                                                    <div class="address-details">
                                                        <p>{!! $orders->shippingAddress->addressLine1 .', '. $orders->shippingAddress->addressLine2 .', '. $orders->shippingAddress->city .', '. $orders->shippingAddress->getIDByStateDetail->name .' - <b>'. $orders->shippingAddress->pincode .'</b>' !!}
                                                        </p>
                                                    </div>
                                                    <div class="phone-box">
                                                        <span>Phone number : {{$orders->shippingAddress->phone}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 border-line">
                                            <span>More actions</span>
                                            <div class="row invoice-box">
                                                <div class="invoice-logo">
                                                    <img src="https://static-assets-web.flixcart.com/fk-p-linchpin-web/fk-cp-zion/img/downloadInvoice_e0f744.png" class="img">
                                                    <span class="title">Download Invoice</span>
                                                </div>
                                                <a href="{{route('invoiceDowbload',['order_id'=>$orders->id , 'item_id'=>$orders->orderItems[0]->product_id])}}" class="btn"><span>Download</span></a>
                                            </div>
                                            @if($orders->status == 'new' || $orders->status == 'process')
                                            <div class="row invoice-box">
                                                <div class="invoice-logo">
                                                    <img src="https://static-assets-web.flixcart.com/fk-p-linchpin-web/fk-cp-zion/img/downloadInvoice_e0f744.png" class="img">
                                                    <span class="title">Order Cancel</span>
                                                </div>
                                                <button class="btn"><span>Cancel</span></button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row product-info">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="pro-img-size">
                                                        <a href="{{route('getProductDetail',$orders->orderItems[0]->product->slug)}}"><img class="primary-photo" src="{{imageUrl($orders->orderItems[0]->product->productOneImage->name, 'product','product.jpg','false')}}" alt="" /></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8"> 
                                                    <span><a href="{{route('getProductDetail',$orders->orderItems[0]->product->slug)}}">{{$orders->orderItems[0]->product->title}}</a></span>
                                                    <div class="row">
                                                        <span>Size : {{$orders->orderItems[0]->size}}</span>
                                                        <span>$ {{$orders->orderItems[0]->price}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="order-status">
                                            @if($orders->status == 'process')
                                                @php 
                                                    $date = strtotime($orders->created_at);
                                                    $date = strtotime("+4 day", $date);
                                                    $date = date('M d, Y', $date); 
                                                @endphp
                                                <span>Delivery by {{$date}}</span>       
                                            @elseif($orders->status == 'delivered')

                                            @elseif($orders->status == 'cancel')
                                            
                                            @else
                                                @php 
                                                    $date = strtotime($orders->created_at);
                                                    $date = strtotime("+7 day", $date);
                                                    $date = date('M d, Y', $date); 
                                                @endphp
                                                <span>Delivery by {{$date}}</span>
                                            @endif
                                                <div>
                                                    <small>Your item has been delivered</small>
                                                </div>
                                            </div>
                                            <div class="pro-rating">
                                                <i class="sp-star rating-1"></i>
                                                <i class="sp-star rating-1"></i>
                                                <i class="sp-star rating-1"></i>
                                                <i class="sp-star rating-1"></i>
                                                <i class="sp-star rating-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single-product end -->
                                </div>
                            </div>
                        </div>
                        <!-- Shop-product end -->
                    </div>
                    <!-- Shop-Content end -->
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP-AREA END -->
</section>
@endsection

@push('styles')
<style>
    .product-info,.address-info{
        padding: 10px;
        width: 100%;
        font-size: 14px;
        overflow: hidden;
        transition: box-shadow .1s linear;
        background-color: #fff;
        border: 1px solid #dbdbdb;
        position: relative;
        /* cursor: pointer; */
        /* display: block; */
        box-shadow: 0 0 0 0 rgb(0 0 0 / 15%);
        margin-bottom: 8px;
        border-radius: 4px;
    }
    .address-info .border-line {
        border-left: 1px solid #dbdbdb;
    }
    .product-info .pro-img-size {
        width: 80px;
    }
    .product-info .order-status{
        line-height: 20px;
    }
    .address-box{
        display: inline-block;
    }
    .address-box .title-box{
        padding-bottom: 8px;
    }
    .address-box .title-box .title{
        font-size: 16px;
        font-weight: 500;
    }
    .address-box .details {
        position: relative;
    }
    .address-box .details .username{
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .address-box .details .username div{
        font-weight: 500;
    }
    .address-box .details .address-details{
        padding-top: 10px;
        width: 75%;
    }
    .address-box .details .phone-box{
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .invoice-box{
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        justify-content: space-between;
        border-left: none;
        margin: 12px 0;
    }
    .invoice-box .invoice-logo{
        max-width: 65%;
    }
    .invoice-box .invoice-logo .img{
        width: 25px;
        height: 25px;
        margin-right: 8px;
    }
    .invoice-box .invoice-logo .title{
        font-size: 14px;
        white-space: nowrap;
        overflow: hidden;
    }
    .invoice-box .btn{
        display: inline-block;
        border-radius: 2px;
        color: #212121;
        padding: 10px 20px;
        font-size: 13px;
        font-weight: 500;
        transition: box-shadow .2s ease;
        vertical-align: super;
        background: #fff;
        cursor: pointer;
        outline: none;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        border: 1px solid #e0e0e0;
        width: 140px;
    }
</style>
@endpush