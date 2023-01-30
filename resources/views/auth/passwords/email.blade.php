@extends('layouts.app')
@section('title','E-SHOP || Reset Password Page')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area margin-bottom-80"
        style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Reset Password</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li>Reset Password</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-BANNER END -->
    <!-- Register-AREA START -->
    <div class="lognin-area">
        <div class="container">
            <div class="row">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Registered-Customers Start -->
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('password.email') }}" id="registerForm">
                        @csrf
                        <div class="new-customers">
                            <h2 class="login-title">Reset Password</h2>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="email" class="custom-form" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="custom-form custom-submit no-margin mb-0" value="Send Password Reset Link" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN-AREA END -->
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
    $("#registerForm").validate({
        highlight: function(element, errorClass, validClass) {
            $(element).parents('.form-control').removeClass('has-success').addClass(
                'has-error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.form-control').removeClass('has-error').addClass(
                'has-success');
        },
        errorPlacement: function(error, element) {
            if (element.parent('.pass-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: "This field is required",
                email: "Please enter valid email address"
            }
        }
    });
});
</script>
@endpush