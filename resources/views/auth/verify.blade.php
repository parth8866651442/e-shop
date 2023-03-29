@extends('layouts.app')
@section('title','E-SHOP || Verify Email Page')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area margin-bottom-80"
        style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Verify Email</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li>Verify Email</li>
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
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="new-customers">
                            <h2 class="login-title">Verify Your Email Address</h2>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Before proceeding, please check your email for a verification link.</p>
                                    <p>If you did not receive the email</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="custom-form custom-submit no-margin mb-0" value="Resend verify email link" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN-AREA END -->
</section>
@endsection
