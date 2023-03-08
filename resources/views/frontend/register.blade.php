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
                      <h2>@lang('account.Register')</h2>
                      <ul>
                          <li><a href="{{route('ecommerce')}}">@lang('account.Home')</a></li>
                          <li><i class="fa fa-angle-double-right"></i></li>
                          <li><a href="javascript:void(0)">@lang('account.Register')</a></li>
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
                  <h3 class="text-center">@lang('account.Create account')</h3>
                  <form class="theme-form" action="{{('register_user')}}" method="post">
                    @csrf
                      <div class="row g-3">
                          <div class="col-md-12 form-group">
                              <label for="email">@lang('account.First Name')</label>
                              <input type="text" class="form-control" id="fname" name="fname" placeholder="@lang('account.First Name')" required>
                          </div>
                          <div class="col-md-12 form-group">
                              <label for="review">@lang('account.Last Name')</label>
                              <input type="text" class="form-control" id="lname" name="lname" placeholder="@lang('account.Last Name')" required>
                          </div>
                      </div>
                      <div class="row g-3">
                          <div class="col-md-12 form-group">
                              <label>@lang('account.email')</label>
                              <input type="text" class="form-control" placeholder="Email" name="email" required>
                          </div>
                          <div class="col-md-12 form-group">
                              <label>@lang('account.Password')</label>
                              <input type="password" class="form-control" placeholder="Enter your password" name="@lang('account.Password')" required>
                          </div>
                          <div class="col-md-12 form-group"><button class="btn btn-normal" type="submit">@lang('account.Create account')</button></div>
                          
                      </div>
                      <div class="row g-3">
                          <div class="col-md-12 ">
                              <p>@lang('account.Have you already account?') <a href="{{route('signin')}}" class="txt-default">@lang('account.click')</a>@lang('account.here to') &nbsp;<a href="{{route('signin')}}" class="txt-default">@lang('account.Login')</a></p>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>


@endsection

