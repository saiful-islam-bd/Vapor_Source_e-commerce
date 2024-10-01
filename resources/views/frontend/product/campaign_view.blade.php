@extends('frontend.master_dashboard')
@section('main')
@section('title')
    Campaigns | Vapour Source
@endsection




<div class="container new-page">

    <div class="row">





        <!-- #################### Main Content #################### -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col shop-grid-5">

            <div class="productList">

                <!--Toolbar-->
                <div class="toolbar">
                    <div class="filters-toolbar-wrapper">
                        <div class="row">


                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 custom_menus_submenus"
                                style="margin-top:120px">

                                <span style="font-size: 15px;">
                                    We found <strong>{{ count($campaigns) }} items</strong> for you!
                                </span>

                            </div>


                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-right">

                                <div class="filters-toolbar__item">
                                    <label for="SortBy" class="hidden">Sort</label>
                                    <select name="SortBy" id="SortBy"
                                        class="filters-toolbar__input filters-toolbar__input--sort">
                                        <option value="title-ascending" selected="selected">Sort</option>
                                        <option>Best Selling</option>
                                        <option>Alphabetically, A-Z</option>
                                        <option>Alphabetically, Z-A</option>
                                        <option>Price, low to high</option>
                                        <option>Price, high to low</option>
                                        <option>Date, new to old</option>
                                        <option>Date, old to new</option>
                                    </select>
                                    <input class="collection-header__default-sort" type="hidden" value="manual">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!--End Toolbar-->



                <div class="grid-products grid--view-items">

                    <div class="row">

                        @foreach ($campaigns as $product)
                            <div class="col-6 col-sm-6 col-md-2 col-lg-2 item">

                                <!-- start product image -->
                                <div class="product-image">

                                    <!-- start product image -->
                                    <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"
                                        class="grid-view-item__link">

                                        <!-- image -->
                                        <img class="primary blur-up lazyload"
                                            data-src="{{ asset($product->product_thambnail) }}"
                                            src="{{ asset($product->product_thambnail) }}" alt="image"
                                            title="product">
                                        <!-- End image -->

                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload"
                                            data-src="{{ asset($product->product_thambnail) }}"
                                            src="{{ asset($product->product_thambnail) }}" alt="image"
                                            title="product">
                                        <!-- End hover image -->

                                        <!-- Variant Image-->
                                        <img class="grid-view-item__image hover variantImg"
                                            src="{{ asset($product->product_thambnail) }}" alt="image"
                                            title="product">
                                        <!-- Variant Image-->

                                        <!-- product label -->
                                        @php
                                            $amount = $product->selling_price - $product->discount_price;
                                            $discount = ($amount / $product->selling_price) * 100;
                                        @endphp
                                        <div class="product-labels rectangular">
                                            @if ($product->discount_price == null)
                                                <span class="lbl pr-label1">new</span>
                                            @else
                                                <span class="lbl on-sale">{{ round($discount) }} %</span>
                                            @endif
                                        </div>
                                        <!-- End product label -->

                                    </a>
                                    <!-- end product image -->

                                    <!-- Start  Quick View -->
                                    <div class="variants add">
                                        <button class="btn btn-addto-cart quick-view-popup quick-view" type="button"
                                            tabindex="0" href="javascript:void(0)" title="Quick View"
                                            data-toggle="modal" data-target="#content_quickview"
                                            id="{{ $product->id }}" onclick="productView(this.id)">Quick
                                            View</button>
                                    </div>
                                    <!-- end Quick View -->

                                </div>
                                <!-- end product image -->


                                <!--start product details -->
                                <div class="product-details text-center">

                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"
                                            class="wht-text">{{ $product->product_name }}</a>
                                    </div>
                                    <!-- End product name -->

                                    <!-- product price -->
                                    @if ($product->discount_price == null)
                                        <div class="product-price">
                                            <span class="price wht-text">BDT {{ $product->selling_price }}</span>
                                        </div>
                                    @else
                                        <div class="product-price">
                                            <span class="old-price wht-text">BDT {{ $product->selling_price }}</span>
                                            <span class="price wht-text">BDT {{ $product->discount_price }}</span>
                                        </div>
                                    @endif
                                    <!-- End product price -->

                                </div>
                                <!-- End product details -->

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>
        <!--End Main Content-->

    </div>

</div>
@endsection
