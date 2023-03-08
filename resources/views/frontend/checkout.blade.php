{{-- Extends layout --}}
@extends('frontend.includes.default')


@section('styles')
<style>
#map-canvas{
  height: 400px;
  width: 400px;
 
}

#search_input {
  font-size: 18px;
  width: 430px;
  height: 40px;
  margin: 5px;
  padding: 5px;
  box-sizing: border-box;
}
h4
{
    display: inline;
}

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
                        <h2>@lang('checkout.Checkout')</h2>
                        <ul>
                            <li><a href="#">@lang('checkout.Home')</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">@lang('checkout.Checkout')</a></li>
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
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>@lang('checkout.Billing Details')</h3></div>
                                 <form action="{{ route('checkout') }}" method="post">
                                      @csrf
                                <div class="theme-form">
                                <div class="row check-out ">
                                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">@lang('checkout.City')</label>
                                        <input type="text" name="city" value="" placeholder="@lang('checkout.City')" required>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">@lang('checkout.Area')</label>
                                        <input type="text" name="area" value="" placeholder="@lang('checkout.Area')" required>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">@lang('checkout.Address Nick name (optional)')</label>
                                        <input type="text" name="field-name" value="" placeholder="@lang('checkout.Address Nick name (optional)')">
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">@lang('checkout.Street')</label>
                                        <input type="text" name="street_n" value="" placeholder="@lang('checkout.Street address')" required>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">@lang('checkout.Building No')</label>
                                        <input type="text" name="building_n" value="" placeholder="@lang('checkout.Building No')" required>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <label class="field-label">@lang('checkout.Floor No')</label>
                                        <input type="text" name="floor_n" value="" placeholder="@lang('checkout.Floor No')" required>
                                    </div>

                                     <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <label class="field-label">@lang('checkout.Aparment No')</label>
                                        <input type="text" name="appartment_n" value="" placeholder="@lang('checkout.Aparment No')" required>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <label class="field-label">@lang('checkout.Additional Description')</label>
                                        <input type="text" name="customer_note" value="" placeholder="@lang('checkout.Additional Description')">
                                    </div>

                                     <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <label class="field-label">@lang('checkout.Phone Number')</label>
                                        <input type="number" name="phone_number" value="" placeholder="@lang('checkout.Phone Number')" required>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">@lang('checkout.Google Map')</label>
                                         <input type="hidden" name="long" id="long" value="" required>
                                         <input type="hidden" name="lat" id="lat" value="" required>
                                         <input type="text" id="search_input" placeholder="@lang('checkout.Search for a place')" />
                                          <div id="map-canvas" style="margin: auto;"></div>
                                          </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details theme-form  section-big-mt-space">
                                <div class="order-box">
                                    <div class="title-box">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                    <th scope="col">@lang('checkout.Product') </th>
                                     <th scope="col">@lang('checkout.quantity')   </th>
                                     <th scope="col">@lang('checkout.Total')  </th>
                                     </tr>
                                      </thead>
                                      <tbody>
                                       @php $total = 0 @endphp
                                       @if(session('cart'))
                                      @foreach(session('cart') as $id => $details)
                                       @php $total += $details['price'] * $details['quantity'] @endphp
                                       <tr data-id="{{ $id }}">
                                     <td> 
                                     <a href="{{route('product_details', $details['id'] )}}">
                                        @if(strlen($details['name']) > 22)
                                        {{substr($details['name'],0,22)}} 
                                          @else
                                          {{ $details['name']}}
                                       @endif
                                       </a>
                                     </td>

                                     <td class="form-group" data-th="Quantity">
                                        <div class="qty-box">
                                            <div class="input-group" data-id="{{ $id }}">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control quantity update-cart" type="number" value="{{ $details['quantity'] }}" style=" width: 60px; ">
                                            <button class="qty-plus"></button>
                                            </div>

                                     </td>
                                

                                     <td> 
                                         AED{{ $details['price'] * $details['quantity'] }}
                                      </td>
                                      <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                      @endforeach
                                      @endif
                                     </tbody>
                                     </table>
                                    </div>
                               
                                    <ul class="total">
                                        <li>@lang('checkout.Total') <span class="count"> @lang('checkout.Total') : @lang('checkout.AED') {{ $total + config('appGlobal.delivery_fee') +  config('appGlobal.tax') }}</span></li>
                                   </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                           
                                            <ul>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" value="cod" name="cod" id="payment-1" checked="checked">
                                                        <label for="payment-1">@lang('checkout.Cash On Delivery')<span class="small-text">@lang('checkout.Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.')</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" value="card" name="payment" id="payment-2">
                                                        <label for="payment-2">@lang('checkout.Debit/Credit Card')<span class="small-text">@lang('checkout.Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.')</span></label>
                                                    </div>
                                                </li>
                                                    <main>
                                                        <div class="row showcard">
                                                            <aside class="col-sm-12">
                                                                <article class="card">
                                                                    <div class="card-body p-5">
                                                                        <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                                                                <i class="fa fa-credit-card"></i> @lang('checkout.Credit Card')</a>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="tab-content">
                                                                            <div class="tab-pane fade show active" id="nav-tab-card">
                                                                                @foreach (['danger', 'success'] as $status)
                                                                                    @if(Session::has($status))
                                                                                        <p class="alert alert-{{$status}}">{{ Session::get($status) }}</p>
                                                                                    @endif
                                                                                @endforeach

                                                                                
                                                                               
                                                                                    <div class="form-group">
                                                                                        <label for="username">@lang('checkout.Full name (on the card)')</label>
                                                                                        <input type="text" class="form-control" name="fullName" placeholder="Full Name">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="cardNumber">@lang('checkout.Card number')</label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" class="form-control" name="Number" placeholder="@lang('checkout.Card number')">
                                                                                            <div class="input-group-append">
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <div class="form-group">
                                                                                                <label><span class="hidden-xs">@lang('checkout.Expiration')</span> </label>
                                                                                                <div class="input-group">
                                                                                                    <select class="form-control" name="ccExpiryMonth">
                                                                                                        <option value="">@lang('checkout.MM')</option>
                                                                                                        @foreach(range(1, 12) as $month)
                                                                                                            <option value="{{$month}}">{{$month}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                    <select class="form-control" name="@lang('checkout.ccExpiryYear')">
                                                                                                        <option value="">@lang('checkout.YYYY')</option>
                                                                                                        @foreach(range(date('Y'), date('Y') + 10) as $year)
                                                                                                            <option value="{{$year}}">{{$year}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label data-toggle="tooltip" title=""
                                                                                                    data-original-title="3 digits code on back side of the card">@lang('checkout.CVV') <i
                                                                                                    class="fa fa-question-circle"></i></label>
                                                                                                <input type="number" class="form-control" placeholder="@lang('checkout.CVV')" name="cvvNumber">
                                                                                            </div>
                                                                                        </div>
                                                                                       
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            </aside>
                                                        </div>
                                                    </main>

                                                @if ($message = Session::get('success'))
                                                    <div class="success">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @endif
                                                
                                                
                                                @if ($message = Session::get('error'))
                                                    <div class="error">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @endif
                                                
                                              
                                            </ul>
                                        </div>
                                    </div>
                                    @if(session('cart'))
                                    <div class="text-right"><button type="submit" class="btn-normal btn">@lang('checkout.Place Order')</button></div>
                                    @endif
                                      </form>
                                     
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
<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(23.0996365,54.3210099),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("map-canvas"),mapProp);
}
</script>

<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAgetfsUjWTD71H7UEq3gyPjjnRFaBT5Wc&signed_in=true&libraries=places&callback=myMap'></script>

    <script src="{{ asset('/js/card.js') }}"></script>
    <script>
        $('#payment').click(function() {
         $(".showcard").show();
        });

        $('#cod').click(function() {
            $(".showcard").hide();
        });
        

    </script>
 <script>

    @if($message = session('error'))
    swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: "{{ $message }}",
   
    });
    @endif
    </script>

@endsection