<style>
    .custom_mobile_category_slider {
        padding-top: 5rem;
    }
</style>


@php
    $categories = App\Models\Category::orderBy('id', 'ASC')->get();
@endphp



<div class="section logo-section custom_mobile_category_slider">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <div class="logo-bar">
                    @foreach ($categories as $category)
                        <div class="logo-bar__item">
                            <a href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}">
                                <img src="{{ asset($category->category_image) }}" alt="" title=""
                                    style="padding: 2px" />
                            </a>

                            <h6>
                                <a
                                    href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}">
                                    {{ $category->category_name }}
                                </a>
                            </h6>

                            @php
                                $products = App\Models\Product::where('category_id', $category->id)->get();
                            @endphp

                            <span>{{ count($products) }} items</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>














{{--
<div>

    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

            <div class="product-details-img product-single__photos bottom">

                <div class="product-thumb product-thumb-1">

                    <div id="gallery" class="product-dec-slider-1 product-tab-left">

                        @foreach ($categories as $category)
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <a href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}"
                                        data-image="{{ asset($category->category_image) }}"
                                        data-zoom-image="{{ asset($category->category_image) }}"
                                        class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true"
                                        tabindex="-1">
                                        <img class="blur-up lazyload" style="height: 342px;width: 100%;"
                                            src="{{ asset($category->category_image) }}" alt="" />

                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                                <h6><a
                                                        href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}">{{ $category->category_name }}</a>
                                                </h6>

                                                @php
                                                    $products = App\Models\Product::where('category_id', $category->id)->get();
                                                @endphp

                                                <span>{{ count($products) }} items</span>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</div> --}}
