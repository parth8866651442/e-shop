@extends('layouts.app')
@section('title','E-SHOP || CHECKOUT PAGE')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area photo-4 margin-bottom-80" style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Checkout</h2>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-BANNER END -->
    <!-- CHECKOUT-AREA START -->
    <div class="checkout-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="title-6 margin-bottom-50">Checkout</h3>
                </div>
            </div>
            <!-- Checkout-Billing-details and order start -->
            <div class="checkout-bill-order">
                <form method="POST" action="{{route('addToOrders')}}" id="checkOutForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 coupon-area">
                            <div class="checkout-bill coupon-accordion">
                                <h3 class="title-7 margin-bottom-50">Billing Details</h3>
                            </div>
                            <div class="row coupon-info">
                                <div class="col-lg-6">
                                    <p class="form-row-first">
                                        <label>First Name <span class="required">*</span></label>
                                        <input type="text" name="first_name" value="{{old('first_name')}}" required/>
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="form-row-last">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input type="text" name="last_name" value="{{old('lat_name')}}" required/>
                                    </p>
                                </div>
                            </div>
                            <div class="row coupon-info">
                                <div class="col-lg-6">
                                    <p class="form-row-first">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="text" name="email" value="{{old('email')}}" required/>
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="form-row-last">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" name="phone" value="{{old('phone')}}" required/>
                                    </p>
                                </div>
                            </div>
                            <div class="row coupon-info">
                                <div class="col-lg-12">
                                    <p class="form-row-first">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" placeholder="Street address" name="address1" value="{{old('address1')}}" required/>
                                        <input type="text" placeholder="Site, India etc (optional)"  name="address2" value="{{old('address2')}}" />
                                    </p>
                                </div>
                            </div>
                            <div class="row coupon-info">
                                <div class="col-lg-12">
                                    <p class="form-row-first">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" name="city" placeholder="India states (IN)" required />
                                    </p>
                                </div>
                            </div>
                            <div class="row coupon-info">
                                <div class="col-lg-6">
                                    <p class="form-row-first">
                                        <label>State <span class="required">*</span></label>
                                        <input type="text" name="state" placeholder="" value="{{old('state')}}" required/>
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="form-row-last">
                                        <label>Zip <span class="required">*</span></label>
                                        <input type="text" name="zip_code" placeholder="" value="{{old('zip_code')}}" required/>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="your-order coupon-area">
                                <div class="coupon-accordion">
                                    <h3 class="title-7 margin-bottom-50">Your Order</h3>
                                </div>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Items</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="product-name">Price ({{Helper::cartCount()}} item)</td>
                                                <td class="product-total">${{number_format(Helper::totalCartPrice(),2)}}</td>
                                            </tr>
                                            <tr>
                                                <td class="product-name">Delivery Charges</td>
                                                <td class="product-total" data-charges="80">$80.00</td>
                                            </tr>
                                            <tr>
                                                <td class="product-name order-total">Order Total</td>
                                                <td class="product-total order-total">{{number_format(Helper::totalCartPrice()+80,2)}}</td>
                                                <input type="hidden" name="delivery_charges" value="80">
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                            <!-- ACCORDION START -->
                                            <h3 class="payment-accordion-toggle active"><input name="payment_method"  type="radio" value="cod">Cash On Delivery</h3>
                                            <div class="payment-content default">
                                                <p>Make your payment directly into our bank account. Please use your
                                                    Order ID as the payment reference. Your order won’t be shipped until
                                                    the funds have cleared in our account.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                            <!-- ACCORDION START -->
                                            <h3 class="payment-accordion-toggle"><input name="payment_method"  type="radio" value="online">Online</h3>
                                            <div class="payment-content">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                    PayPal account.</p>
                                                <a href="#"><img src="{{asset('assets/img/bg/payment.png')}}" alt="" /></a>
                                            </div>
                                            <!-- ACCORDION END -->
                                        </div>
                                        <div class="order-button-payment">
                                            <input type="submit" value="Place order" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Checkout-Billing-details and order end -->
        </div>
    </div>
    <!-- CHECKOUT-AREA END -->
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
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $("#checkOutForm").validate({
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
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                maxlength:10
            },
            address1: {
                required: true
            },
            city: {
                required: true,
            }
        },
        messages: {
            first_name: {
                required: "This field is required"
            },
            last_name: {
                required: "This field is required"
            },
            email: {
                required: "This field is required",
                email: "Please enter valid email address"
            },
            phone: {
                required: "This field is required",
                maxlength: "Please enter max 10 digit Password"
            },
            address1: {
                required: "This field is required",
            },
            city: {
                required: "This field is required",
            }
        }
    });
});
</script>
@endpush