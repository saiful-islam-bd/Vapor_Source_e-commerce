@php
    $banner = App\Models\Banner::orderBy('id', 'ASC')
        ->limit(2)
        ->get();
@endphp


<div class="section imgBanners">

    <div class="container">

        <div class="imgBnrOuter">

            <div class="row">

                @foreach ($banner as $item)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="inner mt-3">
                            <a href="{{ route('campaign', $item->id) }}">
                                <img data-src="{{ asset($item->banner_image) }}" src="{{ asset($item->banner_image) }}"
                                    alt="" class="blur-up lazyload" style="height: 275px;" />
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </div>

</div>
