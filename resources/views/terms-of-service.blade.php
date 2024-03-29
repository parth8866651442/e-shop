@extends('layouts.app')
@section('title','E-SHOP || TERS OF SERVICE PAGE')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area photo-2 margin-bottom-80" style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Ters of Service</h2>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>Ters of Service</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-BANNER END -->
    <!-- ABOUT-AREA START -->
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                    <div class="about-us">
                        <div class="about-us-photo">
                            <img src="{{asset('assets/img/banner/about.jpg')}}" alt="" />
                        </div>
                        <div class="about-us-brief">
                            <h2>About us</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.It has
                                survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT-AREA END -->
    <!-- ABOUT-BANNER START -->
    <div class="about-banner-area margin-bottom-80" style="background-image: url('{{asset('assets/img/banner/about-banner.jpg')}}')">
        <div class="about-banner-overlay"></div>
    </div>
    <!-- ABOUT-BANNER END -->
    <!-- SUPPORT-AREA START -->
    <div class="support-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-support">
                        <i class="pe-7s-cup"></i>
                        <h3><a href="#">quality product</a></h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-support">
                        <i class="pe-7s-medal"></i>
                        <h3><a href="#">unique designs</a></h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-support">
                        <i class="pe-7s-graph"></i>
                        <h3><a href="#">best materials</a></h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-support">
                        <i class="pe-7s-display2"></i>
                        <h3><a href="#">responcive design</a></h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-support">
                        <i class="pe-7s-photo-gallery"></i>
                        <h3><a href="#">full freash</a></h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-support">
                        <i class="pe-7s-diamond"></i>
                        <h3><a href="#">fashionable design</a></h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SUPPORT-AREA END -->
    <!-- OUR-TEAM-AREA START -->
    <div class="our-team-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-2">
                        <h2 class="border-left-rights">Our Team</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single-team Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-best-sell-2">
                        <img src="{{asset('assets/img/team/1.jpg')}}" alt="" />
                        <div class="best-sell-2-brief">
                            <h3><a href="#">mini mike</a></h3>
                            <h3><span>ceo</span></h3>
                        </div>
                    </div>
                </div>
                <!-- Single-team End -->
                <!-- Single-team Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-best-sell-2">
                        <img src="{{asset('assets/img/team/2.jpg')}}" alt="" />
                        <div class="best-sell-2-brief">
                            <h3><a href="#">jonathone doe</a></h3>
                            <h3><span>faunder</span></h3>
                        </div>
                    </div>
                </div>
                <!-- Single-team End -->
                <!-- Single-team Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-best-sell-2">
                        <img src="{{asset('assets/img/team/3.jpg')}}" alt="" />
                        <div class="best-sell-2-brief">
                            <h3><a href="#">tjems smith</a></h3>
                            <h3><span>co-faunder</span></h3>
                        </div>
                    </div>
                </div>
                <!-- Single-team End -->
            </div>
        </div>
    </div>
    <!-- OUR-TEAM-AREA END -->
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
    <!-- TESTIMONIAL-AREA START -->
    <div class="testimonial-area margin-bottom-80">
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
                                            <h4>jorina doe</h4>
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
                                            <h4>jorina doe</h4>
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
    <!-- SUBSCRIBE-AREA START -->
    <div class="suscribe-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="subscribe">
                        <div class="subscribe-brief">
                            <h3>enter your email address</h3>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p>
                        </div>
                        <div class="subscribe-form">
                            <form action="#">
                                <input type="text" placeholder="Enter email to subscribe" />
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SUBSCRIBE-AREA START END -->
</section>
@endsection