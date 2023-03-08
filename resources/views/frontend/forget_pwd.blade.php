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
                        <h2>Forget Password</h2>
                        <ul>
                            <li><a href="{{route('ecommerce')}}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">forget password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<section class="login-page pwd-page section-big-py-space b-g-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="theme-card">
                <h3>Forget Your Password</h3>
                <form class="theme-form" action="{{route('forget_pwd_user')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                              <input type="text" name="email" class="form-control" placeholder="Enter Your Email" required="">
                          </div>
                          <div class="form-group mb-0">
                            <button type="submit" class="btn btn-normal">Submit</a>
                          </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

