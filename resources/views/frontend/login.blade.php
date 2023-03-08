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
                      <h2>@lang('account.Login')</h2>
                      <ul>
                          <li><a href="{{route('ecommerce')}}">@lang('account.Home')</a></li>
                          <li><i class="fa fa-angle-double-right"></i></li>
                          <li><a href="javascript:void(0)">@lang('account.Login')</a></li>
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
            <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                <div class="theme-card">
                    <h3 class="text-center">@lang('account.Login')</h3>
                    <form class="theme-form" action="{{route('login_user')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>@lang('account.Email')</label>
                            <input type="text" class="form-control" name="email" placeholder="@lang('account.Email')" required="">
                        </div>
                        <div class="form-group">
                            <label>@lang('account.Password')</label>
                            <input type="password" class="form-control" name="password" placeholder="@lang('account.Enter your password')" required="">
                        </div>
                        <button class="btn btn-normal" type="submit">@lang('account.Login')</button>
                        <a class="float-end txt-default mt-2" href="{{route('forget_pwd')}}">@lang('account.Forgot your password?')</a>
                    </form>
                    <p class="mt-3">@lang('account.Sign up for a free account at our store. Registration is quick and easy. It allows you to be able to order from our shop. To start shopping click register.')</p>
                    <a href="{{route('register_user')}}" class="txt-default pt-3 d-block">@lang('account.Create an Account')</a>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

