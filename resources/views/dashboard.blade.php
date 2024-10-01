<!DOCTYPE html>
<html class="no-js" lang="en">

@php
    $seo = App\Models\Seo::find(1);
@endphp

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/assets/images/favicon.png" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins.css">

    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>



<body class="template-index belle template-index-belle">

    {{-- <div id="pre-loader">
        <img src="{{ asset('frontend') }}/assets/images/loader.gif" alt="Loading..." />
    </div> --}}


    <div class="pageWrapper">

        <!--Search Form Drawer-->
        <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="#">
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" name="q" value=""
                        placeholder="Search entire store..." aria-label="Search" autocomplete="off">
                </form>
                <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
            </div>
        </div>
        <!--End Search Form Drawer-->


        <!--Header & Mobile Menu-->
        @include('frontend.body.header')
        <!--End Header & Mobile Menu-->



        <style>
            .card-header::before {
                display: none;
            }

            .custom_margin_top {
                margin-top: 200px;
            }

            @media only screen and (max-width: 480px) {
                .custom_margin_top {
                    margin-top: 80px;
                }
            }
        </style>
        <!--Body Content-->
        <div id="page-content">
            @yield('user')
        </div>
        <!--End Body Content-->


        <!--Footer-->
        @include('frontend.body.footer_two')
        <!--End Footer-->


        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <!--End Scoll Top-->


        <!--Quick View popup-->
        @include('frontend.body.quickview')
        <!--End Quick View popup-->


        <!-- Age Verification Popup -->
        @include('frontend.body.age_verification')
        <!-- End Age Verification Popup -->


        <!-- Including Jquery -->
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.cookie.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/wow.min.js"></script>

        <!-- Including Javascript -->
        <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/lazysizes.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/main.js"></script>

        <!--For Newsletter Popup-->
        <script>
            jQuery(document).ready(function() {
                jQuery('.closepopup').on('click', function() {
                    jQuery('#popup-container').fadeOut();
                    jQuery('#modalOverly').fadeOut();
                });

                var visits = jQuery.cookie('visits') || 0;
                visits++;
                jQuery.cookie('visits', visits, {
                    expires: 1,
                    path: '/'
                });
                console.debug(jQuery.cookie('visits'));
                if (jQuery.cookie('visits') > 1) {
                    jQuery('#modalOverly').hide();
                    jQuery('#popup-container').hide();
                } else {
                    var pageHeight = jQuery(document).height();
                    jQuery('<div id="modalOverly"></div>').insertBefore('body');
                    jQuery('#modalOverly').css("height", pageHeight);
                    jQuery('#popup-container').show();
                }
                if (jQuery.cookie('noShowWelcome')) {
                    jQuery('#popup-container').hide();
                    jQuery('#active-popup').hide();
                }
            });

            jQuery(document).mouseup(function(e) {
                var container = jQuery('#popup-container');
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.fadeOut();
                    jQuery('#modalOverly').fadeIn(200);
                    jQuery('#modalOverly').hide();
                }
            });

            /*--------------------------------------
                Promotion / Notification Cookie Bar 
              -------------------------------------- */
            if (Cookies.get('promotion') != 'true') {
                $(".notification-bar").show();
            }
            $(".close-announcement").on('click', function() {
                $(".notification-bar").slideUp();
                Cookies.set('promotion', 'true', {
                    expires: 1
                });
                return false;
            });
        </script>
        <!--End For Newsletter Popup-->

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info(" {{ Session::get('message') }} ");
                        break;

                    case 'success':
                        toastr.success(" {{ Session::get('message') }} ");
                        break;

                    case 'warning':
                        toastr.warning(" {{ Session::get('message') }} ");
                        break;

                    case 'error':
                        toastr.error(" {{ Session::get('message') }} ");
                        break;
                }
            @endif
        </script>

    </div>
</body>

</html>
