<!-- HEADER-AREA START -->
<header class="header-area">
    <!-- Header-Top Start -->
    <div class="header-top d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="header-top-left text-start">
                        <ul>
                            <li>
                                <i class="sp-phone"></i>
                                <span>+91 {{Helper::settings('phone_1')}}</span>
                            </li>
                            <li>
                                <i class="sp-email"></i>
                                <span>{{Helper::settings('email_1')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-top-right float-end">
                        <ul>
                            <li><a href="#">Account <span><i class="sp-gear"></i></span></a>
                                <ul class="submenu">
                                    <li><a href="{{route('myAccounts')}}">My Account</a></li>
                                    <!-- <li><a href="#">Wishlist</a></li> -->
                                    <!-- Authentication Links -->
                                    @guest
                                    @if (Route::has('login'))
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @endif
                                    @else
                                        <li><a href="{{ route('getAllOrder') }}">My Orders</a></li>
                                        @if(Helper::cartCount() != 0)
                                        <li><a href="{{route('getCheckOut')}}">Checkout</a></li>
                                        @endif
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endguest
                                </ul>
                            </li>
                        </ul>
                        <div class="header-search">
                            <form action="#">
                                <input type="text" placeholder="Search..." />
                                <button type="submit"><i class="sp-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header-Top End -->
    <!-- Main-Header Start -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-6">
                    <div class="logo">
                        <a href="{{route('home')}}"><img src="{{asset('assets/img/logo.png')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <div class="main-menu float-end">
                        <nav>
                            <ul>
                                <li><a href="{{route('home')}}">home</a></li>
                                <li><a href="{{route('getAllproducts')}}">Products</a></li>
                                <li><a href="javascript:void(0);">shop</a>
                                    <div class="mega-menu">
                                        {{Helper::getHeaderCategory()}}
                                        <!-- <span class="mega-menu-photo">
                                            <a href="#"><img src="{{asset('assets/img/megamenu/1.jpg')}}" alt="" /></a>
                                        </span> -->
                                    </div>
                                </li>
                                <li><a href="{{route('getAllblogs')}}">blog</a></li>
                                <li><a href="{{route('about')}}">about</a></li>
                                <li><a href="{{route('contact')}}">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="total-cart">
                        <ul>
                            <li>
                                <a href="{{route('getCarts')}}">
                                    <span class="total-cart-number">{{Helper::cartCount()}} Item</span>
                                    <span><i class="sp-shopping-bag"></i></span>
                                </a>
                                <!-- Mini-cart-content Start -->
                                @if(!empty(Helper::totalCartPrice()))
                                <div class="total-cart-brief">
                                    @foreach(Helper::getAllProductFromCart() as $data)
                                        <div class="cart-photo-details">
                                            <div class="cart-photo">
                                                <a href="{{route('getProductDetail',$data->productLimit['slug'])}}"><img src="{{imageUrl($data->productLimit->productOneImage->name, 'product','product.jpg','false')}}" alt="" /></a>
                                            </div>
                                            <div class="cart-photo-brief">
                                                <a href="{{route('getProductDetail',$data->productLimit['slug'])}}" target="_blank">{{short_string($data->productLimit['title'])}}...</a>
                                                <span class="quantity">{{$data->quantity}} x - ${{number_format($data->price,2)}}</span>
                                            </div>
                                            <div class="pro-delete">
                                                <a href="{{route('deleteToCart',Helper::encode($data->id))}}"><i class="sp-circle-close"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="cart-subtotal">
                                        <p>Total = ${{number_format(Helper::totalCartPrice(),2)}}</p>
                                    </div>
                                    <div class="cart-inner-btm">
                                        <a href="{{route('getCheckOut')}}">Checkout</a>
                                    </div>
                                </div>
                                @endif
                                <!-- Mini-cart-content End -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main-Header End -->
    <!-- Mobile-menu start -->
    <div class="mobile-menu-area d-block d-md-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{route('home')}}">home</a></li>
                                <li><a href="{{route('getAllproducts')}}">Products</a></li>
                                <li><a href="{{route('getAllblogs')}}">blog</a></li>
                                <li><a href="{{route('about')}}">about</a></li>
                                <li><a href="{{route('contact')}}">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile-menu end -->
</header>
<!-- HEADER-AREA END -->