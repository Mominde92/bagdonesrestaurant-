{{-- Extends layout --}}
@extends('frontend.includes.default')

@section('styles')
<style>
 .price-title
 {
  font-size: 18px !important;
  font-weight: bold;
  color: #000;
  text-align: center;
  padding-top: 20px;
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
                        <h2> {{App::getLocale() == 'en' ? $category->name : $category->name_locale }}
                          </h2>
                        <ul>
                            <li><a href="{{route('ecommerce')}}">@lang('category.Home')</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)"> {{App::getLocale() == 'en' ? $category->name : $category->name_locale }}
                              
                             </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
<section class="section-big-pt-space ratio_asos b-g-light">
  <div class="collection-wrapper">
    <div class="custom-container">
      <div class="row">
      
        <div class="collection-content col">
          <div class="page-main-content">
            <div class="row">
              @include('frontend.filter-nav-bar')

              <div class="col-sm-9">
                
                <div class="collection-product-wrapper">
                  <div class="product-top-filter">
                    <div class="row">
                      @foreach($category->get_childern as $child)
                      <div class="col-xl-3 col-md-3 col-6  col-grid-box">
                        <div class="">
                          <div class="product-imgbox">
                            <div class="product-front">
                              <a href="{{route('subcategory', $child->id)}}"> </a> 
                            </div>
                          </div>
                          <div class="product-detail detail-center detail-inverse">
                            <div class="detail-title">
                              <div class="detail-left">               
                                <a href="{{route('subcategory', $child->id)}}">
                                  <h6 class="price-title">
                                   @if(strlen($child->name) > 22)
                                   {{App::getLocale() == 'en' ? substr($child->name,0,22) : substr($child->name_locale,0,22) }}                                     
                                  @else
                                  {{App::getLocale() == 'en' ? $child->name : $child->name_locale }}                                    
                                  @endif
                                  </h6> </a>
                              </div></div>
                            <div class="icon-detail"> </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    
                      <div class="col-xl-12">
                        <div class="filter-main-btn"><span class="filter-btn  "><i class="fa fa-filter" aria-hidden="true"></i> @lang('category.Filter')</span></div>
                      </div>
                    </div>
                    <div class="row">
                    </div>
                  </div>
                  <div class="top-banner-wrapper">
                 <div class="top-banner-content">
                 </div>
                 </div>
                  <div class="product-wrapper-grid product" >
                    <div class="row" id="load-data">
                 
                    @foreach($category->get_childern as $get_child)
                    @foreach($get_child->items as $item)
                    <div class="col-xl-4 col-md-4 col-12  col-grid-box infinite-scroll">
                      <div class="product-box">
                        <div class="product-imgbox">
                          <div class="product-front">
                            <a href="{{ route('product_details', $item->id) }}"> <img src="{{ asset('uploads/items/' . $item->main_screen_image )}}" style=" height: 250px;" class="img-fluid  " alt="product"> </a>
                          </div>
                        </div>
                        <div class="product-detail detail-center detail-inverse">
                          <div class="detail-title">
                            <div class="detail-left">
                               <a href="{{ route('product_details', $item->id) }}">
                                <h6 class="price-title">
                                  @if(strlen($item->name) > 22)
                                  {{App::getLocale() == 'en' ? substr($item->name,0,22) : substr($item->name_locale,0,22) }}                                   
                                  @else
                                  {{App::getLocale() == 'en' ? $item->name : $item->name_locale }}                                    
                                  @endif
                                </h6> </a>
                            </div>
                            @if($item->price != Null)
                            <div class="detail-right" style="display: flex;">
                            <div class="check-price"> {{$item->price}} @lang('category.AED')</div>
                            <div class="price">
                              <div class="price"> {{$item->new_price}} @lang('category.AED') </div>
                               </div>
                                <div>
                                 <p style="display:none"> {{$price = 100 - $item->new_price / $item->price * 100}} </p> 
                               <p style=" background-color: red; width: 3rem; text-align: center;float: right;color:white "> {{ (int) $price }} % </p> <br/>   
                            </div>
                          </div>
                          @else
                                <div class="detail-right"><br/>
                                  <div class="price">
                                    <div class="price">
                                      {{$item->new_price}} @lang('category.AED')
                                    </div>
                                  </div>
                                </div>
                          @endif
                          </div>
                          <div class="icon-detail">    
                              <button class="tooltip-top" onclick="addToCart({{$item->id}})" data-tippy-content="Add to cart" >
                                <i  data-feather="shopping-cart"></i>
                              </button>

                             <a href="{{ route('add.to.wishlist', $item->id) }}"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" >
                                <i  data-feather="heart"></i>
                              </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @endforeach

                    <div class="row" id="data-container"></div>
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

<script>
  $(document).ready(function() {
    // Listen for changes to the filters form
    $('#filters-form').change(function() {
      // Get the filters from the form
      var filters = $(this).serialize();

      // Send the AJAX request
      $.ajax({
        url: '{{route("filterAjax")}}', // Controller method that handles the request
        type: 'GET',
        data: filters,
        success: function(data) {
          $('.ajax-load').hide();
          bool = true ;
          $('.col-grid-box').empty();
          $('#data-container').empty().html(data.html);
          
        }
      });
    });
  });
</script>

@endsection