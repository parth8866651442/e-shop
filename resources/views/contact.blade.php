@extends('layouts.app')
@section('title','E-SHOP || CONTACT PAGE')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area margin-bottom-80" style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Contact</h2>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-BANNER END -->
    <!-- CONTACT-AREA START -->
    <div class="contact-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <!-- Start Map area -->
                    <div class="map-area">
                        <div id="googleMap" style="width:100%;height:350px;"></div>
                    </div>
                    <!-- End Map area -->
                    <div class="row">
                        <!-- contact-info start -->
                        <div class="col-lg-12">
                            <div class="contact-info">
                                <h3>Contact info</h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-map-marker"></i> <strong>Address:</strong>
                                        1234 Pall Mall Street, London England
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i> <strong>Phone:</strong>
                                        +8801234-123456
                                    </li>
                                    <li>
                                        <i class="fa fa-mobile"></i> <strong>Email:</strong>
                                        <a href="#">your-email@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- contact-info end -->
                        <div class="col-lg-12">
                            <div class="contact-form-wrap">
                                <h3><i class="fa fa-envelope-o"></i> Leave a Message</h3>
                                <form id="contact-form" action="https://whizthemes.com/mail-php/other/mail.php">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input name="con_name" type="text" placeholder="Name (required)" />
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="con_email" type="email" placeholder="Email (required)" />
                                        </div>
                                        <div class="col-lg-12">
                                            <input name="con_subject" type="text" placeholder="Subject" />
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="con_message" id="message" cols="30" rows="10"
                                                placeholder="Message"></textarea>
                                            <button type="submit">Submit Form</button>
                                            <p class="form-message"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT-AREA END -->
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