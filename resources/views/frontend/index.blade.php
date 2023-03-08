{{-- Extends layout --}}
@extends('frontend.includes.default')


@section('styles')
<style>
 
.product-imgbox
{
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}
.product-detail
{
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
}
</style>

@endsection
{{-- Content --}}
@section('content')
<div class="container-fluid">
@include('frontend.homeappearances')
</div>
<div id="load-data"></div>
</div>


<div class="ajax-load text-center" style="display: none">
  <p><img src="{{ asset('media/loader.gif')}}"> </p>
</div>
@endsection

 

@section('scripts')

<script type="text/javascript">
  let pages = 2;
  let bool = false;
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

      lastPage = data;
          
      
      $('.ajax-load').hide();

       destroyCarousel(); // destroy slick slider first
        $('#load-data').append(data.html);
        applySlider(); // apply slick slider again
       })

    
    .fail(function(jqXHR,ajaxOptions,thrownError)
    {
      // alert('server not reponding');
    });

}


$(window).scroll(function (){
  let  height = $(document).height();
  if($(window).scrollTop() + $(window).height() + 2 >= $(document).height()) {
   
     $('.ajax-load').show();
     if(bool == false)
     {
      loadMoreData(pages);
      pages++;
     }
     
 
  }

  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $('.ajax-load').show();
      if(bool == false)
      {
      loadMoreData(pages);
      pages++;
      }
}

})


</script>

<script>
  function destroyCarousel() 
  {
    if ($('.product-slide-6').hasClass('slick-initialized')) {
        $('.product-slide-6').slick('unslick');
    }

    if ($('.slide-5').hasClass('slick-initialized')) {
        $('.slide-5').slick('unslick');
    }
    
  }


    function applySlider()
     {
         $('.product-slide-6').slick({
                 arrows: true,
                 slidesToShow: 1,
                  variableWidth: true,
                  centerPadding: '10px'
         });

         
$('.slide-5').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 8,
    centerPadding: '15px',
    responsive: [
      {
        breakpoint: 1470,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 4,
          infinite: true
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true
        }
      },
      {
        breakpoint: 820,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true
        }
      }
    ]
  });
        
  }
       $('document').ready(function(){
        destroyCarousel(); // destroy slick slider first
        applySlider(); // apply slick slider again

       });
    
</script>


@endsection