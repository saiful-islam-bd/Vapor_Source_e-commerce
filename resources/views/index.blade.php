@extends('dashboard')
@section('user')

@section('title')
    User Dashboard
@endsection

<style>
    .custom_header_logo {
        width: 5rem;
        height: 5rem;
        margin-left: 2rem;
    }

    .card-header::before {
        display: none !important;
    }
</style>




<div class="container new-page" style="padding-bottom: 1rem;">

    <div class="row">

        <!-- ##############################  Sidebar ##############################  -->
        @include('frontend.body.dashboard_sidebar_menu')
        <!--End Sidebar-->



        <!-- ############################## Main Content ############################## -->
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col custom_margin_top">

            <div class="block block-dashboard-info">

                <div class="block-title" style="text-align: center;">
                    <h2>
                        <legend class="legend"><span>Account Information</span></legend>
                    </h2>
                </div>

            </div>

            <div class="row">

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                    <div class="block-content mt-4">
                        <div class="box box-information">
                            <strong class="box-title">
                                <h2><span>Contact Information:</span></h2>
                            </strong>
                            <div style="margin: 1rem 0">
                                <img id="showImage"
                                    src="{{ !empty($userData->photo) ? url('upload/user_images/' . $userData->photo) : url('upload/no_image.jpg') }}"
                                    alt="User" style="width:100px; height:100px;">
                            </div>
                            <div class="box-content">
                                <h3 style="text-transform: inherit;"> {{ Auth::user()->name }}</h3>
                                <h3 style="text-transform: inherit;"> {{ Auth::user()->email }}</h3>
                                <h3 style="text-transform: inherit;"> {{ Auth::user()->phone }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                    <div class="block-content mt-4">
                        <div class="box box-information">
                            <strong class="box-title">
                                <h2><span>Address Book:</span></h2>
                            </strong>
                            <div class="box-content">
                                <h3> {{ Auth::user()->address }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!--End Main Content-->

    </div>

</div>
@endsection
