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
            <h2>@lang('contactus.Contact Us')</h2>
            <ul>
              <li><a href="{{route('ecommerce')}}">@lang('contactus.home')</a></li>
              <li><i class="fa fa-angle-double-right"></i></li>
              <li><a href="javascript:void(0)">@lang('contactus.Contact Us')</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb End -->


<div class="row d-flex align-items-center justify-content-around">
  <div class="col-lg-5">
      <img src="{{asset('media/contactus.svg')}}" alt="contact" width="100%">
  </div>
  <div class="col-lg-5">
      <h2 class="text-uppercase text-primary"></h2>
      <form class="row mt-5" action="{{asset('sendcontactus')}}" method="post" target="_blank">
          <div class="col-lg-6">
              <div class="form-floating mb-3">
                  <input type="text" class="form-control border-0 shadow-sm" id="floatingInputNom" name="first_name" placeholder="name@example.com">
                  <label for="floatingInputNom" class="text-secondary"><i class="fa-solid fa-user me-2"></i>@lang('contactus.Family Name')<span class="text-danger ms-1">*</span></label>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="form-floating mb-3">
                  <input type="text" class="form-control border-0 shadow-sm" id="floatingInputprenom" name="family_name" placeholder="name@example.com">
                  <label for="floatingInputprenom" class="text-secondary"><i class="fa-solid fa-user me-2"></i>@lang('contactus.First Name')<span class="text-danger ms-1">*</span></label>
              </div>
          </div>
          <div class="col-lg-12">
              <div class="form-floating mb-3">
                  <input type="email" class="form-control border-0 shadow-sm" id="floatingInputEmail" name="email" placeholder="name@example.com">
                  <label for="floatingInputEmail" class="text-secondary"><i class="fa-solid fa-at me-2"></i>@lang('contactus.Email address')<span class="text-danger ms-1">*</span></label>
              </div>
          </div>
          <div class="col-lg-12">
              <div class="form-floating mb-3">
                  <input type="number" class="form-control border-0 shadow-sm" id="floatingInputPhone" name="phone_number" placeholder="name@example.com">
                  <label for="floatingInputPhone" class="text-secondary"><i class="fa-solid fa-phone me-2"></i>@lang('contactus.Phone Number')<span class="text-danger ms-1">*</span></label>
              </div>
          </div>
          <div class="col-lg-12">
              <div class="form-floating mb-3">
                  <textarea class="form-control border-0 shadow-sm" name="message" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea>
                  <label for="floatingTextarea" class="text-secondary"><i class="fa-solid fa-envelope me-2"></i>@lang('contactus.Message')<span class="text-danger ms-1">*</span></label>
              </div>
          </div>
          <div class="col-lg-12">
              <p class="small text-secondary mb-3">
              </p>
          </div>
          <div class="col-lg-12 text-center text-lg-end">
              <button type="submit" class="btn btn-primary py-3 px-5 text-uppercase rounded-pill">@lang('contactus.Send')</button>
          </div>
      </form>
  </div>
</div>


@endsection




