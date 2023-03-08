{{-- Extends layout --}}
@extends('frontend.includes.default')


@section('styles')
<style>
  
 </style>
@endsection


{{-- Content --}}
@section('content')

<div class="breadcrumb-main ">
  <div class="container">
      <div class="row">
          <div class="col">
              <div class="breadcrumb-contain">
                  <div>
                      <h2>@lang('account.Reset Password')</h2>
                      <ul>
                          <li><a href="{{route('ecommerce')}}">@lang('account.Home')</a></li>
                          <li><i class="fa fa-angle-double-right"></i></li>
                          <li><a href="javascript:void(0)">@lang('account.Reset Password')</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<section class="login-page section-big-py-space b-g-light">
  <div class="custom-container">
      <div class="row">
          <div class="col-lg-4 offset-lg-4">
              <div class="theme-card">
                  <form class="theme-form" method="post" action="{{route('reset_password_email',$user->otp)}}">
                    @csrf
                      <div class="row g-3">
                          <div class="col-md-12 form-group">
                              <label for="email">@lang('account.Password')</label>
                              <input type="text" class="form-control" id="password" name="password" placeholder="Your New Password" required>
                          </div>
                        </div>
                        <div class="col-md-12 form-group"><button class="btn btn-normal" type="submit">@lang('account.Change Password')</button></div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>


@endsection

