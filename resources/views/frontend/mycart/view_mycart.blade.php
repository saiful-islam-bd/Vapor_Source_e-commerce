@extends('frontend.master_dashboard')
@section('main')
@section('title')
    My Cart
@endsection

<style>
    .custom_header_logo {
        width: 5rem;
        height: 5rem;
        margin-left: 2rem;
    }

    .custom_header_logo_mobile {
        width: 5rem;
        height: 5rem;
        margin-left: -1rem;
    }
</style>

<!--Body Content-->
<div id="page-content">

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col" style="margin-top: 200px;">

                <form action="#" method="post" class="cart style2">
                    <table>
                        <thead class="cart__row cart__header">
                            <tr>
                                <th colspan="2" class="">Product</th>
                                {{-- <th class="">Size</th> --}}
                                <th class="">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-right">Price</th>
                                <th class="action">&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody id="cartPage"></tbody>

                    </table>
                </form>
            </div>


            <div class="container mt-4">
                <div class="row">

                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
                        <a href="{{ url('/') }}" class=" cart-continue"><i class="fa-solid fa-angle-left"></i> Shop
                            More</a>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">

                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">



                        <div id="couponCalField"></div>




                        <div class="row">
                            <div class="col-5 col-sm-5 col-md-5 col-lg-5">
                            </div>
                            <div class="col-7 col-sm-7 col-md-7 col-lg-7" style="padding-top: 60px;">
                                <a href="{{ route('checkout') }}" name="checkout" id="cartCheckout"
                                    class="btn btn--small-wide checkout"
                                    style="border-radius: 30px;
                                padding:8px 8px; background-color: #000;">Go To
                                    Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>
<!--End Body Content-->
@endsection
