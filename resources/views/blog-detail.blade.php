@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
	<meta name="description" content="{{$post->summary}}">
	<meta property="og:url" content="{{route('getProductDetail',[$post->getCategory->slug,$post->slug])}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$post->title}}">
	<meta property="og:image" content="{{imageUrl($post->image, 'post','post.jpg','false')}}">
	<meta property="og:description" content="{{$post->summary}}">
@endsection
@extends('layouts.app')
@section('title','E-SHOP || BLOG DETAILS PAGE')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area photo-4 margin-bottom-80"
        style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Blog Details</h2>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>Blog Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-BANNER END -->
    <!-- BLOG-AREA START -->
    <div class="blog-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-blog">
                                <div class="blog-photo">
                                    <img src="{{imageUrl($post->image, 'post','post.jpg','false')}}" alt="" />
                                    <div class="blog-post-date">
                                        <span>{{$post->created_at->format('D d')}}th</span>
                                        <span>{{$post->created_at->format('M')}}</span>
                                    </div>
                                </div>
                                <div class="blog-brief">
                                    <h6>{{$post->title}}</h6>
                                    <hr>
                                    {!!$post->description!!}
                                    <div class="like-comment">
                                        <!-- <a href="{{route('getBlogDetail',[$post->getCategory->slug,$post->slug])}}"><i class="sp-like"></i>120 like</a> -->
                                        <a href="{{route('getBlogDetail',[$post->getCategory->slug,$post->slug])}}"><i class="sp-comment"></i>{{count($post->getComment)}} comment</a>
                                    </div>
                                </div>
                            </div>
                            <div class="social-sharing">
                                <h3>Share this post</h3>
                                <div class="sharing-icon">
                                    <a href="#"><i class="sp-facebook"></i></a>
                                    <a href="#"><i class="sp-twitter"></i></a>
                                    <a href="#"><i class="sp-linkedin"></i></a>
                                    <a href="#"><i class="sp-google"></i></a>
                                </div>
                            </div>
                            <div class="author-info">
                                <div class="author-avatar"><img alt="" src="{{imageUrl($post->getUser->image, 'user','user.jpg','false')}}"></div>
                                <div class="author-description">
                                    <h3>About the Author: {{ucfirst($post->getUser->name)}}</h3>
                                    <p>{{$post->summary}}</p>
                                </div>
                            </div>
                            <div class="single-post-comments">
                                <div class="comments-area">
                                    <div class="comments-heading">
                                        <h3>{{count($post->getComment)}} comments</h3>
                                    </div>
                                    <div class="comments-list">
                                        <ul>
                                            @if(count($post->getComment)>0)
                                                @foreach($post->getComment as $key=>$postInfo)
                                                <li>
                                                    <div class="comments-details">
                                                        <div class="comments-list-img">
                                                            <img alt="" src="{{imageUrl($postInfo->user_info->image, 'user','no_image.jpg','false')}}">
                                                        </div>
                                                        <div class="comments-content-wrap">
                                                            <span>
                                                                <b>{{ucfirst($postInfo->user_info->name)}}</b> Post author
                                                                <span class="post-time">{{$postInfo->created_at->format('M d, Y H:s a')}}</span>
                                                            </span>
                                                            <p>{!! $postInfo->comment !!}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            @else
                                                <li><h4 class="text-warning" style="margin:100px auto;">There are no reviews.</h4></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="comment-respond">
                                    <h3 class="comment-reply-title">Leave a Reply</h3>
                                    @auth
                                    <form method="post" action="{{route('commentwAdd',$post->slug)}}" id="commentwForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 comment-form-comment">
                                                <p>Your Comment *</p>
                                                <textarea rows="10" cols="30" name="message" id="message"></textarea>
                                                <input type="submit" value="Post Comment">
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
                <div class="col-lg-3 col-md-4">
                    <!-- widget-brand start -->
                    <aside class="widget widget-brand">
                        <h5 class="sidebar-title">Blog Categories</h5>
                        <ul>
                            @if(count($postCategory)>0)
                            @foreach($postCategory as $postcat)
                            <li><a href="{{route('getCategoryWiseBlogs',$postcat->slug)}}">{{$postcat->title}}</a></li>
                            @endforeach
                            @else
                            <h4 class="text-warning" style="margin:100px auto;">There are no categories.</h4>
                            @endif
                        </ul>
                    </aside>
                    <!-- widget-brand end -->
                    <!-- widget-top-brand start -->
                    <aside class="widget top-rated">
                        <h5 class="sidebar-title">Latest Posts</h5>
                        <div class="sidebar-product">
                            @if(count($latestPosts)>0)
                                @foreach($latestPosts as $post)
                                <!-- Single-product start -->
                                <div class="single-product">
                                    <div class="product-photo">
                                        <a href="{{route('getBlogDetail',[$post->getCategory->slug,$post->slug])}}">
                                            <img class="primary-photo"
                                                src="{{imageUrl($post->image, 'post','post.jpg','false')}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-brief">
                                        <h2><a href="{{route('getBlogDetail',[$post->getCategory->slug,$post->slug])}}">{{$post->title}}</a></h2>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                @endforeach
                            @else
                            <h4 class="text-warning" style="margin:100px auto;">There are no latest posts.</h4>
                            @endif
                        </div>
                    </aside>
                    <!-- widget-top-brand end -->
                    <!-- widget sidebar-banner start -->
                    <aside class="widget sidebar-banner margin-mbl">
                        <a href="#"><img src="{{asset('assets/img/banner/sidebar-1.jpg')}}" alt="" /></a>
                    </aside>
                    <!-- widget sidebar-banner start -->
                </div>
            </div>
        </div>
    </div>
    <!-- BLOG-AREA END -->
    <!-- BRAND-LOGO-AREA START -->
    <div class="brand-logo-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="brand-brief">
                        <h2 class="border-left-right">they are with us</h2>
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
            message: {
                required: true,
            }
        },
        messages: {
            message: {
                required: "This field is required",
            }
        }
    });
});
</script>
@endpush