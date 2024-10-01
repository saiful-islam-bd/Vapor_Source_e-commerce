@php
    $setting = App\Models\SiteSetting::find(1);
@endphp



<!--Top Header-->
<style>
    .transparent {
        position: absolute;
        width: 100%;
        z-index: 8;
        padding-top: 8px;
        padding-bottom: 10px;
        height: 38px;
    }

    .header-position {
        padding-top: 82px;
    }

    .text-size {
        font-size: 2rem;
        color: #000;
        margin-top: 22px;
    }



    @media only screen and (max-width: 480px) {
        .custom_top_header {
            display: none;
        }
    }

    @media only screen and (min-width:480px) and (max-width:1181px) {
        .custom_top_header {
            display: none;
        }

        .header-position {
            padding-top: 0px;
        }

    }
</style>
<div class="transparent custom_top_header ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 col-sm-8 col-md-5 col-lg-4">
                <a href="{{ url('/') }}">
                    <img src="{{ asset($setting->logo) }}" alt="Logo" style="width: 120px;height: 80px;">
                </a>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                <div class="text-center">
                    <p class="top-header_middle-text text-size"style="color: #fff;">Vapor Source</p>
                </div>
            </div>
            <!--<div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">-->
            <!--	<span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>-->
            <!--    <ul class="customer-links list-inline">-->
            <!--        <li><a href="login.html">Login</a></li>-->
            <!--        <li><a href="register.html">Create Account</a></li>-->
            <!--        <li><a href="wishlist.html">Wishlist</a></li>-->
            <!--    </ul>-->
            <!--</div>-->
        </div>
    </div>
</div>
<style>
    .custom_mobile_sticky {
        /* margin-top: 5rem; */
    }

    @media only screen and (max-width: 480px) {
        .custom_mobile_sticky {
            position: fixed !important;
            top: 0 !important;
            z-index: 333 !important;
            width: 100% !important;
            left: 0 !important;
            background-color: #000 !important;
            box-shadow: 0 0 7px rgba(0, 0, 0, 0.2) !important;
            -webkit-box-shadow: 0 0 7px rgba(0, 0, 0, 0.2) !important;
            padding: 0 !important;
            margin-top: 0%;
        }
    }
</style>
<!--End Top Header-->
<!--Header-->
<div class="header-wrap classicHeader animated d-flex header-position custom_mobile_sticky">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-2 col-sm-3 col-md-3 col-lg-10">
                <div class="d-block d-lg-none">
                    <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        <i class="icon anm anm-times-l"></i>
                        <i class="anm anm-bars-r" style="color: #fff;"></i>
                    </button>
                </div>
                <!--Desktop Menu-->
                <nav class="grid__item" id="AccessibleNav">
                    <!-- for mobile -->
                    <ul id="siteNav" class="site-nav medium center hidearrow">

                        {{-- <li class="lvl1 parent megamenu">
                            <a href="{{ url('/') }}">
                        Home
                        <i class="anm anm-angle-down-l"></i>
                        </a>
                        </li> --}}

                        @php
                            $categories = App\Models\Category::orderBy('id', 'ASC')
                                ->limit(10)
                                ->get();
                        @endphp
                        @foreach ($categories as $category)
                            <li class="lvl1 parent dropdown">

                                <a href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}"
                                    style="padding: 0 10px;font-size: 13px;">
                                    {{ $category->category_name }}
                                    <i class="anm anm-angle-down-l"></i>
                                </a>

                                @php
                                    $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                        ->orderBy('subcategory_name', 'ASC')
                                        ->get();
                                @endphp
                                <ul class="dropdown">
                                    @foreach ($subcategories as $subcategory)
                                        <li>
                                            <a href="{{ url('product/subcategory/' . $subcategory->id . '/' . $subcategory->subcategory_slug) }}"
                                                class="site-nav">
                                                {{ $subcategory->subcategory_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                    </ul>
                </nav>
                <!--End Desktop Menu-->
            </div>
            <!--Mobile Logo-->
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset($setting->logo) }}" alt="Logo" style="width: 120px;height: 80px;">
                    </a>
                </div>
            </div>
            <!--Mobile Logo-->
            <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                <div class="site-cart">
                    <a href="{{ route('mycart') }}" class="site-header__cart custom_cart_icon" title="Cart">
                        <style>
                            .anm.anm-times-l {
                                color: #000;
                            }
                        </style>
                        <i class="icon anm anm-bag-l" style="color: #fff;"></i>
                        <span class="site-header__cart-count" data-cart-render="item_count" id="cartQty"></span>
                    </a>

                    <!--Minicart Popup-->
                    <div id="header-cart" class="block block-cart">

                        <!--   // mini cart start with ajax -->
                        <div id="miniCart"></div>
                        <!--   // End mini cart start with ajax -->

                        <div class="total">
                            <div class="total-in">
                                <span class="label">Cart Subtotal:</span>
                                <span class="product-price">
                                    <span class="money">BDT</span>
                                    <span class="money" id="cartSubTotal"></span>
                                </span>
                            </div>
                            <div class="buttonSet text-center">
                                <a href="{{ route('mycart') }}" class="btn btn-secondary btn--small"
                                    style="width: 100%; background-color: #000;">View Cart</a>
                                {{-- <a href="checkout.html" class="btn btn-secondary btn--small">Checkout</a> --}}
                            </div>
                        </div>
                    </div>
                    <!--EndMinicart Popup-->
                </div>


                <div class="text-right">
                    <a href="{{ route('login') }}"><i class="anm anm-user-al"
                            style="color:#fff; font-size:18px; margin-right:8px;"></i></a>

                    <button type="button" class="search-trigger"
                        style="border:none;margin-right:7px; padding-top:5px;"><i class="icon anm anm-search-l"
                            style="color:#fff; font-size:18px;"></i></button>

                </div>
            </div>
        </div>
    </div>
</div>
<!--End Header-->
<!--Mobile Menu-->
<div class="mobile-nav-wrapper" role="navigation">
    <div class="closemobileMenu">
        <i class="icon anm anm-times-l pull-right"></i> Close Menu
    </div>
    <ul id="MobileNav" class="mobile-nav">

        @php

            $categories = App\Models\Category::orderBy('category_name', 'ASC')
                // ->limit(6)
                ->get();
        @endphp

        @foreach ($categories as $category)
            <li class="lvl1 parent megamenu">

                <a href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}">
                    {{ $category->category_name }}
                    <i class="anm anm-plus-l"></i>
                </a>


                @php
                    $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                        ->orderBy('subcategory_name', 'ASC')
                        ->get();
                @endphp
                <ul>
                    @foreach ($subcategories as $subcategory)
                        <li>
                            <a href="{{ url('product/subcategory/' . $subcategory->id . '/' . $subcategory->subcategory_slug) }}"
                                class="site-nav">{{ $subcategory->subcategory_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach

        {{-- <li class="lvl1"><a href="#"><b>Buy Now!</b></a>
        </li> --}}
    </ul>
</div>
<!--End Mobile Menu-->
