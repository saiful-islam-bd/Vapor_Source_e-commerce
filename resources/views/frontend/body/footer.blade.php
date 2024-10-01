@php
    $setting = App\Models\SiteSetting::find(1);

    $shop = App\Models\FooterMenu::where('footer_title', 'shop')
        ->orderBy('id', 'asc')
        ->get();
    $useful_links = App\Models\FooterMenu::where('footer_title', 'useful_links')
        ->orderBy('id', 'asc')
        ->get();
    $customer_services = App\Models\FooterMenu::where('footer_title', 'customer_services ')
        ->orderBy('id', 'asc')
        ->get();
@endphp

<footer id="footer" class="footer-2">

    <!-------- Main footer --------->
    <style>
        .useful-links {
            color: #fff;
            font-size: 16px;
            font-weight: 600;
        }
    </style>
    <div class="site-footer" style="border-top: 1px solid #fff; background-color: #000;">
        <div class="container">
            <!--Footer Links-->
            <div class="footer-top" style="padding-top: 40px; margin-bottom:10px;">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center contact-box"
                        style="padding-left: 20px; padding-right: 20px;">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset($setting->logo) }}" alt="Logo" style="width: 150px;height: 120px;">
                        </a>


                        <ul class="list--inline site-footer__social-icons social-icons">
                            <li> <a class="social-icons__link" href="#" target="_blank"
                                    title="Belle Multipurpose Bootstrap 4 Template on Facebook"
                                    style="margin-left: 0px;"><i class="icon icon-facebook" style="color:#fff;"></i></a>
                            </li>


                            <li><a class="social-icons__link" href="#" target="_blank"
                                    title="Belle Multipurpose Bootstrap 4 Template on Instagram"><i
                                        class="icon icon-instagram" style="color:#fff;"></i> <span
                                        class="icon__fallback-text">Instagram</span></a></li>

                            <li><a class="social-icons__link" href="#" target="_blank"
                                    title="Belle Multipurpose Bootstrap 4 Template on YouTube"><i
                                        class="icon icon-youtube" style="color:#fff;"></i> <span
                                        class="icon__fallback-text">YouTube</span></a></li>

                        </ul>

                    </div>

                    <!-------- Use Location -------->

                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 footer-links"
                        style="padding-left: 20px; padding-right: 20px;">

                        <h4 class="h4">Shop</h4>
                        <ul class="contact-info">
                            <li>
                                <h6 style="color: #F3A531;text-transform:uppercase;margin-bottom: 0;">DHANMONDI BRANCH:
                                </h6>
                                <p>J&J, Mansion House#2 (2nd Floor) Road #13 New Dhanmondi</p>
                            </li>
                            <li>
                                <p><b style="color: #fff;text-transform:uppercase;">Phone</b><br>01730213286,
                                    01779776164</p>
                            </li>
                            <li>
                                <p><b style="color: #fff;text-transform:uppercase;">Email</b><br><a
                                        href="mailto:vaporsourcelounge2017@gmail.com">vaporsourcelounge2017@gmail.com</a>
                                </p>
                            </li>
                        </ul>
                    </div>

                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 footer-links"
                        style="padding-left: 20px; padding-right: 20px;">

                        <h4 class="h4">Useful Links</h4>
                        <ul>

                            @foreach ($useful_links as $item)
                                <li><a href="{{ route('details', $item->id) }}">{{ $item->footer_name }}</a></li>
                            @endforeach

                            {{-- @foreach ($useful_links as $item)
                              <li><a href="#">{{ $item->footer_name }}</a></li>
                            @endforeach --}}

                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 footer-links"
                        style="padding-left: 20px; padding-right: 20px;">
                        <h4 class="h4">Customer Services</h4>
                        <ul>
                            @foreach ($customer_services as $item)
                                <li><a href="{{ $item->footer_url }}">{{ $item->footer_name }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box"
                        style="padding-left: 20px; padding-right: 20px;">
                        <h4 class="h4">Visit Us</h4>
                        <div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4470.019564973135!2d90.37472940489123!3d23.753902694738386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8ad1d395775%3A0x6fb350e98e63e528!2z4Kat4KeH4Kaq4Ka-4KawIOCmuOCni-CmsOCnjeCmuA!5e0!3m2!1sen!2sbd!4v1676375924469!5m2!1sen!2sbd"
                                width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>



                    </div>
                </div>
            </div>
            <!--End Footer Links-->





            <style>
                .custom_mobile_footer_slider {
                    padding-top: 4rem;
                }
            </style>
            @php
                $slider = App\Models\footer_slider::orderBy('id', 'DESC')->get();
            @endphp

            <style>
                .slick-prev.slick-arrow {
                    background-color: #fff;
                    top: 10rem;
                }

                .slick-next.slick-arrow {
                    background-color: #fff;
                    top: 10rem;
                }
            </style>
            <!--Footer Slider-->
            <div class="section custom_mobile_footer_slider">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="productSlider grid-products">
                                @foreach ($slider as $item)
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="#!" class="grid-view-item__link">
                                                <!-- image -->
                                                <img src="{{ asset($item->slider_image) }}" alt="image"
                                                    title="product" style="height: 150px;">
                                                <!-- End image -->
                                            </a>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Footer Slider-->
            <hr>

            <style>
                @media screen and (max-width:480px) {
                    .footer-left-mbl-view {
                        text-align: center;
                        margin-bottom: 20px;
                    }

                    .footer-right-mbl-view {
                        text-align: center;
                    }

                }

                @media screen and (min-width:768px) {
                    .desk-view {
                        float: right;
                    }
                }
            </style>
            <div class="footer-bottom">
                <div class="row">
                    <!--Footer Copyright-->
                    <div
                        class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-0 order-lg-0 order-sm-1 copyright footer-left-mbl-view">
                        <a href="http://srsoftbd.xyz/" target="_blank">Developed & Designed by S/R Soft Bangladesh</a>
                    </div>
                    <div
                        class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-0 order-lg-0 order-sm-1 copyright footer-right-mbl-view">
                        <img src="{{ asset('frontend') }}/assets/images/payment.png" alt="" class="desk-view">
                    </div>
                    <!--End Footer Copyright-->
                </div>
            </div>


        </div>
    </div>
</footer>
