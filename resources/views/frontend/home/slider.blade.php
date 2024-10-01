<style>
    @media only screen and (max-width: 480px) {
        .slick-list.draggable {
            /* margin-top: -4rem; */
        }
    }
</style>

@php
    $slider = App\Models\Slider::orderBy('id', 'ASC')->get();
@endphp


<div class="slideshow slideshow-wrapper">
    <div class="home-slideshow">

        @foreach ($slider as $item)
            <div class="slide">
                <div class="blur-up lazyload">
                    <img class="blur-up lazyload" data-src="{{ asset($item->slider_image) }}"
                        src="{{ asset($item->slider_image) }}" style="width:100%; height:450px;"
                        alt="Shop Our New Collection" title="Shop Our New Collection" />
                    {{-- <div class="slideshow__text-wrap slideshow__overlay classic middle">
                        <div class="slideshow__text-content middle">
                            <div class="container">
                                <div class="wrap-caption right">
                                    <h2 class="h1 mega-title slideshow__title" style="color: #fff;">Our New
                                        Products
                                    </h2>
                                    <span class="mega-subtitle slideshow__subtitle" style="color: #fff;">Save
                                        up to 50%
                                        Off</span>
                                    <span class="btn">Shop now</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        @endforeach

    </div>
</div>
