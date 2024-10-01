@extends('frontend.master_dashboard')
@section('main')

@section('title')
    {{ $product->product_name }}
@endsection



<!-- ##############################  Title ##############################  -->
<div class="section-header text-center">
    <h2 class="h2 heading-font"
        style="font-size: 2rem;font-weight: 600;margin: 0;padding-top: 11rem;padding-bottom: 1rem;">
        {{ $product->product_name }}</h2>
</div>
<!--End Title-->


<!-- ##############################  Breadcrumb ##############################  -->
<div class="bredcrumbWrap" style="border-top: 1px solid #fff;background-color: #000;border-bottom: 1px solid #fff;">
    <div class="container breadcrumbs">
        <a href="{{ url('/') }}" title="Back to the home page" style="color: #fff;">Home</a>
        <b>
            <span aria-hidden="true" style="color: #fff;">›</span>
            <span style="color: #fff;">{{ $product['category']['category_name'] }}</span>
        </b>
        <b>
            <span aria-hidden="true" style="color: #fff;">›</span>
            <span style="color: #fff;"> {{ $product['subcategory']['subcategory_name'] }}</span>
        </b>
        <b>
            <span aria-hidden="true" style="color: #fff;">›</span>
            <span style="color: #fff;">{{ $product->product_name }}</span>
        </b>
    </div>
</div>
<!--End Breadcrumb-->






