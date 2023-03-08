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
                        <h2>Search</h2>
                        <ul>
                            <li><a href="{{route('ecommerce')}}">Home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">Search</a></li>
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
              <div class="col-sm-3 collection-filter category-page-side">
                <!-- side-bar colleps block stat -->
                <div class="collection-filter-block creative-card creative-inner category-side">
                  <!-- Categories filter start -->
                  <form method="get" action="{{route('filter.list')}}">
                  <div class="collection-mobile-back">
                    <span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
    
                    <div class="collection-collapse-block open">
                      <h3 class="collapse-block-title mt-0">Categories</h3>
                      <div class="collection-collapse-block-content">
                        <div class="collection-brand-filter">
                          @foreach($Categories as $Category)
                          <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                            <input type="checkbox" class="custom-control-input form-check-input" name="Category[]" value="{{$Category->id}}">
                            <label class="custom-control-label form-check-label" for="{{$Category->name}}">{{$Category->name}}</label>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <hr/>
    
                     <!-- Sub Categories start here -->
                  <div class="collection-collapse-block open">
                    <h3 class="collapse-block-title mt-0">Sub Categories</h3>
                    <div class="collection-collapse-block-content">
                      <div class="collection-brand-filter">
                        @foreach($subCategories as $subCategory)
                        <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                          <input type="checkbox" class="custom-control-input form-check-input" name="subCategory[]" value="{{$subCategory->id}}">
                          <label class="custom-control-label form-check-label" for="{{$subCategory->name}}">{{$subCategory->name}}</label>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <hr/>
    
              <!--     size color start here -->
                   <!-- <div class="collection-collapse-block open">
                    <h3 class="collapse-block-title">Color</h3>
                    <div class="collection-collapse-block-content">
                      <div class="size-selector">
                        <div class="collection-brand-filter">
                          @foreach($Attribute_color as $Attribute_color)          
                          <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                            <input type="checkbox" class="custom-control-input form-check-input" name="Attribute_color[]" value="{{$Attribute_color->id}}">
                            <label class="custom-control-label form-check-label" for="{{$Attribute_color->name}}">{{$Attribute_color->name}}</label>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr/> -->
    
      
                  <!-- size filter start here -->
                  <!-- <div class="collection-collapse-block open">
                    <h3 class="collapse-block-title">size</h3>
                    <div class="collection-collapse-block-content">
                      <div class="size-selector">
                        <div class="collection-brand-filter">
                          @foreach($Attribute_size as $Attribute_size)                     
                          <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                            <input type="checkbox" class="custom-control-input form-check-input" name="Attribute_size[]" value="{{$Attribute_size->id}}">
                            <label class="custom-control-label form-check-label" for="{{$Attribute_size->name}}">{{$Attribute_size->name}}</label>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr/> -->
      
      
                  <!-- price filter start here -->
                  <div class="collection-collapse-block border-0 open">
                    <h3 class="collapse-block-title">Price</h3>
                    <div class="collection-collapse-block-content">
                      <div class="filter-slide">
                        <div class="sc-da70c56-0 dQEdDU">
                          <h4 class="text-center">Min</h3>
                          <input type="number" value="10" name="min" name="price_from" min="1" class="form-control">
                          <span class="between to">To</span>
                          <h4 class="text-center">Max</h3>
                          <input type="number" value="4862" name="max" min="2" name="price_to" max="100000" class="form-control">
                           </div>
    
                      </div>
                    </div>
                  </div>
                </div>
    
                <div>
                  <button type="submit" class="btn btn-primary">Sumbit</button>
                </div>
              </form>
                <!-- silde-bar colleps block end here -->
              </div>
              <div class="col-sm-9">
                <div class="top-banner-wrapper">
                   <div class="top-banner-content">
                    <h4>Search</h4>
                   </div>
                </div>
                <div class="collection-product-wrapper">
                  <div class="product-top-filter">
                    <div class="row">
                      <div class="col-xl-12">
                        <div class="filter-main-btn"><span class="filter-btn  "><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                      </div>
                    </div>
                    <div class="row">
                    </div>
                  </div>

                  <div class="product-wrapper-grid product" >
                    <div class="row" id="load-data">
                     
                    <div class="row">
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

    
    .fail(function(jqXHR,ajaxOptions,thrownError)
    {
      alert('server not reponding');
    });

}
var page = 1 ;
$(window).scroll(function()
{
  if($(window).scrollTop() + $(window).height() > 1312){
    page++;
    setTimeout(loadMoreData(page), 2000);
  }
});

</script>

@endsection