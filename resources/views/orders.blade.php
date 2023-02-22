@extends('layouts.app')
@section('title','E-SHOP || ORDERS PAGE')
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
                            <li>My Orders</li>
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
                <div class="col-lg-3 order-lg-1 order-2">

                </div>
                <div class="col-lg-9 order-1 order-lg-2">
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
                                @foreach($orders as $order)
                                <div class="row shop-list">
                                    <!-- Single-product start -->
                                    @foreach($order->orderItems as $orderItem)
                                    <a href="{{route('getOrderDetails',['order_id'=>Helper::encode($order->id) , 'item_id'=>Helper::encode($orderItem->product_id)])}}">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="pro-img-size">
                                                            <img class="primary-photo" src="{{imageUrl($orderItem->product->productOneImage->name, 'product','product.jpg','false')}}" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8"> 
                                                        <span>{{$orderItem->product->title}}</span>
                                                        <div class="row">
                                                            <span>Size : {{$orderItem->size}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                            ${{number_format($orderItem->price,2)}}
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="order-status">
                                                    @if($order->status == 'process')
                                                        
                                                    @elseif('delivered')

                                                    @elseif('cancel')
                                                    
                                                    @else
                                                        @php 
                                                            $date = strtotime($order->created_at);
                                                            $date = strtotime("+7 day", $date);
                                                            $date = date('M d, Y', $date); 
                                                        @endphp
                                                        <span>Delivery by {{$date}}</span>
                                                    @endif
                                                    <!-- <div>
                                                        <small>Your item has been delivered</small>
                                                    </div> -->
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
                                    </a>
                                    @endforeach
                                    <!-- Single-product end -->
                                </div>
                                @endforeach
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
    .shop-list a {
        padding: 10px;
        width: 100%;
        font-size: 14px;
        overflow: hidden;
        transition: box-shadow .1s linear;
        background-color: #fff;
        border: 1px solid #dbdbdb;
        position: relative;
        cursor: pointer;
        display: block;
        box-shadow: 0 0 0 0 rgb(0 0 0 / 15%);
        margin-bottom: 8px;
        border-radius: 4px;
    }

    .pro-img-size {
        width: 80px;
    }
    .order-status{
        line-height: 20px;
    }
</style>
@endpush