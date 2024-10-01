

@extends('frontend.master_dashboard')
@section('main')

@section('title')
    Footer Menu Details
@endsection

@foreach ($footer_menu as $item)
<!-- ##############################  Title ##############################  -->
<div class="section-header text-center">
    <h2 class="h2 heading-font"
        style="font-size: 2rem;font-weight: 600;margin: 0;padding-top: 11rem;padding-bottom: 1rem;">
        {{ $item->footer_name }}</h2>
</div>
<!--End Title-->





<div class="page-content mb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-11 col-lg-12 m-auto">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-page pt-50 pr-30">
                         

                            <div class="single-content">
                                <div class="row">
                                    <div class="col-xl-10 col-lg-12 m-auto">
                                        {!! $item->footer_description !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endforeach


@endsection
