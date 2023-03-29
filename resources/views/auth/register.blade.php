@extends('layouts.app')
@section('title','E-SHOP || Register Page')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area margin-bottom-80"
        style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Register</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li>Register</li>
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
                <!-- Registered-Customers Start -->
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf
                        <div class="new-customers">
                            <h2 class="login-title">REGISTER CUSTOMERS</h2>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" class="custom-form" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required />
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" class="custom-form" name="mobile_no" id="mobile_no" placeholder="Mobile Numbar" value="{{ old('mobile_no') }}" required />
                                </div>
                                <div class="col-lg-12">
                                    <input type="email" class="custom-form" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" required />
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" class="custom-form" name="password" id="password" placeholder="Password" value="" required />
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" class="custom-form" name="password_confirmation" id="password-confirm" placeholder="Confirm Password" value="" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="custom-form custom-submit no-margin mb-0" value="Register" />
                                </div>
                                <div class="col-md-6">
                                    <a class="custom-form custom-submit no-margin text-center" href="{{ route('login') }}">login</a>
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
            name: {
                required: true
            },
            mobile_no: {
                required: true,
                number: true,
                minlength: 10
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            },
        },
        messages: {
            name: {
                required: "This field is required"
            },
            mobile_no: {
                required: "This field is required",
                number: "Please enter numbers only",
                minlength: "Please enter min 10 digit number"
            },
            email: {
                required: "This field is required",
                email: "Please enter valid email address"
            },
            password: {
                required: "This field is required",
                minlength: "Please enter min 6 digit Password"
            },
            password_confirmation: {
                required: "This field is required",
                equalTo: "Confirm password doesn't match New password"
            }
        },
        submitHandler: function(form) {
            $.ajax({
                type: form.method,
                url: form.action,
                data: $(form).serialize(),
                success: function(res) {
                    if (res.status) {
                        toastr.success(res.msg);
                        setTimeout(() => {
                            window.location.replace(res.base_url+'/'+res.url);
                        }, 300);
                    } else {
                        toastr.error(res.msg);
                        $('#password').val('');
                        $('#password-confirm').val('');
                        setTimeout(() => {
                            window.location.replace(res.url);
                        }, 300);
                    }
                }
            });
            return false;
        }
    });
});
</script>
@endpush
