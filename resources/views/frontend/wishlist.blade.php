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
                        <h2>Wishlist</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">Wishlist</a></li>
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
                        <h3 class="text-3xl text-bold">Wishlist List</h3>
                      <div class="row">
                    <aside class="col-lg-12">
                        <div class="card">
                      <div class="table-responsive">
                                            
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">Product</th>
                                     
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if(session('wishlist'))
                                    @foreach(session('wishlist') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-3 hidden-xs"><img src="{{ asset('uploads/items/' . $details['image'] )}}" width="100" height="100" class="img-responsive"/></div>
                                                    <div class="col-sm-9">
                                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-danger btn-sm remove-from-wishlist"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            
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
 