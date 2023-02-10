@extends('layouts.app')
@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
	<meta name="description" content="{{$product->summary}}">
	<meta property="og:url" content="{{route('getProductDetail',$product->slug)}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$product->title}}">
	<meta property="og:image" content="{{imageUrl($product->ProductImages[0]->name, 'product','product.jpg','false')}}">
	<meta property="og:description" content="{{$product->summary}}">
@endsection
@section('title','E-SHOP || PRODUCT DETAILS PAGE')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area margin-bottom-80" style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Product Details</h2>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>Product Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-BANNER END -->
    <!-- SINGLE-PRODUCT-AREA START -->
    <div class="single-product-aea margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-tab-content">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @foreach($product->ProductImages as $key=>$image)
                            <div role="tabpanel" class="tab-pane {{($key == 0) ? 'active show':  ''}}" id="img-{{$key}}">
                                <img src="{{imageUrl($image->name, 'product','product.jpg','false')}}" alt="" />
                                <a href="{{imageUrl($image->name, 'product','product.jpg','false')}}" data-lightbox="roadtrip" data-title="My caption">
                                    <span class="view-full-screen"><i class="sp-full-view"></i> view full screen</span>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav">
                            @foreach($product->ProductImages as $key=>$image)
                            <li class="{{($key == 0) ? 'active':  ''}}"><a href="#img-{{$key}}" data-bs-toggle="tab"><img src="{{imageUrl($image->name, 'product','product.jpg','false')}}" alt="" /></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-description">
                        <h3 class="title-3">Easy-iron Shirt</h3>
                        <h4>
                        @php
                        $after_discount=($product->price-($product->price*$product->discount)/100);
                        @endphp
                            ${{number_format($after_discount,2)}}
                        <del style="padding-left:4%;">${{number_format($product->price,2)}}</del>
                        </h4>
                        @if($product->size)
                            <div class="pro-size">
                                <span>Size</span>
                                @php 
                                    $sizes=explode(',',$product->size);
                                    // dd($sizes);
                                @endphp
                                <select class="form-select form-select-sm" name="size">
                                    @foreach($sizes as $size)
                                        <option value="{{$size}}">{{ucfirst($size)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="product-counts fix margin-top-80">
                            <form action="#">
                                <div class="cart-plus-minus"><input type="text" name="qty" min="1" value="1"/></div>
                            </form>
                            <div class="single-pro-add-cart">
                                <a class="shop-now" href="#">Add to cart</a>
                            </div>
                        </div>
                        <div class="single-pro-share">
                            <ul>
                                <!-- <li><a href="#"><i class="sp-share"></i><span>Share</span></a></li> -->
                                <li><a href="#"><i class="sp-heart"></i><span>Add to Wishlist</span></a></li>
                            </ul>
                        </div>
                        <div class="categories-tags">
                            <div class="categories">
                                <span>CATEGORIES:</span>
                                <a href="{{route('getCategoryWiseproducts',$product->parentCategory->slug)}}">{{$product->parentCategory->title}},</a>
                                <a href="{{route('getSubCategoryWiseproducts',[$product->parentCategory->slug,$product->childCategory->slug])}}">{{$product->childCategory->title}}</a>
                            </div>
                            <!-- <div class="categories tags">
                                <span>Tags:</span>
                                <a href="#">Lighting,</a>
                                <a href="#">Outdoor,</a>
                            </div> -->
                            <div class="categories summary">
                                <span>Summary:</span>
                                <p>{{$product->summary}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SINGLE-PRODUCT-AREA END -->
    <!-- SINGLE-PRODUCT-REVIEWS-AREA START -->
    <div class="single-product-reviews-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="discription-reviews-tab">
                        <!-- Nav tabs -->
                        <ul class="nav reviews-tab-menu" role="tablist">
                            <li role="presentation"><a class="active" href="#description"
                                    data-bs-toggle="tab">Description</a></li>
                            <li role="presentation"><a href="#reviews" data-bs-toggle="tab">Reviews</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <div class="single-pro-product-description">
                                    {!! ($product->description) !!}
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="reviews">
                                <div class="product-page-comments">
                                    <h2>1 review for Integer consequat ante lectus</h2>
                                    <ul>
                                        <li>
                                            <div class="product-comments">
                                                <img src="{{asset('assets/img/author.jpg')}}" alt="" />
                                                <div class="product-comments-content">
                                                    <p><strong>admin</strong> -
                                                        <span>March 7, 2015:</span>
                                                        <span class="pro-comments-rating">
                                                            <i class="sp-star"></i>
                                                            <i class="sp-star"></i>
                                                            <i class="sp-star"></i>
                                                            <i class="sp-star"></i>
                                                        </span>
                                                    </p>
                                                    <div class="desc">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                                        fringilla augue nec est tristique auctor. Donec non est at
                                                        libero vulputate rutrum.
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="review-form-wrapper">
                                        <h3>Add a review</h3>
                                        <form action="#">
                                            <input type="text" placeholder="your name" name="firstname" />
                                            <input type="email" placeholder="your email" name="email" />
                                            <div class="your-rating">
                                                <h5>Your Rating</h5>
                                                <span>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                </span>
                                                <span>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                </span>
                                                <span>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                </span>
                                                <span>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                    <a href="#"><i class="sp-star"></i></a>
                                                </span>
                                            </div>
                                            <textarea id="product-message" cols="30" rows="10"
                                                placeholder="Your Rating"></textarea>
                                            <input type="submit" value="submit" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SINGLE-PRODUCT-REVIEWS-AREA END -->
    <!-- SINGLE-PRODUCT-RELATED-AREA START -->
    <div class="single-product-related-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="related-product-title">
                        <h3>Related Product</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="active-related-product shop-grid">
            <!-- Single-product start -->
            @foreach($relatedProduct as $reProduct)
            <div class="single-product">
                <div class="product-photo">
                    <a href="{{route('getProductDetail',$reProduct->slug)}}">
                        <img class="primary-photo" src="{{imageUrl($reProduct->productOneImage->name, 'product','product.jpg','false')}}" alt="" />
                        <img class="secondary-photo" src="{{imageUrl($reProduct->productOneImage->name, 'product','product.jpg','false')}}" alt="" />
                    </a>
                    <div class="pro-action">
                        <a href="#" class="action-btn"><i class="sp-heart"></i><span>Wishlist</span></a>
                        <a href="#" class="action-btn"><i class="sp-shopping-cart"></i><span>Add to cart</span></a>
                    </div>
                </div>
                <div class="product-brief">
                    <h2><a href="{{route('getProductDetail',$reProduct->slug)}}">{{$reProduct->title}}</a></h2>
                    <h3>
                        @php
                            $afterDiscount=($reProduct->price-($reProduct->price*$reProduct->discount)/100);
                        @endphp
                        ${{number_format($afterDiscount,2)}}
                        <del style="padding-left:4%;">${{number_format($reProduct->price,2)}}</del>
                    </h3>
                </div>
            </div>
            @endforeach
            <!-- Single-product end -->
        </div>
    </div>
    <!-- SINGLE-PRODUCT-RELATED-AREA END -->
    <!-- SERVICE-AREA START -->
    <div class="service-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="sp-transport"></i>
                        </div>
                        <div class="service-brief">
                            <h3>free shipping</h3>
                            <p>There are many variations of passages of Lorem Ipsum available, alteration</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="sp-head-phone"></i>
                        </div>
                        <div class="service-brief">
                            <h3>help line</h3>
                            <p>(+112) 1925184203 - call any time for any support Lorem Ipsum available, alteration </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="sp-business"></i>
                        </div>
                        <div class="service-brief">
                            <h3>money back guarantee</h3>
                            <p>There are many variations of passages of Lorem Ipsum available, alteration</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SERVICE-AREA END -->
</section>
@endsection