<div id="MainContent" class="main-content" role="main">

    <div id="ProductSection-product-template" class="product-template__container prstyle1 container"
        style="margin-top: 50px;padding-top:30px;">
        <!--product-single-->
        <div class="product-single">
            <div class="row">


                <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                    <div class="product-details-img product-single__photos bottom">

                        <div class="zoompro-wrap product-zoom-right pl-20">

                            <div class="zoompro-span">
                                <img class="blur-up lazyload zoompro"
                                    data-zoom-image="{{ asset($product->product_thambnail) }}" alt=""
                                    src="{{ asset($product->product_thambnail) }}" />
                            </div>


                        </div>


                        <div class="product-thumb product-thumb-1">

                            <div id="gallery" class="product-dec-slider-1 product-tab-left">

                                @foreach ($multiImage as $img)
                                    <a data-image="{{ asset($img->photo_name) }}"
                                        data-zoom-image="{{ asset($img->photo_name) }}" class="slick-slide slick-cloned"
                                        data-slick-index="-4" aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload" src="{{ asset($img->photo_name) }}"
                                            alt="" />
                                    </a>
                                @endforeach


                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                    <div class="product-single__meta">

                        <h1 class="product-single__title" id="dpname">{{ $product->product_name }}</h1>

                        <div class="prInfoRow">

                            <div class="product-stock">
                                @if ($product->product_qty > 0)
                                    <span class="instock"
                                        style="color: #fff;padding: 5px 10px; border-radius: 5px;background-color: green;">
                                        <b>In Stock</b>
                                    </span>
                                @else
                                    <span class="outstock"
                                        style="color: #fff;padding: 5px 10px; border-radius: 5px;background-color: red;">
                                        <b>Stock Out</b>
                                    </span>
                                @endif
                            </div>

                            <div class="product-sku">
                                <span style="font-weight: 700">SKU:</span>
                                <span class="variant-sku">{{ $product->product_code }}</span>
                            </div>

                            <div class="product-sku">
                                <span style="font-weight: 700">Stock:</span>
                                <span class="variant-sku">({{ $product->product_qty }}) Items In Stock</span>
                            </div>

                        </div>



                        <p class="product-single__price product-single__price-product-template">

                            @php
                                $amount = $product->selling_price - $product->discount_price;
                                $discount = ($amount / $product->selling_price) * 100;
                            @endphp


                            @if ($product->discount_price == null)
                                <span
                                    class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                    <span id="ProductPrice-product-template">
                                        <span class="money">BDT {{ $product->selling_price }}</span>
                                    </span>
                                </span>
                            @else
                                <span class="visually-hidden">Regular price</span>
                                <s id="ComparePrice-product-template"><span class="money">BDT
                                        {{ $product->selling_price }}</span></s>
                                <span
                                    class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                    <span id="ProductPrice-product-template"><span class="money">BDT
                                            {{ $product->discount_price }}</span></span>
                                </span>
                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount / $product->selling_price) * 100;
                                @endphp
                                @if ($product->discount_price == null)
                                @else
                                    <span class="discount-badge"> <span class="devider">|</span>&nbsp;
                                        <span>You Save</span>
                                        <span id="SaveAmount-product-template" class="product-single__save-amount">
                                            <span class="money">BDT {{ round($amount) }}</span>
                                        </span>
                                        <span class="off">(<span>{{ round($discount) }}</span>%)</span>
                                    </span>
                                @endif
                            @endif

                        </p>

                    </div>


                    <div class="product-single__description rte">
                        <h3 style="color: #fff; font-size: 20px;">Product Description</h3>
                        <p style="color: #fff;">
                            {!! $product->short_descp !!}
                        </p>
                    </div>


                    <!-- Product Action -->
                    <div class="product-action clearfix">

                        <div class="product-form__item--quantity">
                            <div class="wrapQtyBtn">
                                <div class="qtyField">
                                    <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r"
                                            aria-hidden="true" style="color: #000;"></i></a>
                                    <input type="text" id="dqty" name="quantity" value="1"
                                        class="product-form__input qty" style="color: #fff;">
                                    <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r"
                                            aria-hidden="true" style="color: #000;"></i></a>
                                </div>
                            </div>
                        </div>



                        <div class="product-form__item--submit">
                            <input type="hidden" id="dproduct_id" value="{{ $product->id }}">

                            <input type="hidden" id="vproduct_id" value="{{ $product->vendor_id }}">

                            <button type="submit" name="add" class="btn product-form__cart-submit"
                                onclick="addToCartDetails()">
                                <span>Add to cart</span>
                            </button>
                        </div>

                    </div>
                    <!-- End Product Action -->



                    <div class="product-info">

                        <p class="product-type">
                            <span class="lbl">Brand: </span>
                            <span class="variant-sku"
                                style="color: #fff;">{{ $product['brand']['brand_name'] }}</span>
                        </p>

                        <p class="product-type">
                            <span class="lbl">Category: </span>
                            <span class="variant-sku"
                                style="color: #fff;">{{ $product['category']['category_name'] }}</span>
                        </p>

                        <p class="product-type">
                            <span class="lbl">SubCategory: </span>
                            <span class="variant-sku"
                                style="color: #fff;">{{ $product['subcategory']['subcategory_name'] }}</span>
                        </p>

                        <p class="product-tags">
                            <span class="lbl">Tags: </span>
                            <span class="variant-sku" style="color: #fff;">{{ $product->product_tags }}</span>
                        </p>

                    </div>


                </div>

            </div>
        </div>
        <!--End-product-single-->






        <style>
            .slick-prev.slick-arrow {
                background-color: #fff;
                top: 13rem;
            }

            .slick-next.slick-arrow {
                background-color: #fff;
                top: 13rem;
            }
        </style>
        <!--Related Product Slider-->
        <div class="related-product grid-products" style="margin-top:80px; margin-bottom:30px;">
            <header class="section-header">
                <h2 class="section-header__title text-center h2" style="font-weight:700;">
                    <span>Related Products</span>
                </h2>
            </header>
            <div class="productSlider grid-products">

                @foreach ($relatedProduct as $product)
                    <div class="col-12 item">

                        <!-- start product image -->
                        <div class="product-image">

                            <!-- start product image -->
                            <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"
                                class="grid-view-item__link">

                                <!-- image -->
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset($product->product_thambnail) }}"
                                    src="{{ asset($product->product_thambnail) }}" alt="image" title="product">
                                <!-- End image -->

                                <!-- Hover image -->
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset($product->product_thambnail) }}"
                                    src="{{ asset($product->product_thambnail) }}" alt="image" title="product">
                                <!-- End hover image -->

                                <!-- Variant Image-->
                                <img class="grid-view-item__image hover variantImg"
                                    src="{{ asset($product->product_thambnail) }}" alt="image" title="product">
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

                            <!-- Start Quick View -->
                            <div class="variants add">
                                <button class="btn btn-addto-cart quick-view-popup quick-view" type="button"
                                    tabindex="0" href="javascript:void(0)" title="Quick View" data-toggle="modal"
                                    data-target="#content_quickview" id="{{ $product->id }}"
                                    onclick="productView(this.id)">Quick View</button>
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
                                    <span class="price wht-text">BDT
                                        {{ $product->selling_price }}</span>
                                </div>
                            @else
                                <div class="product-price">
                                    <span class="old-price wht-text">BDT
                                        {{ $product->selling_price }}</span>
                                    <span class="price wht-text">BDT
                                        {{ $product->discount_price }}</span>
                                </div>
                            @endif
                            <!-- End product price -->

                        </div>
                        <!-- End product details -->

                    </div>
                @endforeach

            </div>
        </div>
        <!--End Related Product Slider-->

        <!--Recently Product Slider-->

        <!--End Recently Product Slider-->
    </div>
    <!--#ProductSection-product-template-->
</div>


@endsection
