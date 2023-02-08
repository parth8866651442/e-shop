@extends('layouts.app')
@section('title','E-SHOP || HOME PAGE')
@section('content')
<section class="page-content">
    <!-- PAGE-BANNER START -->
    <div class="page-banner-area margin-bottom-80"
        style="background-image: url('{{asset('assets/img/banner/page-banner/1.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-menu">
                        <h2 class="page-banner-title">Shop</h2>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>Shop List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE-BANNER END -->
    <!-- SHOP-AREA START -->
    <div class="shop-area margin-bottom-80">
        <div class="container">
            <form action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <span class="shop-border"></span>
                    </div>
                    <div class="col-lg-3 order-lg-1 order-2">
                        <!-- widget-categories start -->
                        <aside class="widget widget-categories">
                            <h5>categories</h5>
                            <ul>
                                @foreach($categories as $parentCat)
                                <li>
                                    <a
                                        href="{{route('getCategoryWiseproducts',$parentCat->slug)}}">{{$parentCat->title}}</a>
                                    @if(isset($parentCat->getChildCategory))
                                    <ul>
                                        @foreach($parentCat->getChildCategory as $subCategory)
                                        <li><a href="#">{{$subCategory->title}}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </aside>
                        <!-- widget-categories end -->
                        <!-- shop-filter start -->
                        <aside class="widget shop-filter">
                            <h3 class="sidebar-title">price</h3>
                            <div class="info_widget">
                                <div id="slider-range"></div>
                                <div id="amount">
                                    <input type="text" class="first_price" />
                                    <input type="text" class="last_price" value="{{$maxPrice}}" />
                                    <input type="hidden" name="price_range" id="price_range"
                                        value="@if(!empty($_GET['price'])){{$_GET['price']}}@endif" />
                                </div>
                                <button class="shop-now">Filter</button>
                            </div>
                        </aside>
                        <!-- shop-filter end -->
                        <!-- widget-top-brand start -->
                        <aside class="widget top-rated hidden-sm">
                            <h5 class="sidebar-title">top rated</h5>
                            <div class="sidebar-product">
                                <!-- Single-product start -->
                                <div class="single-product">
                                    <div class="product-photo">
                                        <a href="#">
                                            <img class="primary-photo" src="{{asset('assets/img/sidebar/1.png')}}"
                                                alt="" />
                                        </a>
                                    </div>
                                    <div class="product-brief">
                                        <h2><a href="#">Randomised Words</a></h2>
                                        <h3>$500.00 <span>$244.00</span></h3>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="single-product">
                                    <div class="product-photo">
                                        <a href="#">
                                            <img class="primary-photo" src="{{asset('assets/img/sidebar/2.png')}}"
                                                alt="" />
                                        </a>
                                    </div>
                                    <div class="product-brief">
                                        <h2><a href="#">CLEO POURER</a></h2>
                                        <h3>$500.00 <span>$244.00</span></h3>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="single-product">
                                    <div class="product-photo">
                                        <a href="#">
                                            <img class="primary-photo" src="{{asset('assets/img/sidebar/3.png')}}"
                                                alt="" />
                                        </a>
                                    </div>
                                    <div class="product-brief">
                                        <h2><a href="#">TAM SPREADER</a></h2>
                                        <h3>$500.00 <span>$244.00</span></h3>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="single-product">
                                    <div class="product-photo">
                                        <a href="#">
                                            <img class="primary-photo" src="{{asset('assets/img/sidebar/4.png')}}"
                                                alt="" />
                                        </a>
                                    </div>
                                    <div class="product-brief">
                                        <h2><a href="#">MARCEL THROW</a></h2>
                                        <h3>$500.00 <span>$244.00</span></h3>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="single-product">
                                    <div class="product-photo">
                                        <a href="#">
                                            <img class="primary-photo" src="{{asset('assets/img/sidebar/5.png')}}"
                                                alt="" />
                                        </a>
                                    </div>
                                    <div class="product-brief">
                                        <h2><a href="#">RLIE EXTRA SMALL</a></h2>
                                        <h3>$500.00 <span>$244.00</span></h3>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                            </div>
                        </aside>
                        <!-- widget-top-brand end -->
                    </div>
                    <div class="col-lg-9 order-1 order-lg-2">
                        <!-- Shop-Content start -->
                        <div class="shop-content">
                            <!-- product-toolbar start -->
                            <div class="product-toolbar">
                                <!-- Shop-menu -->
                                <ul class="nav shop-menu view-mode">
                                    <li>
                                        <a class="list-view active" href="#list-view" data-bs-toggle="tab"><i
                                                class="sp-list-view"></i></a>
                                    </li>
                                    <li>
                                        <a class="grid-view" href="#grid-view" data-bs-toggle="tab"><i
                                                class="sp-grid-view"></i></a>
                                    </li>
                                </ul>
                                <div class="short-by d-none d-lg-block">
                                    <span>short by</span>
                                    <select class="shop-select" onchange="this.form.submit();">
                                        <option value="">Default</option>
                                        <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title' )
                                            selected @endif>Name</option>
                                        <option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price' )
                                            selected @endif>Price</option>
                                        <option value="category" @if(!empty($_GET['sortBy']) &&
                                            $_GET['sortBy']=='category' ) selected @endif>Category</option>
                                    </select>
                                </div>
                                <div class="short-by showing d-none d-lg-block">
                                    <span>showing</span>
                                    <select class="shop-select" onchange="this.form.submit();">
                                        <option value="">Default</option>
                                        <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9' ) selected
                                            @endif>09</option>
                                        <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15' ) selected
                                            @endif>15</option>
                                        <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21' ) selected
                                            @endif>21</option>
                                        <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30' ) selected
                                            @endif>30</option>
                                    </select>
                                </div>
                                <!-- pagination -->
                                <div class="shop-pagination">
                                    {{$products->links()}}
                                    <!-- <ul>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="sp-arrow-bold-right"></i></a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <!-- product-toolbar end -->
                            <!-- Shop-product start -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane" id="grid-view">
                                    <div class="row shop-grid">
                                        <!-- Single-product start -->
                                        @if(count($products)>0)
                                        @foreach($products as $product)
                                        <div class="col-xl-4 col-md-6">
                                            <div class="single-product">
                                                <div class="product-photo">
                                                    <a href="#">
                                                        <img class="primary-photo"
                                                            src="{{imageUrl($product->productOneImage->name, 'product','product.jpg','false')}}"
                                                            alt="" />
                                                        <!-- <img class="secondary-photo" src="{{asset('assets/img/shop/9.jpg')}}" alt="" /> -->
                                                    </a>
                                                    <div class="pro-action">
                                                        <a href="#" class="action-btn"><i
                                                                class="sp-heart"></i><span>Wishlist</span></a>
                                                        <a href="#" class="action-btn"><i
                                                                class="sp-shopping-cart"></i><span>Add to
                                                                cart</span></a>
                                                    </div>
                                                </div>
                                                <div class="product-brief">
                                                    <h2><a href="#">{{$product->title}}</a></h2>
                                                    <h3>
                                                        @php
                                                        $after_discount=($product->price-($product->price*$product->discount)/100);
                                                        @endphp
                                                        ${{number_format($after_discount,2)}}
                                                        <del
                                                            style="padding-left:4%;">${{number_format($product->price,2)}}</del>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                                        @endif
                                        <!-- Single-product end -->
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane active" id="list-view">
                                    <div class="row shop-list">
                                        <!-- Single-product start -->
                                        @if(count($products)>0)
                                        @foreach($products as $product)
                                        <div class="col-lg-12">
                                            <div class="single-product">
                                                <div class="product-photo">
                                                    <a href="#">
                                                        <img class="primary-photo"
                                                            src="{{imageUrl($product->productOneImage->name, 'product','product.jpg','false')}}"
                                                            alt="" />
                                                        <!-- <img class="secondary-photo" src="{{asset('assets/img/shop-list/5.jpg')}}" alt="" /> -->
                                                    </a>
                                                    <div class="pro-action">
                                                        <a href="#" class="action-btn"><i
                                                                class="sp-heart"></i><span>Wishlist</span></a>
                                                        <a href="#" class="action-btn"><i
                                                                class="sp-shopping-cart"></i><span>Add to
                                                                cart</span></a>
                                                    </div>
                                                </div>
                                                <div class="product-brief">
                                                    <h2><a href="#">{{$product->title}}</a></h2>
                                                    <h3>
                                                        @php
                                                        $after_discount=($product->price-($product->price*$product->discount)/100);
                                                        @endphp
                                                        ${{number_format($after_discount,2)}}
                                                        <del
                                                            style="padding-left:4%;">${{number_format($product->price,2)}}</del>
                                                    </h3>
                                                    <div class="porduct-desc">
                                                        <p>{{$product->summary}}</p>
                                                    </div>
                                                    <div class="pro-quick-view">
                                                        <div class="quick-view">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#productModal" title="Quick View">Quick
                                                                View</a>
                                                        </div>
                                                        <div class="pro-rating">
                                                            <a href="#"><i class="sp-star rating-1"></i></a>
                                                            <a href="#"><i class="sp-star rating-1"></i></a>
                                                            <a href="#"><i class="sp-star rating-1"></i></a>
                                                            <a href="#"><i class="sp-star rating-1"></i></a>
                                                            <a href="#"><i class="sp-star rating-2"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                                        @endif
                                        <!-- Single-product end -->
                                    </div>
                                </div>
                            </div>
                            <!-- Shop-product end -->
                        </div>
                        <!-- Shop-Content end -->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- SHOP-AREA END -->
    <!-- BANNER-AREA START -->
    <div class="banner-area fix margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="best-product-banner">
                        <a href="#"><img src="{{asset('assets/img/banner/best-product-banner.jpg')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER-AREA END -->
    <!-- BANNER-AREA START -->
    <div class="banner-area fix margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="banner-photo">
                        <a href="#"><img src="{{asset('assets/img/banner/4.jpg')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-6">
                        <div class="section-title-2">
                            <h2 class="border-left-rights">product description</h2>
                        </div>
                        <h3><a href="#">Slim Oxford Shirt</a></h3>
                        <span>$144.44</span>
                        <p>An oxford shirt sharp and reliable essential. durable woven texture in premium two-ply
                            cotton, it is the perfect complement to suiting and urban knits. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER-AREA END -->
    <!-- SERVICE-AREA START -->
    <div class="service-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="sp-transport"></i>
                        </div>
                        <div class="service-brief">
                            <h3>free shipping</h3>
                            <p>There are many variations of passages of Lorem Ipsum available, alteration</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="sp-head-phone"></i>
                        </div>
                        <div class="service-brief">
                            <h3>help line</h3>
                            <p>(+112) 1925184203 - call any time for any support Lorem Ipsum available, alteration </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="sp-business"></i>
                        </div>
                        <div class="service-brief">
                            <h3>money back guarantee</h3>
                            <p>There are many variations of passages of Lorem Ipsum available, alteration</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SERVICE-AREA END -->
