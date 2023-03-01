@extends('layouts.app')
@section('title','E-SHOP || MY ACCOUNT PAGE')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area margin-bottom-80"
        style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">My Account</h2>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-BANNER END -->
    <!-- MY-ACCOUNT-AREA START -->
    <div class="my-account-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel-group  margin-btm-0" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a role="button" data-bs-toggle="collapse" href="#personal-info"
                                        aria-expanded="true">
                                        <i class="pe-7s-bookmarks"></i>
                                        <span>My Personal Information</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="personal-info" class="panel-collapse collapse show" data-bs-parent="#accordion"
                                role="tabpanel">
                                <div class="panel-body">
                                    <form action="{{route('updatePersonalInfo')}}" method="POST" id="personalInfo">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="billing-address">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <input type="text" class="custom-form"
                                                                placeholder="Full Name" name="name"
                                                                value="{{auth()->user()->name}}" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <input type="text" class="custom-form" placeholder="Email"
                                                                name="email" value="{{auth()->user()->email}}" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <input type="text" class="custom-form"
                                                                placeholder="Mobile Number" name="mobile_no"
                                                                value="{{auth()->user()->mobile_no}}" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <input type="submit" class="custom-submit-2 save"
                                                                value="Save" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel-group  margin-btm-0" id="accordion2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a role="button" data-bs-toggle="collapse" href="#shipping-info"
                                        aria-expanded="false">
                                        <i class="pe-7s-cart"></i>
                                        <span>My shipping address</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="shipping-info" class="panel-collapse collapse show" data-bs-parent="#accordion2"
                                role="tabpanel">
                                <div class="panel-body">
                                    <!-- CHECKOUT-AREA START -->
                                    <div class="checkout-area">
                                        <form action="{{route('updateShippingAddress')}}" method="POST"
                                            id="shippingAddress">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="id"
                                                    value="{{isset($shippingAddress->id)? Helper::encode($shippingAddress->id) : ''}}">
                                                <!-- Shipping-Address Start -->
                                                <div class="col-lg-12">
                                                    <div class="shipping-address">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="text" class="custom-form"
                                                                    placeholder="Full Name" name="name" required
                                                                    autocomplete="name" tabindex="1"
                                                                    value="{{isset($shippingAddress->name)? $shippingAddress->name : ''}}">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="custom-form"
                                                                    placeholder="10-digit mobile number" name="phone"
                                                                    required maxlength="10" autocomplete="tel"
                                                                    tabindex="2"
                                                                    value="{{isset($shippingAddress->phone)? $shippingAddress->phone : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <input type="email" class="custom-form"
                                                                    placeholder="Email Address" name="email" required
                                                                    tabindex="3"
                                                                    value="{{isset($shippingAddress->email)? $shippingAddress->email : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="text" class="custom-form"
                                                                    placeholder="Pincode" name="pincode" required
                                                                    maxlength="6" autocomplete="postal-code"
                                                                    tabindex="4"
                                                                    value="{{isset($shippingAddress->pincode)? $shippingAddress->pincode : ''}}">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="custom-form"
                                                                    placeholder="Locality" name="addressLine2" required
                                                                    placeholder="Locality" autocomplete="addressLine2"
                                                                    tabindex="5"
                                                                    value="{{isset($shippingAddress->addressLine2)? $shippingAddress->addressLine2 : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <textarea class="custom-form"
                                                                    placeholder="Address (Area and Street)" rows="6"
                                                                    name="addressLine1" tabindex="6" required
                                                                    autocomplete="street-address">{{isset($shippingAddress->addressLine1)? $shippingAddress->addressLine1 : ''}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="text" class="custom-form"
                                                                    placeholder="City/District/Town" name="city"
                                                                    required autocomplete="city" tabindex="7"
                                                                    value="{{isset($shippingAddress->city)? $shippingAddress->city : ''}}">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <select class="custom-select custom-form" name="state"
                                                                    tabindex="8" required>
                                                                    <option value="">--Select State any one--</option>
                                                                    @foreach(Helper::getStates() as $state)
                                                                    <option value="{{Helper::encode($state->id)}}"
                                                                        {{isset($shippingAddress->state) && ($shippingAddress->state == $state->id) ? 'selected' : ''}}>
                                                                        {{$state->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="text" class="custom-form"
                                                                    placeholder="Landmark (Optional)" name="landmark"
                                                                    autocomplete="off" tabindex="9" maxlength="200"
                                                                    value="{{isset($shippingAddress->landmark)? $shippingAddress->landmark : ''}}">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="custom-form"
                                                                    placeholder="Alternate Phone (Optional)"
                                                                    name="alternatePhone" autocomplete="off"
                                                                    tabindex="10" maxlength="10"
                                                                    value="{{isset($shippingAddress->alternatePhone)? $shippingAddress->alternatePhone : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <input type="submit" class="custom-submit-2 save"
                                                                    value="Save" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Shipping-Address End -->
                                            </div>
                                        </form>
                                    </div>
                                    <!-- CHECKOUT-AREA END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MY-ACCOUNT-AREA END -->
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
    $("#personalInfo").validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true
            },
            mobile_no: {
                required: true,
                phoneUS: true,
                number: true,
                minlength: 10
            },
        },
        messages: {
            name: {
                required: "This field is required"
            },
            email: {
                required: "This field is required"
            },
            mobile_no: {
                required: "This field is required",
                number: "Please enter numbers only",
                minlength: "Please enter min 10 digit number"
            },
        }
    });

    $("#shippingAddress").validate({
        rules: {
            name: {
                required: true
            },
            phone: {
                required: true,
                phoneUS: true,
                number: true,
                minlength: 10
            },
            email: {
                required: true
            },
            pincode: {
                required: true
            },
            addressLine1: {
                required: true
            },
            addressLine2: {
                required: true
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
        },
        messages: {
            name: {
                required: "This field is required"
            },
            phone: {
                required: "This field is required",
                number: "Please enter numbers only",
                minlength: "Please enter min 10 digit number"
            },
            email: {
                required: "This field is required"
            },
            pincode: {
                required: "This field is required"
            },
            addressLine1: {
                required: "This field is required"
            },
            addressLine2: {
                required: "This field is required"
            },
            city: {
                required: "This field is required"
            },
            state: {
                required: "This field is required"
            },
        }
    });
});
</script>
@endpush