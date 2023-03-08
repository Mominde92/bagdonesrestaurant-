{{-- Extends layout --}}
@extends('frontend.includes.default')

{{-- Content --}}
@section('content')
    
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>Order Success</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">Order Success</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
<section class="section-big-py-space light-layout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h2>thank you</h2>
                    <p>Payment is successfully processsed and your order is on the way</p>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection




@section('scripts')


@endsection