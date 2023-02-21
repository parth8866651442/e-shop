@extends('layouts.app')
@section('title','E-SHOP || BLOGS PAGE')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area photo-4 margin-bottom-80" style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Blogs</h2>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>Blogs</li>
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
                        @if(count($posts)>0)
                            @foreach($posts as $post)
                            <div class="col-lg-6">
                                <div class="single-blog">
                                    <div class="blog-photo">
                                        <a href="{{route('getBlogDetail',[$post->getCategory->slug,$post->slug])}}"><img src="{{imageUrl($post->image, 'post','post.jpg','false')}}" alt="" /></a>
                                        <div class="blog-post-date">
                                            <span>{{$post->created_at->format('D d')}}th</span>
                                            <span>{{$post->created_at->format('M')}}</span>
                                        </div>
                                    </div>
                                    <div class="blog-brief">
                                        <a href="{{route('getBlogDetail',[$post->getCategory->slug,$post->slug])}}"><h6>{{$post->title}}</h6></a>
                                        <p>{{$post->summary}}</p>
                                        <div class="like-comment">
                                            <!-- <a href="{{route('getBlogDetail',[$post->getCategory->slug,$post->slug])}}"><i class="sp-like"></i>120 like</a> -->
                                            <a href="{{route('getBlogDetail',[$post->getCategory->slug,$post->slug])}}"><i class="sp-comment"></i>{{count($post->getComment)}} comment</a>
                                        </div>
                                        <a class="shop-now" href="{{route('getBlogDetail',[$post->getCategory->slug,$post->slug])}}">Read more</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            {{$posts->links()}}
                        @else
                            <h4 class="text-warning" style="margin:100px auto;">There are no blog.</h4>
                        @endif
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
                                                <img class="primary-photo" src="{{imageUrl($post->image, 'post','post.jpg','false')}}" alt="" />
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