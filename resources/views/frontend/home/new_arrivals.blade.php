<style>
    p {
        color: #ffffff;
    }

    .best-seller-heading {
        font-size: 30px;
        font-weight: 700;
        font-family: Arial, Helvetica, sans-serif;
        color: #ffffff;
    }

    @media only screen and (max-width: 480px) {
        .custom_mobile_new_arrivals_image {
            height: 13rem !important;
        }

    }
</style>


@php
    $new_arrivals = App\Models\Product::orderBy('id', 'DESC')
        ->limit(36)
        ->get();
@endphp


<div class="product-rows section">

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="best-seller-heading">New Arrivals</h2>
                    <p>Grab these new items before they are gone!</p>
                </div>
            </div>

        </div>


        <div class="grid-products">

            <div class="row">

                @foreach ($new_arrivals as $product)
                    <div class="col-6 col-sm-2 col-md-3 col-lg-3 item">

                        <!-- start product image -->
                        <div class="product-image">

                            <!-- start product image -->
                            <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"
                                class="grid-view-item__link">

                                <!-- image -->
                                <img class="custom_mobile_new_arrivals_image"
                                    data-src="{{ asset($product->product_thambnail) }}"
                                    src="{{ asset($product->product_thambnail) }}" alt="image" title="product">
                                <!-- End image -->



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

                            <!-- Start Add to Cart -->
                            {{-- <form class="variants add" action="#" onclick="window.location.href='cart.php'"
                                method="post">
                                <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                            </form> --}}
                            <!-- end Add to Cart -->

                            <!-- Start Quick View -->
                            {{-- <div class="button-set">
                                <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view"
                                    data-toggle="modal" data-target="#content_quickview" id="{{ $product->id }}" onclick="productView(this.id)">
                                    <i class="icon anm anm-search-plus-r"></i>
                                </a>
                            </div> --}}
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
