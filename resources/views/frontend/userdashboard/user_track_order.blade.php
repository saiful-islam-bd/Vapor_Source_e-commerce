@extends('dashboard')
@section('user')
@section('title')
    Track Your Order | Vapour Source
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="row">

                    <!-- // Start Col md 3 menu -->

                    @include('frontend.body.dashboard_sidebar_menu')
                    <!-- // End Col md 3 menu -->




                    <div class="col-md-9 custom_margin_top">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab">
                                <div class="card" style="background-color: #000;">
                                    <div class="card-header">
                                        <h5>Track Your Order</h5>
                                    </div>
                                    <div class="card-body">

                                        <form method="post" action="{{ route('order.tracking') }}">
                                            @csrf

                                            <div class="row">

                                                <div class="form-group col-md-12">
                                                    <label>Invoice Code <span class="required">*</span></label>
                                                    <input class="form-control" name="code" type="text"
                                                        placeholder="Your Order Invoice Number" required="" />

                                                </div>



                                                <div class="col-md-12">
                                                    <button type="submit"
                                                        class="btn btn-fill-out submit font-weight-bold" name="submit"
                                                        value="Submit">Track Order</button>
                                                </div>
                                            </div>
                                        </form>
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
@endsection
