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
                                <span>+019 (111) 25184203</span>
                            </li>
                            <li>
                                <i class="sp-email"></i>
                                <span>Company@domain.com</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-top-right float-end">
                        <ul>
                            <li><a href="#">Account <span><i class="sp-gear"></i></span></a>
                                <ul class="submenu">
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="cart.html">Checkout</a></li>
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                        @endif
                                    @else
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
                        <a href="index.html"><img src="{{asset('assets/img/logo.png')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <div class="main-menu float-end">
                        <nav>
                            <ul>
                                <li><a href="index.html">home</a></li>
                                <li><a href="shop.html">mens</a></li>
                                <!-- <li><a href="shop-list.html">womens</a></li> -->
                                <li><a href="shop.html">shop</a>
                                    <div class="mega-menu">
                                        <span>
                                            <a class="mega-menu-title" href="#">WOMEN CLOTH</a>
                                            <a href="#">casual shirt</a>
                                            <a href="#">rikke t-shirt</a>
                                            <a href="#">mia top</a>
                                            <a href="#">mia top</a>
                                            <a href="#">muscle tee</a>
                                            <a href="#">seine blouse</a>
                                        </span>
                                        <span>
                                            <a class="mega-menu-title" href="#">MEN CLOTH</a>
                                            <a href="#">casual shirt</a>
                                            <a href="#">t-shirt</a>
                                            <a href="#">t-shirt</a>
                                            <a href="#">zeans</a>
                                            <a href="#">trousers/ pants </a>
                                            <a href="#">sweamwear</a>
                                        </span>
                                        <span>
                                            <a class="mega-menu-title" href="#">WOMEN JEWELRY</a>
                                            <a href="#">necklace</a>
                                            <a href="#">samhar cuff</a>
                                            <a href="#">samhar cuff</a>
                                            <a href="#">samhar cuff</a>
                                            <a href="#">nail set</a>
                                            <a href="#">drop earrings</a>
                                        </span>
                                        <span class="mega-menu-photo">
                                            <a href="#"><img src="{{asset('assets/img/megamenu/1.jpg')}}" alt="" /></a>
                                        </span>
                                    </div>
                                </li>
                                <li><a href="blog.html">blog</a></li>
                                <li><a href="about.html">about</a></li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="total-cart">
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="total-cart-number">2 Item</span>
                                    <span><i class="sp-shopping-bag"></i></span>
                                </a>
                                <!-- Mini-cart-content Start -->
                                <div class="total-cart-brief">
                                    <div class="cart-photo-details">
                                        <div class="cart-photo">
                                            <a href="#"><img src="{{asset('assets/img/total-cart/1.jpg')}}" alt="" /></a>
                                        </div>
                                        <div class="cart-photo-brief">
                                            <a href="#">Men's Shirt Shirt</a>
                                            <span>$25.00</span>
                                        </div>
                                        <div class="pro-delete">
                                            <a href="#"><i class="sp-circle-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart-photo-details">
                                        <div class="cart-photo">
                                            <a href="#"><img src="{{asset('assets/img/total-cart/1.jpg')}}" alt="" /></a>
                                        </div>
                                        <div class="cart-photo-brief">
                                            <a href="#">Men's Shirt Shirt</a>
                                            <span>$25.00</span>
                                        </div>
                                        <div class="pro-delete">
                                            <a href="#"><i class="sp-circle-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart-subtotal">
                                        <p>Total = $50.00</p>
                                    </div>
                                    <div class="cart-inner-btm">
                                        <a href="#">Checkout</a>
                                    </div>
                                </div>
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
                                <li><a href="index.html">home</a></li>
                                <li><a href="shop.html">mens</a></li>
                                <li><a href="shop.html">shop</a></li>
                                <li><a href="blog.html">blog</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="contact.html">contact</a></li>
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