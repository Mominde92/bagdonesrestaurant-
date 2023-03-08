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
                        <h2>Cart</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   <section class="section-big-py-space b-g-light">
    <div class="custom-container">
        <div class="checkout-page contact-page">
            <div class="checkout-form">
          <div class="row">
          <div class="col-12">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        <h3 class="text-3xl text-bold" style=" color: #333333; font-weight: 700; font-size: 24px; margin-bottom: 2rem; ">Cart List</h3>
                      <div class="row">
                    <aside class="col-lg-12">
                        <div class="card">
                      <div class="table-responsive">
                                            
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:30%">Product</th>
                                    <th style="width:10%">Price</th>
                                    <th style="width:12%">Quantity</th>
                                    <th style="width:10%" class="text-center">Subtotal</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-3 hidden-xs"><img src="{{ asset('uploads/items/' . $details['image'] )}}" width="100" height="100" class="img-responsive image-cart"/></div>
                                                    <div class="col-sm-9">
                                                         <h4 class="nomargin">
                                                            @php
                                                            $name = $details['name'];
                                                            $words = explode(' ', $name);
                                                            $words = array_slice($words, 0, 6);
                                                            $name = implode(' ', $words); 
                                                            @endphp
                                                            {{ $name }}
                                                        </h4><br/>
                                                         
                                                        <p class="nomargin">
                                                            @php
                                                            $description = $details['description'];
                                                            $words = explode(' ', $description);
                                                            $words = array_slice($words, 0, 12);
                                                            $description = implode(' ', $words); 
                                                            @endphp
                                                            {{ $description }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">{{ $details['price'] }} AED</td>
                                            <td data-th="Quantity">
                                            <div class="qty-box">
                                            <div class="input-group" data-id="{{ $id }}">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control quantity update-cart" type="number" value="{{ $details['quantity'] }}" style=" width: 60px; ">
                                            <button class="qty-plus"></button>
                                            </div>
                                            </td>
                                            <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }} AED</td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    
                                @endif
                            </tbody>
                            
                            <tfoot style="border-top: 2px solid #dadada;">
                                <tr style=" text-align: left; ">
                                    <td colspan="4" class="text-left"><h3><strong style="margin-right: 6rem;">Sub Total </strong>
                                        
                                    <strong style="margin-right: 6rem;">   {{ $total }} AED</strong></h3></td>
                                </tr>
                                <tr style=" text-align: left; ">
                                    <td colspan="4" class="text-left"><h3><strong style="margin-right: 4rem;">Delivery Fees </strong>
                                        <strong>{{ config('appGlobal.delivery_fee')}} AED </strong></h3></td>
                                </tr>

                                <tr style="text-align: left; "> 
                                    <td colspan="4" class="text-left"><h3><strong style="margin-right: 7rem;">Taxes  </strong>
                                        
                                        <strong>  {{config('appGlobal.tax') }} AED</strong></h3></td>
                                </tr>

                                <tr style="text-align: left; background-color: #ccc;">
                                    <td colspan="4" class="text-left"><h3><strong style=" margin-right: 7rem;">Total </strong>
                                        
                                       <strong style="margin-right: 6rem;">  {{ $total + config('appGlobal.delivery_fee') +  config('appGlobal.tax') }} AED</strong></h3></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-left">
                                        <a href="{{ url('ecommerce') }}" class="btn btn-success"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                                       <a href="{{ route('checkoutlist') }}"> <button class="btn btn-success" style="float: right;">Checkout</button> </a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                      
                        <div>
                          
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
             </div>
            </div>
         
        </section>
    @endsection

    
@section('scripts')
@endsection
 