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
                    <input type="hidden" name="shipping_id" value="{{isset($shippingAddress->id)? $shippingAddress->id : ''}}">
                    <div class="row">
                        <div class="col-lg-6 coupon-area">
                            <div class="checkout-bill coupon-accordion">
                                <h3 class="title-7 margin-bottom-50">Billing Details</h3>
                            </div>
                            @if(isset($shippingAddress->id))
                            <div class="ship-add-box">
                                <div class="ship-main">
                                    <h6>Manage Addresses </h6>
                                    <div class="ship-edit">
                                        <a  href="{{route('myAccounts')}}" target="_blank">Edit</a>
                                    </div>
                                    <p>
                                        <span>{{$shippingAddress->name}}</span>
                                        <span>{{$shippingAddress->phone}}</span>
                                    </p>
                                    <span>{!! $shippingAddress->addressLine1 .', '. $shippingAddress->addressLine2 .', '. $shippingAddress->city .', '. $shippingAddress->getIDByStateDetail->name .' - <b>'. $shippingAddress->pincode .'</b>' !!}
                                    </span>
                                </div>
                            </div>
                            @endif
                            <div class="{{isset($shippingAddress->id) ? 'd-none' : ''}}">
                                <div class="row coupon-info">
                                    <div class="col-lg-12">
                                        <p class="form-row-first">
                                            <label>Name <span class="required">*</span></label>
                                            <input type="text" placeholder="Name" name="name" required autocomplete="name" tabindex="1" value="{{isset($shippingAddress->name)? $shippingAddress->name : old('name')}}">
                                        </p>
                                    </div>
                                </div>
                                <div class="row coupon-info">
                                    <div class="col-lg-6">
                                        <p class="form-row-first">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input type="email" placeholder="Email Address" name="email" required tabindex="3" value="{{isset($shippingAddress->email)? $shippingAddress->email : old('email')}}">
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="form-row-last">
                                            <label>Phone Number<span class="required">*</span></label>
                                            <input type="text" placeholder="10-digit mobile number" name="phone" required maxlength="10" autocomplete="tel" tabindex="2" value="{{isset($shippingAddress->phone)? $shippingAddress->phone : old('phone')}}">
                                        </p>
                                    </div>
                                </div>
                                <div class="row coupon-info">
                                    <div class="col-lg-6">
                                        <p class="form-row-first">
                                            <label>Pincode <span class="required">*</span></label>
                                            <input type="text" placeholder="Pincode" name="pincode" required maxlength="6" autocomplete="postal-code" tabindex="4" value="{{isset($shippingAddress->pincode)? $shippingAddress->pincode : ''}}">
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="form-row-first">
                                            <label>Locality <span class="required">*</span></label>
                                            <input type="text" placeholder="Locality" name="addressLine2" required placeholder="Locality" autocomplete="addressLine2" tabindex="5" value="{{isset($shippingAddress->addressLine2)? $shippingAddress->addressLine2 : ''}}">
                                        </p>
                                    </div>
                                   
                                </div>
                                <div class="row coupon-info">
                                    <div class="col-lg-12">
                                        <p class="form-row-first">
                                            <label>Address (Area and Street) <span class="required">*</span></label>
                                            <textarea placeholder="Address (Area and Street)" rows="6" name="addressLine1"  tabindex="5" required autocomplete="street-address">{{isset($shippingAddress->addressLine1)? $shippingAddress->addressLine1 : ''}}</textarea>
                                        </p>
                                    </div>
                                </div>
                                <div class="row coupon-info">
                                    <div class="col-lg-6">
                                        <p class="form-row-first">
                                            <label>City <span class="required">*</span></label>
                                            <input type="text" placeholder="City/District/Town" name="city" required autocomplete="city" tabindex="7" value="{{isset($shippingAddress->city)? $shippingAddress->city : old('city')}}">
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="form-row-first">
                                            <label>State <span class="required">*</span></label>
                                            <select name="state" tabindex="8" required>
                                                <option value="">--Select State any one--</option>
                                                @foreach(Helper::getStates() as $state)
                                                    <option value="{{$state->id}}" {{isset($shippingAddress->state) && ($shippingAddress->state == $state->id) ? 'selected' : ''}}>{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                        </p>
                                    </div>
                                </div>
                                <div class="row coupon-info">
                                    <div class="col-lg-6">
                                        <p class="form-row-first">
                                            <label>Landmark (Optional)</label>
                                            <input type="text" placeholder="Landmark (Optional)" name="city" required autocomplete="city" tabindex="7" value="{{isset($shippingAddress->city)? $shippingAddress->city : old('city')}}">
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="form-row-first">
                                            <label>Alternate Phone (Optional)</label>
                                            <input type="text" placeholder="Alternate Phone (Optional)" name="alternatePhone" autocomplete="off" tabindex="10" maxlength="10" value="{{isset($shippingAddress->alternatePhone)? $shippingAddress->alternatePhone : ''}}">
                                        </p>
                                    </div>
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
                                                <td class="product-total">${{Helper::settings('delivery_charges')}}</td>
                                            </tr>
                                            <tr>
                                                <td class="product-name order-total">Order Total</td>
                                                <td class="product-total order-total">${{number_format((Helper::totalCartPrice() + Helper::settings('delivery_charges')),2)}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="payment-method">
                                        <h3 class="title-7 margin-bottom-10">Payments</h3>
                                        <div class="content">
                                            <div class="checkbox">
                                                <input name="payment_method" type="radio" value="cod" checked> <label> Cash On Delivery</label><br>
                                                <input name="payment_method" type="radio" value="online"> <label> Online</label>
                                            </div>
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

@push('styles')
<style>
.ship-add-box{
    border: 1px solid #e0e0e0;
    position: relative;
}

.ship-add-box:first-child{
    border-top: 1px solid #e0e0e0;
    margin-top: 20px;
    border-radius: 2px 0;
}
.ship-main{
    max-width: 848px;
    overflow: hidden;
    padding: 20px;
}
.ship-edit{
    max-width: 35px;
    float: right;
}
</style>
@endpush

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
            }
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
            }
        }
    });
});
</script>
@endpush