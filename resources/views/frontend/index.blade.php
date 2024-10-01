@extends('frontend.master_dashboard')
@section('main')

@section('title')
    Vapor Source
@endsection


<!--Home slider-->
@include('frontend.home.slider')
<!--End Home slider-->


<!--Home slider-->
@include('frontend.home.banner')
<!--End Home slider-->


<!-- Brand slider -->
@include('frontend.home.categroy')
<!-- Brand slider -->


<!--New Arrivals-->
@include('frontend.home.new_arrivals')
<!--End New Arrivals-->


<!--Newsletter-->
@include('frontend.home.newsletter')
<!--End Newsletter-->

@endsection
