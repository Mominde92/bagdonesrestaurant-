@php  for( $i = 0; $i<count($result); $i++ ){ @endphp

  @if($result[$i]['appearance'] == '103' || $result[$i]['appearance'] == '102' || $result[$i]['appearance'] == '101')
  <!--rounded category start-->
  <section class="rounded-category">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="slide-5 no-arrow">
              @foreach($result[$i]['Categories'] as $Category)
              <div>
              <div class="category-contain">
                <div class="img-wrapper">
                  <a href="{{route('categorypage', $Category->id)}}"> 
                    <img src="{{asset('uploads/category/' . $Category->image)}}" alt="{{$Category->name}}" class="img-fluid">
                  </a>
                </div>
                <a href="{{route('categorypage', $Category->id)}}" class="btn-rounded">
                  {{App::getLocale() == 'en' ? $Category->name : $Category->name_locale }}
                 
                </a>
              </div>
              </div>
              @endforeach
          
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--rounded category end-->
 
  @endif


  @if($result[$i]['appearance'] == '203')
  <div class="container-fluid" dir="ltr">
  <div class="title3 text-left">
    <h4><strong>{{$result[$i]['sub_category']['name']}} </strong> </h4>
     <a href="{{route('subcategory', $result[$i]['sub_category']['id'])}}" class="see_all" ><h4 class="d-inline text-right float-right see_all">
      <h4 class="d-inline text-right float-right see_all" style="color: rgb(45, 175, 50);font-weight: 600;
      text-transform: uppercase;border: 1px solid;background-color: rgb(255, 255, 255);padding: 8px 16px;transition: opacity 0.2s ease-in-out 0s;border-radius: 3px;">
       @lang('home.View All')
        </h4> </a>
  </div>

   <!-- Swiper -->
   <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      @foreach($result[$i]['items_store'] as $item_store_slider)
      @if($item_store_slider->price)
      <p style="display:none"> {{$price = 100 - $item_store_slider->new_price / $item_store_slider->price * 100}} </p> 
      @endif
      <div class="swiper-slide">
        <a href="{{route('product_details', $item_store_slider->id)}}">
      <div class="title">
        {{ (int) $price }} %
      </div>
      <div class="title-image">
        <img src="{{asset('uploads/stores/' . $item_store_slider->store_image )}}" class="img-fluid" />
      </div>
     
      @if($item_store_slider->slider_web != null)
      <img src="{{ asset('uploads/items/' . $item_store_slider->slider_web )}}" class="img-fluid img-thumbnail" alt="{{$item_store_slider->name}}"> 
       @else
      <img src="{{ asset('uploads/items/' . $item_store_slider->main_screen_image )}}" class="img-fluid img-thumbnail"  alt="{{$item_store_slider->name}}">
    @endif
  </div>
</a>
    @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</div>
</div>
  @endif
 


@if($result[$i]['appearance'] == '202')
<div class="container-fluid" dir="ltr">
<div class="title3 text-left">
  <h4><strong>{{$result[$i]['sub_category']['name']}}</strong>  </h4>
   <a href="{{route('subcategory', $result[$i]['sub_category']['id'])}}" ><h4 class="d-inline text-right float-right see_all">  
    
    <h4 class="d-inline text-right float-right see_all" style="color: rgb(45, 175, 50);font-weight: 600;
    text-transform: uppercase;border: 1px solid;background-color: rgb(255, 255, 255);padding: 8px 16px;transition: opacity 0.2s ease-in-out 0s;border-radius: 3px;">
    @lang('home.View All')
    </h4> </a>
     
</div>

<!-- slider tab  -->
<section class="section-py-space ratio_square product">

  <div>
    <div class="row">
      <div class="col pr-0">
        <div class="theme-tab product mb--5">
          <div class="tab-content-cls ">
            <div id="tab-1" class="tab-content active default" style="display: block;">
              <div class="product-slide-6 product-m no-arrow slick-slider">
                  @foreach($result[$i]['items'] as $item_store)
                  <div>
                    @if($item_store->price != Null)
                    <p style="display:none"> {{$price = 100 - $item_store->new_price / $item_store->price * 100}} </p> 
                    @endif
                  <div class="product-box">
                    <div class="product-imgbox">
                      <div class="product-front">
                        <a href="{{route('product_details', $item_store->id)}}" tabindex="-1">
                          <img src="{{ asset('uploads/items/' . $item_store->main_screen_image )}}" class="img-fluid img-responsive image-main-screen" alt="{{$item_store->name}}">
                        </a>
                      </div>

                         <div class="product-icon icon-inline">
                          <div>
                        <button class="tooltip-top" data-tippy-content="Add to cart" onclick="addToCart({{$item_store->id}})"  >
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        </button>
                      </div>
                     
                         <a href="{{ route('add.to.wishlist', $item_store->id) }}"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" >
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                        </a>
                      </div>
                    </div>

                    <div class="product-detail detail-inline ">
                      <div style="padding-top: 4px;">
                        <div>                       
                          <a href="{{route('product_details', $item_store->id)}}" > </a>
                            <h6 style="display: flex;">
                              <a href="{{route('product_details', $item_store->id)}}" style="display: block;margin-inline-end: 14px;">
                             <div class="new-label1" style=" background-color: #ffffff; ">
                              </div>
                              <img src="{{ asset('uploads/stores/' . $item_store->store_image)}}" class="img-fluid img-responsive image-stores" >
                              </a>
                            <div style="font-family: sans-serif;font-size: 15px;color: black;" class="">
                              <h6>{{$item_store->store_name}}</h6> 
                              <div>
                            @if(strlen($item_store->name) > 22)
                            {{substr($item_store->name,0,22)}} 
                            @else
                            {{ $item_store->name}}
                             @endif
                        </div>
                        </div>
                        </h6>
                         @if($item_store->price != Null)
                  <div>
                    <div>
                    <div class="price" style="margin-left: 3.5rem;">
                      <div class="price">
                        {{$item_store->new_price}} @lang('home.AED')
                         </div>
                       </div>
                        <div>
                    </div>
                  </div>
                  <div class="check-price" style="margin-left: 3.5rem;text-decoration: line-through;">
                    {{$item_store->price}} 
                  </div>
                  <div>
                    <p class="discount"> {{ (int) $price }} % </p>  
                  </div>
                </div>
                  @else
                   <div>
                    <div class="price" style="margin-left: 3.5rem;">
                      <div class="price">
                        {{$item_store->new_price}} @lang('home.AED')
                      </div>
                    </div>
                  </div>
                  @endif
                      </div>
                    </h6>
                    </div>
                  </div>
                  </div>
                </div>
              
                  @endforeach
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
</section>
<!-- slider tab end -->
@endif


@if($result[$i]['appearance'] == '201')
<div class="container-fluid" dir="ltr" style=" margin-top: 3rem; ">
<div class="title3 text-left d-inline">
  <h4 class="d-inline"><strong>{{$result[$i]['sub_category']['name']}}</strong>  </h4>
   <a href="{{route('subcategory', $result[$i]['sub_category']['id'])}}" class="obmpjp-2 bSggss" >
    <h4 class="d-inline text-right float-right see_all" style="color: rgb(45, 175, 50);font-weight: 600;
    text-transform: uppercase;border: 1px solid;background-color: rgb(255, 255, 255);padding: 8px 16px;transition: opacity 0.2s ease-in-out 0s;border-radius: 3px;">
     @lang('home.View All')
    </h4> </a>
    
</div>
 
 
<!-- slider tab  -->
<section class="section-py-space ratio_square product">

  <div>
    <div class="row">
      <div class="col pr-0">
        <div class="theme-tab product mb--5">
          <div class="tab-content-cls ">
            <div id="tab-1" class="tab-content active default">
              <div class="product-slide-6 product-m no-arrow">
                  @foreach($result[$i]['items'] as $item)
                  <div>
                  <div class="product-box">
                    <div class="product-imgbox">
                      <div class="product-front">
                        <a href="{{route('product_details', $item->id)}}">
                          <img src="{{ asset('uploads/items/' . $item->main_screen_image )}}" class="img-fluid img-responsive image-main-screen" alt="{{ $item->name}}">
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
                            {{substr($item->name,0,22)}} 
                            @else
                            {{ $item->name}}
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
</section>
<!-- slider tab end -->
@endif 

@if($result[$i]['appearance'] == '300')
<!--collection banner start-->
<div class="container">
<a href="{{route('product_details', $result[$i]['items']->id)}}">
  <section class="collection-banner section-pb-space ">
    <div class="custom-container">
      <div class="row">
        <div class="col">
          <div class="collection-banner-main banner-5 p-center">
            <div class="text-center">
              <img src="{{asset('uploads/items/' . $result[$i]['items']->cover_image)}}" class="img-fluid" style=" height: 300px;" alt="$result[$i]['items']->name">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</a>
  </section>
<!--collection banner end-->

@endif

@if($result[$i]['appearance'] == '204')
<!--collection banner start-->
<div class="container">
<a href="{{route('subcategory', $result[$i]['items']->sub_category_id)}}">
  <section class="collection-banner section-pb-space ">
    <div class="custom-container">
      <div class="row">
        <div class="col">
          <div class="collection-banner-main banner-5 p-center">
            <div class="text-center">
              <img src="{{asset('uploads/category/' . $result[$i]['items']->category_cover_image)}}" class="img-fluid" style=" height: 300px;" alt="$result[$i]['items']->name">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </a>
  </section>
<!--collection banner end-->
@endif
 
 
@php } @endphp




