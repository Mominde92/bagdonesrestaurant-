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
                        <h2>{{App::getLocale() == 'en' ? $category->name : $category->name_locale }}</h2>
                        <ul>
                            <li><a href="{{route('ecommerce')}}">@lang('subcategory.home')</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="{{route('category', $category->get_parent->id)}}">
                              {{App::getLocale() == 'en' ? $category->get_parent->name : $category->get_parent->name_locale }}
                            </a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#"> {{App::getLocale() == 'en' ? $category->name : $category->name_locale }}
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
                <div class="top-banner-wrapper">
                   <div class="top-banner-content">
                    
                   
                   </div>
                </div>
                <div class="collection-product-wrapper">
                  <div class="product-top-filter">
                    <div class="row">
                      <div class="col-xl-12">
                        <div class="filter-main-btn"><span class="filter-btn  "><i class="fa fa-filter" aria-hidden="true"></i> @lang('subcategory.Filter')</span></div>
                      </div>
                    </div>
                    <div class="row">
                    </div>
                  </div>

                  <div class="product-wrapper-grid product" >
                    
                    <div class="row" id="load-data">
                      @foreach($category->get_parent->get_childern as $child)
                      <div class="col-xl-3 col-md-3 col-6  col-grid-box">
                        <div class="">
                          <div class="product-imgbox">
                            <div class="product-front">
                              <a href="{{route('subcategory', $child->id)}}"> 
                              </a> 
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
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    <h3 class="text-3xl text-bold" style=" color: #333333; font-weight: 700; font-size: 24px; margin-bottom: 2rem; ">
                      {{App::getLocale() == 'en' ? $category->name : $category->name_locale }}
                       </h3>
                      @foreach($category->get_childern as $child)
                      <div class="col-xl-3 col-md-3 col-6  col-grid-box">
                        <div class="">
                          <div class="product-imgbox">
                            <div class="product-front">
                              <a href="{{route('subcategory', $child->id)}}"> 
                              </a> 
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
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    <div class="row" id="data-container">
                    @include('frontend.paginateitem')
                  </div>
                  <div id="load-data"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="ajax-load text-center" style="display: none">
  <p><img src="{{ asset('media/loader.gif')}}"></p>
</div>
@endsection


@section('scripts')

<script type="text/javascript">
    let bool = false;
    let pages = 2;
function loadMoreData(page)
{
  $.ajax({
    url:'?page=' + page,
    type:'get',
    beforeSend:function()
    {
      $('.ajax-load').show();
    }
    
  })
    .done(function(data){

      if(data.html == "")
      {
        $('.ajax-load').html("");
        bool = true;
        return;
      }
        $('#load-data').append(data.html);
       })

    
    .fail(function(jqXHR,ajaxOptions,thrownError)
    {
      alert('server not reponding');
    });

}
 
$(window).scroll(function()
{
  let  height = $(document).height();
  if($(window).scrollTop() + $(window).height() + 200 >= $(document).height()) {
    if(bool == false)
     {
      loadMoreData(pages);
      pages++;
     }
  }
});


function filter(id)
{
  // alert(id);
}
</script>

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