</section>
@endsection

@push('scripts')
<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-product">
                    <div class="product-images">
                        <div class="main-image images">
                            <img alt="#" src="img/quickview-photo.jpg" />
                        </div>
                    </div><!-- .product-images -->

                    <div class="product-info">
                        <h1>Aenean eu tristique</h1>
                        <div class="price-box-3">
                            <hr />
                            <div class="s-price-box">
                                <span class="new-price">$160.00</span>
                                <span class="old-price">$190.00</span>
                            </div>
                            <hr />
                        </div>
                        <a href="shop.html" class="see-all">See all features</a>
                        <div class="quick-add-to-cart">
                            <form method="post" class="cart">
                                <div class="numbers-row">
                                    <input type="number" id="french-hens" value="3">
                                </div>
                                <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                            </form>
                        </div>
                        <div class="quick-desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                            tristique auctor. Donec non est at libero.
                        </div>
                        <div class="social-sharing">
                            <div class="widget widget_socialsharing_widget">
                                <h3 class="widget-title-modal">Share this product</h3>
                                <ul class="social-icons">
                                    <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i
                                                class="sp-facebook"></i></a></li>
                                    <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i
                                                class="sp-twitter"></i></a></li>
                                    <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i
                                                class="sp-google"></i></a></li>
                                    <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i
                                                class="sp-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .product-info -->
                </div><!-- .modal-product -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>
<!-- END Modal -->
<script>
/*----------------------------
	 price-slider active
	------------------------------ */
$("#slider-range").slider({
    range: true,
    min: 15,
    max: <?php print($maxPrice)+100; ?>,
    values: [15, <?php print($maxPrice)+100; ?>],
    slide: function(event, ui) {
        $("#amount").val("$" + ui.values[0] + " - " + "$" + ui.values[1]);
        $('.first_price').val('$' + ui.values[0]);
        $('.last_price').val('$' + ui.values[1]);
        $('input[name="price_range"]').val(ui.values[0] + "-" + ui.values[1]);
    },
});
$("#amount").val("$" + $("#slider-range").slider("values", 0) +
    " - " + "$" + $("#slider-range").slider("values", 1));
$('.first_price').val('$' + $("#slider-range").slider("values", 0));
$('.last_price').val('$' + $("#slider-range").slider("values", 1));

$('#productModal').modal({
    keyboard: false,
    backdrop: 'static'
}); 

</script>
@endpush