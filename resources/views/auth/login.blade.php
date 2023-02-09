@extends('layouts.app')
@section('title','E-SHOP || Login Page')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area margin-bottom-80"
        style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Login</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-BANNER END -->
    <!-- LOGIN-AREA START -->
    <div class="lognin-area">
        <div class="container">
            <div class="row">
                <!-- Registered-Customers Start -->
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf
                        <div class="new-customers">
                            <h2 class="login-title">LOGIN CUSTOMERS</h2>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="email" class="custom-form" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" required />
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" class="custom-form" name="password" id="password" placeholder="Password" value="" required />
                                </div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" checked="checked" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                    Remember Me.
                                </label>
                                @if (Route::has('password.request'))
                                    <label class="forgot"><a href="{{ route('password.request') }}">Forgot your password?</a></label>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="custom-form custom-submit no-margin mb-0" value="login" />
                                </div>
                                <div class="col-md-6">
                                    <a class="custom-form custom-submit no-margin text-center" href="{{ route('register') }}">Register</a>
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
    $("#loginForm").validate({
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
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            email: {
                required: "This field is required",
                email: "Please enter valid email address"
            },
            password: {
                required: "This field is required",
                minlength: "Please enter min 6 digit Password"
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
                            window.location.replace(res.url);
                        }, 300);
                    } else {
                        toastr.error(res.msg);
                        $('#password').val('');
                    }
                }
            });
            return false;
        }
    });
});
</script>
@endpush