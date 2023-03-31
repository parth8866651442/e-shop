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
    <div class="page-banner-area margin-bottom-80"
        style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
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
                            <div role="tabpanel" class="tab-pane {{($key == 0) ? 'active show':  ''}}"
                                id="img-{{$key}}">
                                <img src="{{imageUrl($image->name, 'product','product.jpg','false')}}" alt="" />
                                <a href="{{imageUrl($image->name, 'product','product.jpg','false')}}"
                                    data-lightbox="roadtrip" data-title="My caption">
                                    <span class="view-full-screen"><i class="sp-full-view"></i> view full screen</span>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav">
                            @foreach($product->ProductImages as $key=>$image)
                            <li class="{{($key == 0) ? 'active':  ''}}"><a href="#img-{{$key}}"
                                    data-bs-toggle="tab"><img
                                        src="{{imageUrl($image->name, 'product','product.jpg','false')}}" alt="" /></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <form action="{{route('addToCart',$product->slug)}}" method="POST">
                        @csrf
                        <div class="single-product-description">
                            <h3 class="title-3">{{$product->title}}</h3>
                            <h4>
                                @php
                                $after_discount=($product->price-($product->price*$product->discount)/100);
                                @endphp
                                {{numberFormat($after_discount,2)}}
                                <del style="padding-left:4%;">{{numberFormat($product->price,2)}}</del>
                            </h4>
                            <div class="rating">
                                <span class="pro-comments-rating">
                                    @for($i=1; $i<=5; $i++) @if($product->getReview->avg('rate')>=$i)
                                        <i class="sp-star rating-1"></i>
                                        @else
                                        <i class="sp-star"></i>
                                        @endif
                                        @endfor
                                </span>
                                <span class="total-review">({{count($product->getReview)}}) Review</span>
                            </div>
                            @if($product->size)
                            <div class="pro-size">
                                <span>Size</span>
                                @php
                                $sizes=explode(',',$product->size);
                                @endphp
                                <select class="form-select form-select-sm" name="size">
                                    @foreach($sizes as $size)
                                    <option value="{{$size}}">{{ucfirst($size)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="product-counts fix margin-top-80">
                                <div class="cart-plus-minus"><input type="text" name="qty" min="1" value="1" /></div>
                                <div class="single-pro-add-cart">
                                    <input type="submit" class="shop-now" value="Add to cart">
                                </div>
                            </div>
                            <div class="single-pro-share">
                                <ul>
                                    <!-- <li><a href="#"><i class="sp-share"></i><span>Share</span></a></li> -->
                                    <!-- <li><a href="#"><i class="sp-heart"></i><span>Add to Wishlist</span></a></li> -->
                                </ul>
                            </div>
                            <div class="categories-tags">
                                <div class="categories">
                                    <span>Categories:</span>
                                    <a
                                        href="{{route('getCategoryWiseproducts',$product->parentCategory->slug)}}">{{$product->parentCategory->title}},</a>
                                    <a
                                        href="{{route('getSubCategoryWiseproducts',[$product->parentCategory->slug,$product->childCategory->slug])}}">{{$product->childCategory->title}}</a>
                                </div>
                                <div class="categories summary">
                                    <span>Summary:</span>
                                    <p>{{$product->summary}}</p>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                    <div class="single-post-comments">
                                        <div class="comments-area">
                                            <div class="comments-heading">
                                                <h3>{{count($product->getReview)}} comments</h3>
                                            </div>
                                            <div class="comments-list">
                                                <ul>
                                                @if(count($product->getReview)>0)
                                                    @foreach($product->getReview as $key=>$review)
                                                        <li>
                                                            <div class="comments-details">
                                                                <div class="comments-list-img">
                                                                    <img alt="" src="{{imageUrl($review->user_info->image, 'user','no_image.jpg','false')}}">
                                                                </div>
                                                                <div class="comments-content-wrap">
                                                                    <span>
                                                                        <b>{{ucfirst($review->user_info->name)}}</b> -
                                                                        <span class="post-time">{{$review->created_at->format('M d, Y H:s a')}}</span>
                                                                    </span>
                                                                    <span class="pro-comments-rating">
                                                                        @for($i=1; $i<=5; $i++) 
                                                                            @if($review->rate>=$i)
                                                                            <i class="sp-star rating-1"></i>
                                                                            @else
                                                                            <i class="sp-star"></i>
                                                                            @endif
                                                                        @endfor
                                                                    </span>
                                                                    <p>{!! $review->message !!}</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <h4 class="text-warning" style="margin:100px auto;">There are no reviews.</h4>
                                                @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="comment-respond">
                                            <h3 class="comment-reply-title">Add a review </h3>
                                            @auth
                                            <span class="email-notes">Your email address will not be published. Required fields are marked *</span>
                                            <form method="post" action="{{route('reviewAdd',$product->slug)}}" id="reviewForm">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p>Rate</p>
                                                        <div class="your-rating">
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rate" value="5" />
                                                                <label for="star5" title="Excellent">5 stars</label>
                                                                <input type="radio" id="star4" name="rate" value="4" />
                                                                <label for="star4" title="Very Good">4 stars</label>
                                                                <input type="radio" id="star3" name="rate" value="3" />
                                                                <label for="star3" title="Good">3 stars</label>
                                                                <input type="radio" id="star2" name="rate" value="2" />
                                                                <label for="star2" title="Bad">2 stars</label>
                                                                <input type="radio" id="star1" name="rate" value="1" />
                                                                <label for="star1" title="Very Bad">1 star</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p>Name *</p>
                                                        <input type="text" placeholder="your name" name="name" value="{{isset(auth()->user()->name) ? auth()->user()->name : ''}}" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p>Email *</p>
                                                        <input type="email" placeholder="your email" name="email" value="{{isset(auth()->user()->name) ? auth()->user()->email : ''}}" />
                                                    </div>
                                                    <div class="col-lg-12 comment-form-comment">
                                                        <p>Message</p>
                                                        <textarea id="message" rows="10" cols="30" placeholder="Your Rating" name="message"></textarea>
                                                        <input type="submit" value="Submit">
                                                    </div>
                                                </div>
                                            </form>
                                            @else 
                                                <p class="text-center p-5"> You need to <a href="{{route('login')}}" style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue" href="{{route('register')}}">Register</a> for comment. </p>
                                            @endauth
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
                        <img class="primary-photo"
                            src="{{imageUrl($reProduct->productOneImage->name, 'product','product.jpg','false')}}"
                            alt="" />
                        <img class="secondary-photo"
                            src="{{imageUrl($reProduct->productOneImage->name, 'product','product.jpg','false')}}"
                            alt="" />
                    </a>
                    <div class="pro-action">
                        <!-- <a href="#" class="action-btn"><i class="sp-heart"></i><span>Wishlist</span></a> -->
                        <a href="{{route('addToCart',$reProduct->slug)}}" class="action-btn"><i
                                class="sp-shopping-cart"></i><span>Add to cart</span></a>
                    </div>
                </div>
                <div class="product-brief">
                    <h2><a href="{{route('getProductDetail',$reProduct->slug)}}">{{$reProduct->title}}</a></h2>
                    <h3>
                        @php
                        $afterDiscount=($reProduct->price-($reProduct->price*$reProduct->discount)/100);
                        @endphp
                        {{numberFormat($afterDiscount,2)}}
                        <del style="padding-left:4%;">{{numberFormat($reProduct->price,2)}}</del>
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

@push('styles')
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>
@endpush


@push('scripts')
<script>
$(document).ready(function() {
    $("#reviewForm").validate({
        highlight: function(element, errorClass, validClass) {
            $(element).parents('.form-control').removeClass('has-success').addClass(
                'has-error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.form-control').removeClass('has-error').addClass(
                'has-success');
        },
        errorPlacement: function(error, element) {
            if (element.hasClass('select2') && element.next('.select2-container').length) {
                error.insertAfter(element.next('.select2-container'));
            } else if (element.parent('.pass-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            name: {
                required: "This field is required",
            },
            email: {
                required: "This field is required",
                email: "Please enter valid email address"
            },
            message: {
                required: "This field is required",
            }
        }
    });
});
</script>
@endpush