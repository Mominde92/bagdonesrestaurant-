@foreach($items as $item)
<div class="col-xl-4 col-md-4 col-12  col-grid-box">
  <div class="product-box">
    <div class="product-imgbox">
      <div class="product-front">
        <a href="{{route('product_details', $item->id)}}">
          <img src="{{ asset('uploads/items/' . $item->main_screen_image )}}" class="img-fluid img-responsive" alt="{{ $item->name}}">
        </a>
      </div>
      <div class="product-icon icon-inline">
        <div>
      
    </div>
  </div>

      <div class="product-icon icon-inline">
        <button  class="tooltip-top" data-tippy-content="Add to cart" onclick="addToCart({{$item->id}})" tabindex="0">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
        </button>
        <a href="{{ route('add.to.wishlist', $item->id) }}" class="add-to-wish tooltip-top" data-tippy-content="Add to Wishlist" tabindex="0">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
        </a>
      </div>
    </div>
    <div class="product-detail detail-inline " style="margin-left: 0px;"> 
      <div class="detail-title">
        <div class="detail-left"> 
          <div class="rating-star">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>                     
          <a href="{{route('product_details', $item->id)}}">
            <h6 class="price-title">
            @if(strlen($item->name) > 22)
            {{App::getLocale() == 'en' ? substr($item->name,0,22) : substr($item->name_locale,0,22) }}
            @else
            {{App::getLocale() == 'en' ? $item->name : $item->name_locale }}
    
             @endif
            </h6>
          </a>
        </div>
         @if($item->price != Null)
    <div class="detail-right">
    <div class="check-price">
      {{$item->price}} @lang('home.AED')
    </div>
    <div class="price">
      <div class="price">
        {{$item->new_price}} @lang('home.AED')
         </div>
       </div>
        <div>
         <p style="display:none"> {{$price = 100 - $item->new_price / $item->price * 100}} </p> 
       <p class="discount"> {{ (int) $price }} % </p>   
    </div>
  </div>
  @else
        <div class="detail-right">
          <div class="price">
            <div class="price">
              {{$item->new_price}} @lang('home.AED')
            </div>
          </div>
        </div>
  @endif
      </div>
    </div>
  </div>
</div>
@endforeach
 