{{-- Extends layout --}}
@extends('frontend.includes.default')

{{-- Content --}}
@section('content')
 

<!-- breadcrumb start -->
<div class="breadcrumb-main ">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="breadcrumb-contain">
          <div>
            <h2>About Us</h2>
            <ul>
              <li><a href="{{route('ecommerce')}}">home</a></li>
              <li><i class="fa fa-angle-double-right"></i></li>
              <li><a href="javascript:void(0)">About Us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb End -->


<!-- about section start -->
<section class="about-page section-big-py-space">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="text-primary text-uppercase">Bakdounes Platform</h2>
                <p class="py-3">
                    Own a professional store at the lowest costs and without sales commission. Convert to e-commerce easily and quickly and own your own online store with all the advantages of e-commerce while providing support services for it.                    </p>
                <a href="{{route('contactus')}}" class="btn btn-primary text-uppercase shadow-sm rounded-pill px-5 py-3">
                    Start Now
                </a>
            </div>
            <div class="col-lg-6">
                <div class="banner-section"><img src="{{asset('media/about-us.svg')}}" alt="hero" width="100%"></div>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->

@endsection




