@extends('layouts.app')
@section('title','E-SHOP || HOME PAGE')
@section('content')
<section class="page-content">
    <!-- SLIDER-AREA START -->
    <div class="slider-area margin-bottom-80">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                @foreach($banners as $key=>$banner)
                    <img src="{{imageUrl($banner->image, 'banner','banner.jpg','false')}}" alt="#" title="#slider-direction-{{$key}}" />
                @endforeach
            </div>
            @foreach($banners as $key=>$banner)
                <div id="slider-direction-{{$key}}" class="t-cn slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lfl s-tb">
                        <div class="title-container s-tb-c title-compress">
                            <div class="slider-1">
                                <div class="wow fadeInUpBig" data-wow-duration="1.2s" data-wow-delay="0.5s">
                                    <h1 class="title1">{{$banner->title}}</h1>
                                </div>
                                <div class="image wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0.7s">
                                    <span><img src="{{asset('assets/img/slider/slider-1/slider-border.png')}}" alt="" /></span>
                                </div>
                                <div class="wow fadeInUpBig" data-wow-duration="1.8s" data-wow-delay="0.9s">
                                    <p class="slider-brief">{!! html_entity_decode($banner->description) !!}</p>
                                </div>
                                <!-- <div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="1.1s">
                                    <a href="#" class="shop-now">shop now</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- SLIDER-AREA END -->
    <!-- NEW-COLLECTION START -->
    <div class="new-collection-area fix margin-bottom-80">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="border-left-right-btm">New Collection</h2>
                </div>
            </div>
            @foreach($categories as $category)
            <div class="col-xl-4 col-md-6 col-sm-6 padding-0">
                <div class="single-collection">
                    <div class="collection-photo">
                        <a href="{{route('getCategoryWiseproducts',$category->slug)}}"><img src="{{imageUrl($category->image, 'category','category.jpg','false')}}" alt="#" /></a>
                    </div>
                    <div class="collection-brief">
                        <div class="text-right">
                            <span class="new">new</span>
                        </div>
                        <h2>new <br /> <span>{{$category->title}}</span></h2>
                        <a href="{{route('getCategoryWiseproducts',$category->slug)}}" class="shop-now active-shop-now">shop now</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- <div class="col-xl-4 col-md-6 col-sm-6 padding-0">
                <div class="single-collection">
                    <div class="collection-photo">
                        <a href="#"><img src="{{asset('assets/img/new-collection/2.jpg')}}" alt="" /></a>
                    </div>
                    <div class="collection-brief">
                        <div class="text-right">
                            <span class="new">new</span>
                        </div>
                        <h2>new <br /> <span>fashion</span></h2>
                        <a href="#" class="shop-now active-shop-now">shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-6 padding-0">
                <div class="single-collection">
                    <div class="collection-photo">
                        <a href="#"><img src="{{asset('assets/img/new-collection/3.jpg')}}" alt="" /></a>
                    </div>
                    <div class="collection-brief">
                        <div class="text-right">
                            <span class="new">new</span>
                        </div>
                        <h2>new <br /> <span>fashion</span></h2>
                        <a href="#" class="shop-now active-shop-now">shop now</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- NEW-COLLECTION END -->
    <!-- PRODUCT-AREA START -->
    <div class="product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="border-left-right-btm">All Product's</h2>
                    </div>
                </div>
            </div>
        </div>
        <div id="active-product" class="product-slider">
            <!-- Single-product start -->
            @foreach($products as $product)
            <div class="single-product">
                <div class="product-photo">
                    <a href="{{route('getProductDetail',$product->slug)}}">
                        <img class="primary-photo" src="{{imageUrl($product->productOneImage->name, 'product','product.jpg','false')}}" alt="" />
                        <!-- <img class="primary-photo" src="{{asset('assets/img/product/1.jpg')}}" alt="" /> -->
                        <!-- <img class="secondary-photo" src="{{asset('assets/img/product/5.jpg')}}" alt="" /> -->
                    </a>
                    <div class="pro-action">
                        <a href="#" class="action-btn"><i class="sp-heart"></i><span>Wishlist</span></a>
                        <a href="#" class="action-btn"><i class="sp-shopping-cart"></i><span>Add to cart</span></a>
                    </div>
                </div>
                <div class="product-brief">
                    <div class="pro-rating">
                        <a href="#"><i class="sp-star rating-1"></i></a>
                        <a href="#"><i class="sp-star rating-1"></i></a>
                        <a href="#"><i class="sp-star rating-1"></i></a>
                        <a href="#"><i class="sp-star rating-1"></i></a>
                        <a href="#"><i class="sp-star rating-2"></i></a>
                    </div>
                    <h2><a href="{{route('getProductDetail',$product->slug)}}">{{$product->title}}</a></h2>
                    <h3>
                        @php
                            $after_discount=($product->price-($product->price*$product->discount)/100);
                        @endphp
                        ${{number_format($after_discount,2)}}
                        <del style="padding-left:4%;">${{number_format($product->price,2)}}</del>
                    </h3>
                </div>
            </div>
            @endforeach
            <!-- Single-product end -->
        </div>
    </div>
    <!-- PRODUCT-AREA END -->
    <!-- PROMOTIONAL-BANNER START -->
    <div class="promotional-banner-area clearfix margin-bottom-80">
        <div class="promotional-banner">
            <div class="container-fluid p-0 overflow-hidden">
                <div class="row">
                    <!-- Single-promo start -->
                    <div class="col-lg-6 padding-0">
                        <div class="single-promo-banner promo-banner-1" style="background: rgba(0, 0, 0, 0) url('{{asset('assets/img/banner/promo-banner/1.jpg')}}') no-repeat scroll center center;">
                            <!-- <img src="img/banner/promo-banner/1.jpg" alt="" /> -->
                            <div class="promo-banner-brief">
                                <h2>sale !</h2>
                                <h3>up to <span>30%</span> off</h3>
                                <h4>mens best products</h4>
                                <a class="shop-now active-shop-now" href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single-promo End -->
                    <!-- Single-promo start -->
                    <div class="col-lg-6 padding-0">
                        <div class="single-promo-banner promo-banner-2" style="background: rgba(0, 0, 0, 0) url('{{asset('assets/img/banner/promo-banner/2.jpg')}}') no-repeat scroll center center;">
                            <!-- <img src="img/banner/promo-banner/2.jpg" alt="" /> -->
                            <div class="promo-banner-brief">
                                <div class="count-down">
                                    <div class="timer">
                                        <div data-countdown="2022/12/31"></div>
                                    </div>
                                </div>
                                <div class="upcomming-brief">
                                    <h2>upcomming best collection</h2>
                                    <h3><span>degles</span> warm</h3>
                                    <ul>
                                        <li>100% cotton</li>
                                        <li>best manufacturing</li>
                                        <li>high quality materials</li>
                                    </ul>
                                    <a class="shop-now" href="#">pre order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single-promo End -->
                </div>
            </div>
        </div>
    </div>
    <!-- PROMOTIONAL-BANNER END -->
    <!-- FEATURED-AREA START -->
    <div class="featured-area margin-bottom-80">
        <div class="container">
            <div class="row cus-row-1">
                <div class="single-featured single-featured-1 featured-link">
                    <a href="#"><img src="{{asset('assets/img/featured/1.jpg')}}" alt="" /></a>
                    <div class="featured-brief">
                        <a href="#"><i class="sp-arrow-long-right"></i></a>
                    </div>
                </div>
                <div class="single-featured single-featured-2">
                    <div class="single-featured-inner featured-link">
                        <a href="#"><img src="{{asset('assets/img/featured/2.jpg')}}" alt="" /></a>
                        <div class="featured-brief">
                            <a href="#"><i class="sp-arrow-long-right"></i></a>
                        </div>
                    </div>
                    <div class="single-featured-inner featured-link">
                        <a href="#"><img src="{{asset('assets/img/featured/3.jpg')}}" alt="" /></a>
                        <div class="featured-brief">
                            <a href="#"><i class="sp-arrow-long-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="single-featured single-featured-1 featured-link">
                    <a href="#"><img src="{{asset('assets/img/featured/4.jpg')}}" alt="" /></a>
                    <div class="featured-brief">
                        <a href="#"><i class="sp-arrow-long-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURED-AREA END -->
    <!-- TESTIMONIAL-AREA START -->
    <div class="testimonial-area margin-bottom-80" style="background: rgba(0, 0, 0, 0) url('{{asset('assets/img/bg/testimonial-bg.jpg')}}') no-repeat scroll center center;">
        <div class="testimonial">
            <h2><sup><i class="sp-quote"></i></sup> they love us</h2>
            <div class="testimonial-border">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="active-testimonial">
                                <div class="single-testimonial row">
                                    <div class="col-lg-4">
                                        <div class="client-photo">
                                            <img src="{{asset('assets/img/testimonial/1.png')}}" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="client-opinion">
                                            <h3>jorina doe</h3>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                                rootsContrary to popular belief, Lorem Ipsum is not simply random text.
                                                It has roots. Contrary to popular belief, Lorem Ipsum is not simply
                                                random text. It has roots Contrary to popular belief, </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-testimonial row">
                                    <div class="col-lg-4">
                                        <div class="client-photo">
                                            <img src="{{asset('assets/img/testimonial/1.png')}}" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="client-opinion">
                                            <h3>jorina doe</h3>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                                rootsContrary to popular belief, Lorem Ipsum is not simply random text.
                                                It has roots. Contrary to popular belief, Lorem Ipsum is not simply
                                                random text. It has roots Contrary to popular belief, </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL-AREA END -->
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
    <!-- BLOG-AREA START -->
    <div class="blog-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>from blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="blog-photo">
                            <a href="#"><img src="{{asset('assets/img/blog/1.jpg')}}" alt="" /></a>
                            <div class="blog-post-date">
                                <span>15th</span>
                                <span>Jan</span>
                            </div>
                        </div>
                        <div class="blog-brief">
                            <p>Lorem ipsum dolr sit amet, It is not simply random text. It has roots...</p>
                            <div class="like-comment">
                                <a href="#"><i class="sp-like"></i>120 like</a>
                                <a href="#"><i class="sp-comment"></i>60 comment</a>
                            </div>
                            <a class="shop-now" href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="blog-photo">
                            <a href="#"><img src="{{asset('assets/img/blog/2.jpg')}}" alt="" /></a>
                            <div class="blog-post-date">
                                <span>13th</span>
                                <span>Feb</span>
                            </div>
                        </div>
                        <div class="blog-brief">
                            <p>Lorem ipsum dolr sit amet, It is not simply random text. It has roots...</p>
                            <div class="like-comment">
                                <a href="#"><i class="sp-like"></i>120 like</a>
                                <a href="#"><i class="sp-comment"></i>60 comment</a>
                            </div>
                            <a class="shop-now" href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="blog-photo">
                            <a href="#"><img src="{{asset('assets/img/blog/3.jpg')}}" alt="" /></a>
                            <div class="blog-post-date">
                                <span>25th</span>
                                <span>Feb</span>
                            </div>
                        </div>
                        <div class="blog-brief">
                            <p>Lorem ipsum dolr sit amet, It is not simply random text. It has roots...</p>
                            <div class="like-comment">
                                <a href="#"><i class="sp-like"></i>120 like</a>
                                <a href="#"><i class="sp-comment"></i>60 comment</a>
                            </div>
                            <a class="shop-now" href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BLOG-AREA END -->
</section>
@endsection