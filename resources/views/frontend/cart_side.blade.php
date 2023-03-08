    <ul  class="cart_product">  
     @foreach(session('cart') as $id => $details)
  <li class="cart-list">
    <div class="media">
      <a href="#">
        <img alt="megastore1" class="me-3" src="{{ asset('uploads/items/' . $details['image'] )}}">
      </a>
      <div class="media-body">
        <a href="{{route('product_details', $details['id'] )}}">
          <h4>{{ $details['name'] }}</h4>
        </a>
        <h6>
          {{ $details['price'] }} AED
        </h6>
        <div class="addit-box">
          <div class="qty-box">
            <div class="input-group" data-id="{{ $id }}">
              <button class="qty-minus"></button>
              <input class="qty-adj form-control quantity update-cart" onkeyup="updateCart({{$details['id']}},this.value)" type="number" value="{{ $details['quantity'] }}" style=" width: 50px; ">
              <button class="qty-plus"></button>
            </tr>
            </div>
          </div>
          <div class="pro-add">
            <!-- <a href="javascript:void(0)" data-bs-toggle="modal" data-id="{{ $details['id'] }}" data-bs-target="#edit-product">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            </a> -->
            <a href="javascript:void(0)" onclick="removeFromCart({{ $details['id'] }})" data-id="{{ $details['id'] }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </li> 

   @endforeach
  </ul>
   @php $total = 0 @endphp
   @foreach((array) session('cart') as $id => $details)
   @php $total += $details['price'] * $details['quantity'] @endphp
   @endforeach

   <ul class="cart_total">
     <li>
       Total: <span>{{$total}} AED</span>
     </li>
     <li>
       Delivery fees  <span>{{config('appGlobal.delivery_fee')}} AED  </span>
     </li>
     <li>
       Taxes <span>  {{config('appGlobal.tax')}} AED</span>
     </li>
     <li>
       <div class="total">
        Total: {{$total + config('appGlobal.delivery_fee') +  config('appGlobal.tax')}}  AED  
       </div>
     </li>
     <li>
       <div class="buttons">
         <a href="{{ route('cart.list') }}" class="btn btn-solid btn-sm">view cart</a>
         <a href="{{ route('checkoutlist') }}" class="btn btn-solid btn-sm ">checkout</a>
       </div>
     </li>
   </ul>

    
