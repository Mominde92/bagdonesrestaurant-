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
                        <h2>Filter</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">Filter</a></li>
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
          @include('frontend.filter-nav-bar')
          <div class="collection-content col">
            <div class="page-main-content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="collection-product-wrapper">
                    <div class="product-top-filter">
                      <div class="row">
                        <div class="col-xl-12">
                          <div class="filter-main-btn"><span class="filter-btn  "><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="product-filter-content">
                            <div class="search-count">
                              <h5>Showing Products 1-24 of 10 Result</h5></div>
                            <div class="collection-view">
                              <ul>
                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                              </ul>
                            </div>
                            <div class="collection-grid-view">
                              <ul>
                                <li><img src="../assets/images/category/icon/2.png" alt="" class="product-2-layout-view"></li>
                                <li><img src="../assets/images/category/icon/3.png" alt="" class="product-3-layout-view"></li>
                                <li><img src="../assets/images/category/icon/4.png" alt="" class="product-4-layout-view"></li>
                                <li><img src="../assets/images/category/icon/6.png" alt="" class="product-6-layout-view"></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="product-wrapper-grid product">
                      <div class="row">
                        @include('frontend.paginateitem')    
                      </div>                   
                      <div id="load-data">
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
  <div class="ajax-load text-center" style="display: none">
    <p><img src="{{ asset('media/loader.gif')}}"> Loding More Item</p>
  </div>
    @endsection

    
@section('scripts')

<script type="text/javascript">
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
          $('.ajax-load').html("No more data");
          return;
        }
          $('#load-data').append(data.html);
         })
  }
  var page = 1 ;
  $(window).scroll(function()
  {
    // if($(window).scrollTop() + $(window).height() > 1312){
    //   page++;
    //   setTimeout(loadMoreData(page), 2000);
    // }
  });
  
  </script>

@endsection
 