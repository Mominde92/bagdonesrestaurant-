<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(app()->getLocale() == 'ar') dir="rtl" @endif>
    <head>
        <meta charset="utf-8"/>

        {{-- Title Section --}}
        <title>{{ config('app.name') }} | @lang('home.Ecommerce')</title>

        {{-- Meta Data --}}
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

        {{-- Favicon --}}
        <!-- <link rel="icon" type="image/png" sizes="16x16" href="{{asset('media/logos/favicon-16x16.png')}}"> -->

        <!--Google font-->
        <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

        <!--icon css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/font-awesome.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/themify.css') }}">

        <!--Slick slider css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/slick-theme.css') }}">

        <!--Animate css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/animate.css') }}">
        <!-- Bootstrap css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.css') }}">

        <!-- Theme css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/color2.css') }}" media="screen" id="color">

       <p style="display: none;"> {{$lang = App::getLocale() ;}} </p>

        @if($lang == 'en')
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">
        @elseif($lang == 'ar')
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style_ar.css') }}">
        @endif

        <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

        <script src="{{ asset('frontend/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>

        <style>
        .top-header
        {
          background-color: #85DB21;
        }
        .category-header-2
         {
        background-color: #85DB21;
        position: relative;
         }
         .top-header .top-header-left .shpping-order h6 {
         font-family: "Raleway", sans-serif, "PT Sans", sans-serif;
         color: #404553;
         text-transform: capitalize;
         font-size: 13px;
         }
         .category-header-2 .navbar-menu .menu-block .pixelstrap .dark-menu-item .top-header .top-header-left .app-link ul li a i
          {
          color: #404553;
          }
          .category-header-2 .navbar-menu .icon-block ul li .cart-item {
          display: inline-block;
          font-weight: 700;
          text-transform: uppercase;
          font-family: "PT Sans", sans-serif;
          letter-spacing: 0.5px;
          color: #404553;
          margin-left: 10px;
          }
          .top-header .top-header-right .language-block .language-dropdown .language-dropdown-click
          {
          color: #404553;
          font-family: "Raleway", sans-serif, "PT Sans", sans-serif;
          font-size: 13px;
          font-weight: 800;
          text-transform: capitalize;
          }
          .top-header .top-header-right .language-block .curroncy-dropdown .curroncy-dropdown-click {
            color: #404553;
          font-family: "Raleway", sans-serif, "PT Sans", sans-serif;
          font-size: 13px;
          font-weight: 800;
          text-transform: capitalize;
        }
        .category-header-2 .navbar-menu .nav-block .nav-left .navbar {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            background-color: #6cd47f;
            padding: 28px 0;
            cursor: pointer;
        }
        .text-white
        {
          color: #ffffff !important;
        }
          .category-header-2 .navbar-menu .icon-block ul li .cart-item
          {
            color: #ffffff;
          }
          .top-header .top-header-right .language-block .language-dropdown .language-dropdown-click
          {
            color: #ffffff;
          }
          .top-header .top-header-right .language-block .curroncy-dropdown .curroncy-dropdown-click
          {
            color: #ffffff;
          }
          .top-header .top-header-left .app-link h6
          {
            color: #404553 !important;
          }

          .category-header-2 .navbar-menu .icon-block ul li svg
          {
            fill: #404553 !important;
          }
          .category-header-2 .navbar-menu .category-right .gift-block
          {
            background-color: #6cd47f;
          }
          .category-header-2 .navbar-menu .category-right .gift-block
          {
            color: #404553 !important;
          }
          .top-header .top-header-left .app-link ul li a i
          {
            color: #404553 !important;
          }
          .item-count .item-count-contain
          {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #fed762;
            color: #404553;
            font-size: 12px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
          }
          .category-header-2 .navbar-menu .nav-block .nav-left .navbar-toggler
          {
            width: 17px;
            height: 17px;
            padding: 0;
            background-color: #fed762;
            color: #404553;
            border-radius: 50%;
            font-size: 12px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
              }
              .layout-header2
              {
                padding-top: 10px;
               padding-bottom: 10px;
              }
              .input-box
              {
                margin: 0px -15px;
              }
              .product .product-box .product-imgbox .product-icon button:hover .product .product-box .product-imgbox .product-icon button
        {
          background-color: #fed762;
          color: #404553;
        }
        .product .product-box .product-imgbox .product-icon a:hover .product .product-box .product-imgbox .product-icon button
        {
          background-color: #fed762;
          color: #404553;
        }
        .product .product-box .product-imgbox .product-icon button
        {
          /* background-color: #fed762; */
        }
        path
        {
          color: #404553;
        }

        .add_to_cart .cart-inner .cart_top h3 {
    font-size: 18px;
    color: #1e9a05;
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 0;
}

.add_to_cart .cart-inner .cart_media ul.cart_product li .media .media-body h6 {
    color: #1e9a05;
    font-weight: 700;
    margin-bottom: 5px;
}
.add_to_cart .cart-inner .cart_top .close-cart i {
    color: #1e9a05;
    font-size: 18px;
}
.add_to_cart .cart-inner .cart_media ul.cart_total {
    background-color: rgba(30, 154, 5, 0.05);
    padding: 15px;
}
.add_to_cart .cart-inner .cart_top {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    padding: 20px;
    margin-bottom: 20px;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background-color: rgba(30, 154, 5, 0.05);
}


           .btn-solid , .btn
           {
            background-color: #1e9a05;
           }
           .tab-product .nav-material.nav-tabs .nav-link.active, .product-full-tab .nav-material.nav-tabs .nav-link.active
           {
            color: #1e9a05;
           }
           .product-right .pro-group ul.delivery-services li svg
           {
            fill: #1e9a05;
           }
           .btn-normal:hover
           {
            background-color: #1e9a05;
           }
           .main-menu ul>li>a:hover, .main-menu ul>li>a.active
            {
            background: #008747;
            }
            .product .product-box .product-imgbox .product-icon button:hover
            {
              background-color: #fed762;
            }
            .product .product-box .product-imgbox .product-icon a:hover
            {
              background-color: #fed762;
            }
            .category-header-2 .navbar-menu .nav-block .nav-left .navbar
            {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            background-color: #85DB21;
            padding: 28px 0;
            cursor: pointer;
            }
            .category-header-2 .navbar-menu .category-right .gift-block
            {
              background-color: #85DB21;
            }
            .FluLI {
            padding-right: 15px;
            transition: all 0.25s ease-in-out 0s;
            }

          .FluLI {
              padding-right: 15px;
              transition: all 0.25s ease-in-out 0s;
          }
          .kbYuBX {
    position: relative;
}
.kbYuBX .trigger {
    display: flex;
    flex-direction: row;
    -webkit-box-align: center;
    align-items: center;
    transition: opacity 0.2s ease-in-out 0s;
}
button {
    background-color: transparent;
    cursor: pointer;
}
.pixelstrap a, .pixelstrap a:hover, .pixelstrap a:active
{
  padding-right: 5px;
}
.pixelstrap li
{
  padding-right: 2rem;
    padding-left: 2rem;
}
.category-header-2 .navbar-menu .category-right .gift-block
{
  width: 200px;
}
.top-header .top-header-left .app-link h6 {
    color: #fff !important;
}
.top-header .top-header-left .app-link ul li a i {
    color: #ffffff !important;
}

.add_to_cart .cart-inner .cart_media ul.cart_product li .media .media-body h4
{
    color: #444444;
    text-transform: capitalize;
    margin-bottom: 5px;
}
.account-bar .theme-form h5 {
    color: #1e9a05;
    text-transform: capitalize;
}
.account-bar .theme-form h6 span {
    color: #1e9a05;
    margin-left: 10px;
}
.product-right .pro-group .revieu-box a {
    color: #1e9a05;
}
.product-title i {
    color: #1e9a05;
    margin-right: 5px;
}
.product-offer .offer-contain ul li .code-lable {
    color: #1e9a05;
    background-color: rgba(30, 154, 5, 0.08);
    border: 1px dashed #1e9a05;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
    padding: 3px 10px;
    text-transform: uppercase;
    border-radius: 5px;
    margin-right: 10px;
    font-size: calc(12px + (14 - 12) * ((100vw - 320px) / (1920 - 320)));
    -webkit-animation: headShake 2s ease-in-out infinite;
    animation: headShake 2s ease-in-out infinite;
}
.product-right .pro-group ul.delivery-services li svg {
    width: calc(30px + (35 - 30) * ((100vw - 320px) / (1920 - 320)));
    fill: #1e9a05;
    margin-right: 10px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 5px;
}
.product-offer .offer-contain .show-offer {
    color: #1e9a05;
    text-transform: capitalize;
    margin-top: 10px;
    font-size: 14px;
    cursor: pointer;
}
.collection-filter-block .product-service .media svg path {
    fill: #1e9a05;
}
.media-banner .media-banner-box .media .media-body .media-contant .product-detail h6 {
    color: #1e9a05;
    font-weight: 700;
    margin-top: 3px;
}
.product .product-box .product-detail .detail-title .detail-left .price-title {
    text-transform: capitalize;
    color: #444444;
    font-weight: 700;
    font-size: calc(14px + (16 - 14) * ((100vw - 320px) / (1920 - 320)));
}
a {
  color: #1e9a05;
}
.tab-product .nav-material.nav-tabs .nav-link.active, .product-full-tab .nav-material.nav-tabs .nav-link.active {
    color: #1e9a05;
}
.tab-product .nav-material.nav-tabs .nav-item .material-border, .product-full-tab .nav-material.nav-tabs .nav-item .material-border
{
  border-bottom: 2px solid #1e9a05;
}
.tap-top svg
{
  fill: #1e9a05;
}
.category-header-2 .navbar-menu .icon-block ul li svg {
    fill: #ffffff !important;
}

@media (max-width: 1199px)
{
.layout-header2
{
    padding-top: 10px;
    padding-bottom: 30px;
}
}

          </style>
         <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
        {{-- Includable CSS --}}
        @yield('styles')
    </head>

    <body style="background-color: #f3f9f2 !important;">
      <!-- loader start -->
      <div class="loader-wrapper">
        <div>
          <img src="{{asset('frontend/assets/images/loader.gif')}}" alt="loader">
        </div>
      </div>
     <!-- loader end -->

     
      <div class="mobile-fix-option"></div>
      <div class="top-header">
        <div class="custom-container">
          <div class="row">
            <div class="col-xl-5 col-md-7 col-sm-6">
              <div class="top-header-left">
                <div class="shpping-order">
                </div>
                <div class="app-link">
                  <h6>
                    @lang('home.Download App')
                  </h6>
                  <ul>
                    <li><a href="https://play.google.com/store/apps/details?id=com.b_e_c_approtunity.bv" target="_blank"><i class="fa fa-android"></i></a></li>
                    <li><a><i class="fa fa-apple"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-7 col-md-5 col-sm-6">
              <div class="top-header-right">
                <div class="top-menu-block"> </div>
                <div class="language-block">
                  <div class="language-dropdown">
                      <span class="language-dropdown-click" style="cursor: pointer;">
                        English <i class="fa fa-angle-down" aria-hidden="true"></i>
                      </span>
                    <ul class="language-dropdown-open" style="display: none;">
                      <li><a href="{{ route('changeLang')}}?lang=en">English</a></li>
                      <li><a href="{{ route('changeLang')}}?lang=ar">العربية</a></li>
                    </ul>
                  </div>
                  <div class="curroncy-dropdown">
                      <span class="curroncy-dropdown-click">
                        @lang('home.AED')
                      </span>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="layout-header2">
        <div class="container">
          <div class="col-md-12">
            <div class="main-menu-block">
              <div class="header-left">
                <div class="sm-nav-block">
                    <span class="sm-nav-btn">
                      <i class="fa fa-bars"></i>
                    </span>
                  <ul class="nav-slide">
                    <li>
                      <div class="nav-sm-back">
                        @lang('home.back') <i class="fa fa-angle-right ps-2"></i>
                      </div>
                    </li>

                  

                    @foreach($Categories as $Category)
                    <li> <a href="{{route('categorypage',$Category->id)}}">
                      {{App::getLocale() == 'en' ? $Category->name : $Category->name_locale }} </a></li>
                    @endforeach
                  </ul>
                </div>
                <div class="brand-logo logo-sm-center">
                  <a href="{{route('ecommerce')}}">
                    <img src="{{asset('media/logos/bagdones_logo.svg')}}" class="img-fluid image-logo" alt="logo">
                  </a>

                  <a href="{{route('ecommerce')}}">
                    <img src="{{asset('media/logos/bagdones_logo_mobile.svg')}}" class="img-fluid image-mobile" alt="logo">
                  </a>

                  <div class="deliver col-4">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#googlemaps">
                    <img src="{{asset('media/logos/uae_flag.svg')}}" alt="country-ae" class="img-fluid" style="height: 20px;">
                    <span class="addressContainer"><span data-qa="locationSelector" class="locationSelector"> @lang('home.Deliver to') <i class="fa fa-caret-down" aria-hidden="true"></i>&nbsp; &nbsp;
                    </span>
                      <div class="defaultAddress"><span class="Address">{{substr(Session::get('address'),0,20)}}</span></div></span>
                    </a>
                    </div>

                </div>
              </div>

              <div>

              </div>
              <div class="input-block">
                <div class="input-box">
                  <form class="big-deal-form " action="{{route('search')}}">
                    @csrf
                    <div class="input-group ">
                      <div class="input-group-text">
                        <span class="search"><i class="fa fa-search"></i></span>
                      </div>
                      <input type="search" name="search" class="form-control" placeholder="@lang('home.Search a Product')">

                    </div>
                  </form>
                </div>
              </div>
              <div class="header-right">
                <div class="icon-block">
                  <ul>
                    <li class="mobile-search">
                      <a href="javascript:void(0)">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612.01 612.01" style="enable-background:new 0 0 612.01 612.01;" xml:space="preserve">
                          <g>
                            <g>
                              <g>
                                <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0
                                  C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586
                                  l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8
                                  c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407
                                  S377.82,467.8,257.493,467.8z"></path>
                              </g>
                            </g>
                          </g>
                          </svg>
                      </a>
                    </li>
                    <li class="mobile-user " onclick="openAccount()">
                      <a href="javascript:void(0)">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z M256,240
                                  c-57.897,0-105-47.103-105-105c0-57.897,47.103-105,105-105c57.897,0,105,47.103,105,105C361,192.897,313.897,240,256,240z"></path>
                              </g>
                            </g>
                          <g>
                              <g>
                                <path d="M297.833,301h-83.667C144.964,301,76.669,332.951,31,401.458V512h450V401.458C435.397,333.05,367.121,301,297.833,301z
                                   M451.001,482H451H61v-71.363C96.031,360.683,152.952,331,214.167,331h83.667c61.215,0,118.135,29.683,153.167,79.637V482z"></path>
                              </g>
                            </g>
                          </svg>
                      </a>
                    </li>
                    <li class="mobile-setting">
                      <a href="javascript:void(0)">

                          <path d="m272.066 512h-32.133c-25.989 0-47.134-21.144-47.134-47.133v-10.871c-11.049-3.53-21.784-7.986-32.097-13.323l-7.704 7.704c-18.659 18.682-48.548 18.134-66.665-.007l-22.711-22.71c-18.149-18.129-18.671-48.008.006-66.665l7.698-7.698c-5.337-10.313-9.792-21.046-13.323-32.097h-10.87c-25.988 0-47.133-21.144-47.133-47.133v-32.134c0-25.989 21.145-47.133 47.134-47.133h10.87c3.531-11.05 7.986-21.784 13.323-32.097l-7.704-7.703c-18.666-18.646-18.151-48.528.006-66.665l22.713-22.712c18.159-18.184 48.041-18.638 66.664.006l7.697 7.697c10.313-5.336 21.048-9.792 32.097-13.323v-10.87c0-25.989 21.144-47.133 47.134-47.133h32.133c25.989 0 47.133 21.144 47.133 47.133v10.871c11.049 3.53 21.784 7.986 32.097 13.323l7.704-7.704c18.659-18.682 48.548-18.134 66.665.007l22.711 22.71c18.149 18.129 18.671 48.008-.006 66.665l-7.698 7.698c5.337 10.313 9.792 21.046 13.323 32.097h10.87c25.989 0 47.134 21.144 47.134 47.133v32.134c0 25.989-21.145 47.133-47.134 47.133h-10.87c-3.531 11.05-7.986 21.784-13.323 32.097l7.704 7.704c18.666 18.646 18.151 48.528-.006 66.665l-22.713 22.712c-18.159 18.184-48.041 18.638-66.664-.006l-7.697-7.697c-10.313 5.336-21.048 9.792-32.097 13.323v10.871c0 25.987-21.144 47.131-47.134 47.131zm-106.349-102.83c14.327 8.473 29.747 14.874 45.831 19.025 6.624 1.709 11.252 7.683 11.252 14.524v22.148c0 9.447 7.687 17.133 17.134 17.133h32.133c9.447 0 17.134-7.686 17.134-17.133v-22.148c0-6.841 4.628-12.815 11.252-14.524 16.084-4.151 31.504-10.552 45.831-19.025 5.895-3.486 13.4-2.538 18.243 2.305l15.688 15.689c6.764 6.772 17.626 6.615 24.224.007l22.727-22.726c6.582-6.574 6.802-17.438.006-24.225l-15.695-15.695c-4.842-4.842-5.79-12.348-2.305-18.242 8.473-14.326 14.873-29.746 19.024-45.831 1.71-6.624 7.684-11.251 14.524-11.251h22.147c9.447 0 17.134-7.686 17.134-17.133v-32.134c0-9.447-7.687-17.133-17.134-17.133h-22.147c-6.841 0-12.814-4.628-14.524-11.251-4.151-16.085-10.552-31.505-19.024-45.831-3.485-5.894-2.537-13.4 2.305-18.242l15.689-15.689c6.782-6.774 6.605-17.634.006-24.225l-22.725-22.725c-6.587-6.596-17.451-6.789-24.225-.006l-15.694 15.695c-4.842 4.843-12.35 5.791-18.243 2.305-14.327-8.473-29.747-14.874-45.831-19.025-6.624-1.709-11.252-7.683-11.252-14.524v-22.15c0-9.447-7.687-17.133-17.134-17.133h-32.133c-9.447 0-17.134 7.686-17.134 17.133v22.148c0 6.841-4.628 12.815-11.252 14.524-16.084 4.151-31.504 10.552-45.831 19.025-5.896 3.485-13.401 2.537-18.243-2.305l-15.688-15.689c-6.764-6.772-17.627-6.615-24.224-.007l-22.727 22.726c-6.582 6.574-6.802 17.437-.006 24.225l15.695 15.695c4.842 4.842 5.79 12.348 2.305 18.242-8.473 14.326-14.873 29.746-19.024 45.831-1.71 6.624-7.684 11.251-14.524 11.251h-22.148c-9.447.001-17.134 7.687-17.134 17.134v32.134c0 9.447 7.687 17.133 17.134 17.133h22.147c6.841 0 12.814 4.628 14.524 11.251 4.151 16.085 10.552 31.505 19.024 45.831 3.485 5.894 2.537 13.4-2.305 18.242l-15.689 15.689c-6.782 6.774-6.605 17.634-.006 24.225l22.725 22.725c6.587 6.596 17.451 6.789 24.225.006l15.694-15.695c3.568-3.567 10.991-6.594 18.244-2.304z"></path>
                          <path d="m256 367.4c-61.427 0-111.4-49.974-111.4-111.4s49.973-111.4 111.4-111.4 111.4 49.974 111.4 111.4-49.973 111.4-111.4 111.4zm0-192.8c-44.885 0-81.4 36.516-81.4 81.4s36.516 81.4 81.4 81.4 81.4-36.516 81.4-81.4-36.515-81.4-81.4-81.4z"></path></svg>
                      </a>
                    </li>
                    @php $quantitywishlist = 0 @endphp
                      @foreach((array) session('wishlist') as $id => $details)
                      @php $quantitywishlist += $details['quantity'] @endphp
                      @endforeach


                    <li class="mobile-wishlist item-count"  onclick="openWishlist()">
                      <a href="javascript:void(0)">
                        <svg viewBox="0 -28 512.001 512" xmlns="http://www.w3.org/2000/svg"><path d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0"></path></svg>
                        <div class="item-count-contain">
                          @if(session('wishlist')){{$quantitywishlist}}@else 0 @endif
                        </div>
                      </a>
                    </li>
                    <li class="mobile-cart item-count" onclick="openCart()">
                      <a href="javascript:void(0)">
                        <div class="cart-block">
                          <div class="cart-icon">
                            <!-- <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m497 401.667c-415.684 0-397.149.077-397.175-.139-4.556-36.483-4.373-34.149-4.076-34.193 199.47-1.037-277.492.065 368.071.065 26.896 0 47.18-20.377 47.18-47.4v-203.25c0-19.7-16.025-35.755-35.725-35.79l-124.179-.214v-31.746c0-17.645-14.355-32-32-32h-29.972c-17.64 0-31.99 14.351-31.99 31.99v31.594l-133.21-.232-9.985-54.992c-2.667-14.694-15.443-25.36-30.378-25.36h-68.561c-8.284 0-15 6.716-15 15s6.716 15 15 15c72.595 0 69.219-.399 69.422.719 16.275 89.632 5.917 26.988 49.58 306.416l-38.389.2c-18.027.069-32.06 15.893-29.81 33.899l4.252 34.016c1.883 15.06 14.748 26.417 29.925 26.417h26.62c-18.8 36.504 7.827 80.333 49.067 80.333 41.221 0 67.876-43.813 49.067-80.333h142.866c-18.801 36.504 7.827 80.333 49.067 80.333 41.22 0 67.875-43.811 49.066-80.333h31.267c8.284 0 15-6.716 15-15s-6.716-15-15-15zm-209.865-352.677c0-1.097.893-1.99 1.99-1.99h29.972c1.103 0 2 .897 2 2v111c0 8.284 6.716 15 15 15h22.276l-46.75 46.779c-4.149 4.151-10.866 4.151-15.015 0l-46.751-46.779h22.277c8.284 0 15-6.716 15-15v-111.01zm-30 61.594v34.416h-25.039c-20.126 0-30.252 24.394-16.014 38.644l59.308 59.342c15.874 15.883 41.576 15.885 57.452 0l59.307-59.342c14.229-14.237 4.13-38.644-16.013-38.644h-25.039v-34.254l124.127.214c3.186.005 5.776 2.603 5.776 5.79v203.25c0 10.407-6.904 17.4-17.18 17.4h-299.412l-35.477-227.039zm-56.302 346.249c0 13.877-11.29 25.167-25.167 25.167s-25.166-11.29-25.166-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167zm241 0c0 13.877-11.289 25.167-25.166 25.167s-25.167-11.29-25.167-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167z"></path></g></svg>
                             -->
                             <img src="https://z.nooncdn.com/s/app/com/noon/icons/cart.svg">
                          </div>
                          <div class="cart-item">
                            <h5>@lang('home.shopping')</h5>
                            <h5>@lang('home.cart')</h5>
                          </div>
                        </div>
                      </a>
                      @php $quantity = 0 @endphp
                      @foreach((array) session('cart') as $id => $details)
                      @php $quantity += $details['quantity'] @endphp
                      @endforeach

                      <div class="item-count-contain data-count" data-id=" @if(session('cart')){{$quantity}}@else 0 @endif" >
                        @if(session('cart')){{$quantity}}@else 0 @endif
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="menu-nav">
                    <span class="toggle-nav">
                      <i class="fa fa-bars "></i>
                    </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <form action="{{route('search')}}">
          @csrf
        <div class="searchbar-input">
          <div class="input-group">
            <span class="input-group-text">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932" style="enable-background:new 0 0 28.931 28.932;" xml:space="preserve"><g><path d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z"></path></g></svg>
            </span>

            <input type="text" class="form-control" placeholder="@lang('home.search your product')">
            <input type="submit" hidden>
            <span class="input-group-text close-searchbar">
              <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg"><path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"></path></svg>
            </span>

          </div>
        </div>
      </div>
    </form>
      <div class="category-header-2">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="navbar-menu">
                <div class="logo-block">
                  <div class="brand-logo logo-sm-center">
                    <a href="{{route('ecommerce')}}">
                      <img src="{{asset('media/logos/bagdones_logo.svg')}}" class="img-fluid image-logo" alt="logo">
                    </a>
                  </div>
                </div>
                <div class="nav-block">

                  <div class="nav-left">

                    <nav class="navbar" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent">
                      <button class="navbar-toggler" type="button">
                        <span class="navbar-icon"><i class="fa fa-arrow-down"></i></span>
                      </button>
                      <h5 class="mb-0  text-white title-font">@lang('home.Shop by Category')</h5>
                    </nav>
                    <div class="collapse  nav-desk" id="navbarToggleExternalContent">
                      <ul class="nav-cat title-font">
                        
                        @foreach($Categories as $Category)
                        <li> <a href="{{route('categorypage',$Category->id)}}"><img src="{{asset('uploads/category/'.$Category->image)}}" style=" height: 60px;" alt="category-product">
                          {{App::getLocale() == 'en' ? $Category->name : $Category->name_locale }} </a></li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="menu-block">
                  <nav id="main-nav">
                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                    <ul id="main-menu" class="sm pixelstrap sm-horizontal" data-smartmenus-id="16721592949426582">
                      <li>
                        <div class="mobile-back text-right">@lang('home.Back')<i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                      </li>

                      @foreach($subCategories as $subCategory)
                      <li>
                        <a class="dark-menu-item has-submenu" href="{{route('subcategory',$subCategory->id)}}" id="sm-16721592949426582-1" aria-haspopup="true" aria-controls="sm-16721592949426582-2" aria-expanded="false">
                          {{App::getLocale() == 'en' ? $subCategory->name : $subCategory->name_locale }}</a>
                         
                      </li>
                      @endforeach

                    </ul>
                  </nav>
                </div>

                <div class="icon-block">
                  <ul>
                    <li class="mobile-search">
                      <a href="javascript:void(0)">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612.01 612.01" style="enable-background:new 0 0 612.01 612.01;" xml:space="preserve">
                        <g>
                          <g>
                            <g>
                              <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0
                                C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586
                                l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8
                                c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407
                                S377.82,467.8,257.493,467.8z"></path>
                            </g>
                          </g>
                        </g>
                        </svg>
                      </a>
                    </li>
                    @if(!Auth::check())
                    <li class="mobile-user onhover-dropdown" onclick="openAccount()">
                      <a href="javascript:void(0)">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                          <g>
                            <g>
                              <path d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z M256,240
                                c-57.897,0-105-47.103-105-105c0-57.897,47.103-105,105-105c57.897,0,105,47.103,105,105C361,192.897,313.897,240,256,240z"></path>
                            </g>
                          </g>
                          <g>
                            <g>
                              <path d="M297.833,301h-83.667C144.964,301,76.669,332.951,31,401.458V512h450V401.458C435.397,333.05,367.121,301,297.833,301z
                                 M451.001,482H451H61v-71.363C96.031,360.683,152.952,331,214.167,331h83.667c61.215,0,118.135,29.683,153.167,79.637V482z"></path>
                            </g>
                          </g>
                        </svg>
                      </a>
                    </li>
                    @endif



                    <!-- <li class="mobile-setting" onclick="openSetting()">
                      <a href="javascript:void(0)">
                        <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m272.066 512h-32.133c-25.989 0-47.134-21.144-47.134-47.133v-10.871c-11.049-3.53-21.784-7.986-32.097-13.323l-7.704 7.704c-18.659 18.682-48.548 18.134-66.665-.007l-22.711-22.71c-18.149-18.129-18.671-48.008.006-66.665l7.698-7.698c-5.337-10.313-9.792-21.046-13.323-32.097h-10.87c-25.988 0-47.133-21.144-47.133-47.133v-32.134c0-25.989 21.145-47.133 47.134-47.133h10.87c3.531-11.05 7.986-21.784 13.323-32.097l-7.704-7.703c-18.666-18.646-18.151-48.528.006-66.665l22.713-22.712c18.159-18.184 48.041-18.638 66.664.006l7.697 7.697c10.313-5.336 21.048-9.792 32.097-13.323v-10.87c0-25.989 21.144-47.133 47.134-47.133h32.133c25.989 0 47.133 21.144 47.133 47.133v10.871c11.049 3.53 21.784 7.986 32.097 13.323l7.704-7.704c18.659-18.682 48.548-18.134 66.665.007l22.711 22.71c18.149 18.129 18.671 48.008-.006 66.665l-7.698 7.698c5.337 10.313 9.792 21.046 13.323 32.097h10.87c25.989 0 47.134 21.144 47.134 47.133v32.134c0 25.989-21.145 47.133-47.134 47.133h-10.87c-3.531 11.05-7.986 21.784-13.323 32.097l7.704 7.704c18.666 18.646 18.151 48.528-.006 66.665l-22.713 22.712c-18.159 18.184-48.041 18.638-66.664-.006l-7.697-7.697c-10.313 5.336-21.048 9.792-32.097 13.323v10.871c0 25.987-21.144 47.131-47.134 47.131zm-106.349-102.83c14.327 8.473 29.747 14.874 45.831 19.025 6.624 1.709 11.252 7.683 11.252 14.524v22.148c0 9.447 7.687 17.133 17.134 17.133h32.133c9.447 0 17.134-7.686 17.134-17.133v-22.148c0-6.841 4.628-12.815 11.252-14.524 16.084-4.151 31.504-10.552 45.831-19.025 5.895-3.486 13.4-2.538 18.243 2.305l15.688 15.689c6.764 6.772 17.626 6.615 24.224.007l22.727-22.726c6.582-6.574 6.802-17.438.006-24.225l-15.695-15.695c-4.842-4.842-5.79-12.348-2.305-18.242 8.473-14.326 14.873-29.746 19.024-45.831 1.71-6.624 7.684-11.251 14.524-11.251h22.147c9.447 0 17.134-7.686 17.134-17.133v-32.134c0-9.447-7.687-17.133-17.134-17.133h-22.147c-6.841 0-12.814-4.628-14.524-11.251-4.151-16.085-10.552-31.505-19.024-45.831-3.485-5.894-2.537-13.4 2.305-18.242l15.689-15.689c6.782-6.774 6.605-17.634.006-24.225l-22.725-22.725c-6.587-6.596-17.451-6.789-24.225-.006l-15.694 15.695c-4.842 4.843-12.35 5.791-18.243 2.305-14.327-8.473-29.747-14.874-45.831-19.025-6.624-1.709-11.252-7.683-11.252-14.524v-22.15c0-9.447-7.687-17.133-17.134-17.133h-32.133c-9.447 0-17.134 7.686-17.134 17.133v22.148c0 6.841-4.628 12.815-11.252 14.524-16.084 4.151-31.504 10.552-45.831 19.025-5.896 3.485-13.401 2.537-18.243-2.305l-15.688-15.689c-6.764-6.772-17.627-6.615-24.224-.007l-22.727 22.726c-6.582 6.574-6.802 17.437-.006 24.225l15.695 15.695c4.842 4.842 5.79 12.348 2.305 18.242-8.473 14.326-14.873 29.746-19.024 45.831-1.71 6.624-7.684 11.251-14.524 11.251h-22.148c-9.447.001-17.134 7.687-17.134 17.134v32.134c0 9.447 7.687 17.133 17.134 17.133h22.147c6.841 0 12.814 4.628 14.524 11.251 4.151 16.085 10.552 31.505 19.024 45.831 3.485 5.894 2.537 13.4-2.305 18.242l-15.689 15.689c-6.782 6.774-6.605 17.634-.006 24.225l22.725 22.725c6.587 6.596 17.451 6.789 24.225.006l15.694-15.695c3.568-3.567 10.991-6.594 18.244-2.304z"></path><path d="m256 367.4c-61.427 0-111.4-49.974-111.4-111.4s49.973-111.4 111.4-111.4 111.4 49.974 111.4 111.4-49.973 111.4-111.4 111.4zm0-192.8c-44.885 0-81.4 36.516-81.4 81.4s36.516 81.4 81.4 81.4 81.4-36.516 81.4-81.4-36.515-81.4-81.4-81.4z"></path></svg>
                      </a>
                    </li> -->
                    <li class="mobile-wishlist item-count" onclick="openWishlist()">
                      <a href="javascript:void(0)">
                        <svg viewBox="0 -28 512.001 512" xmlns="http://www.w3.org/2000/svg"><path d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0"></path></svg>
                        <div class="cart-item">
                          <div>@if(session('wishlist')){{$quantitywishlist}}@else 0 @endif @lang('home.item') <span>@lang('home.WishList')</span>
                          </div>
                        </div>
                        <div class="item-count-contain">
                          @if(session('wishlist')){{$quantitywishlist}}@else 0 @endif
                        </div>
                      </a>
                    </li>
                    <li class="mobile-cart item-count" onclick="openCart()">
                      <a href="javascript:void(0)">
                        <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m497 401.667c-415.684 0-397.149.077-397.175-.139-4.556-36.483-4.373-34.149-4.076-34.193 199.47-1.037-277.492.065 368.071.065 26.896 0 47.18-20.377 47.18-47.4v-203.25c0-19.7-16.025-35.755-35.725-35.79l-124.179-.214v-31.746c0-17.645-14.355-32-32-32h-29.972c-17.64 0-31.99 14.351-31.99 31.99v31.594l-133.21-.232-9.985-54.992c-2.667-14.694-15.443-25.36-30.378-25.36h-68.561c-8.284 0-15 6.716-15 15s6.716 15 15 15c72.595 0 69.219-.399 69.422.719 16.275 89.632 5.917 26.988 49.58 306.416l-38.389.2c-18.027.069-32.06 15.893-29.81 33.899l4.252 34.016c1.883 15.06 14.748 26.417 29.925 26.417h26.62c-18.8 36.504 7.827 80.333 49.067 80.333 41.221 0 67.876-43.813 49.067-80.333h142.866c-18.801 36.504 7.827 80.333 49.067 80.333 41.22 0 67.875-43.811 49.066-80.333h31.267c8.284 0 15-6.716 15-15s-6.716-15-15-15zm-209.865-352.677c0-1.097.893-1.99 1.99-1.99h29.972c1.103 0 2 .897 2 2v111c0 8.284 6.716 15 15 15h22.276l-46.75 46.779c-4.149 4.151-10.866 4.151-15.015 0l-46.751-46.779h22.277c8.284 0 15-6.716 15-15v-111.01zm-30 61.594v34.416h-25.039c-20.126 0-30.252 24.394-16.014 38.644l59.308 59.342c15.874 15.883 41.576 15.885 57.452 0l59.307-59.342c14.229-14.237 4.13-38.644-16.013-38.644h-25.039v-34.254l124.127.214c3.186.005 5.776 2.603 5.776 5.79v203.25c0 10.407-6.904 17.4-17.18 17.4h-299.412l-35.477-227.039zm-56.302 346.249c0 13.877-11.29 25.167-25.167 25.167s-25.166-11.29-25.166-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167zm241 0c0 13.877-11.289 25.167-25.166 25.167s-25.167-11.29-25.167-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167z"></path></g></svg>
                      </a>
                      <div class="item-count-contain">
                        @if(session('wishlist')){{$quantitywishlist}}@else 0 @endif
                      </div>
                    </li>
                  </ul>
                </div>



                  @if(Auth::check())
                  @php $full_name =  Auth::user()->full_name ;
                  $first_name = explode(" ", $full_name);
                  @endphp
                  <div class="btn-group">
                    <div class="gift-block" data-bs-toggle="dropdown">
                      <div class="grif-icon">

                      </div>
                      <div class="gift-offer" style=" margin-top: 1rem; ">
                        <p>Hala {{$first_name[0]}}</p>
                        <span>@lang('home.My Account')</span>   
                      </div>
                    </div>
                    <div class="dropdown-menu gift-dropdown">
                      <div class="media">
                        <div>
                          <li> <a href="{{route('logout')}}"> @lang('home.Logout') </a></li>
                        </div>
                        <div class="media-body">

                        </div>

                      </div>

                    </div>
                  </div>
                </div>

                     @endif

              </div>
            </div>
          </div>
        </div>
        <div class="searchbar-input">
          <form action="{{route('search')}}">
            @csrf
           <div class="input-group">
            <span class="input-group-text">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932" style="enable-background:new 0 0 28.931 28.932;" xml:space="preserve"><g><path d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z"></path></g></svg>
            </span>
            <input type="text" class="form-control" placeholder="search your product">
            <input type="submit" hidden>
            <span class="input-group-text close-searchbar">
              <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg"><path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"></path></svg>
            </span>
          </div>
          </form>
        </div>
      </div>
   

    @if(session('cart'))

    <div id="cart_side" class="add_to_cart top">
      <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
      <div class="cart-inner">
        <div class="cart_top">
          <h3>@lang('home.My Cart')</h3>
          <div class="close-cart">
            <a href="javascript:void(0)" onclick="closeCart()">
              <i class="fa fa-times" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="cart_media" id="cart_product">
          @include('frontend.cart_side')
        </div>
      </div>
    </div>

    @else
<div id="cart_side" class="add_to_cart left">
  <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
  <div class="cart-inner">
    <div class="cart_top">
      <h3>@lang('home.My Cart')</h3>
      <div class="close-cart">
        <a href="javascript:void(0)" onclick="closeCart()">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="cart_media" id="cart_product">

      <ul  class="cart_product">

     <li class="cart-list">

     </li>
     </ul>

      <ul class="cart_total">
        <li>

        </li>
        <li>

        </li>
        <li>

        </li>
        <li>
          <div class="total">

          </div>
        </li>
        <li>
          <div class="buttons">
            <a href="{{ route('cart.list') }}" class="btn btn-solid btn-sm">@lang('home.view cart')</a>
            <a href="{{ route('checkoutlist') }}" class="btn btn-solid btn-sm ">@lang('home.checkout')</a>
          </div>
        </li>
      </ul>




    </div>
  </div>
  </div>
@endif

    <div id="myAccount" class="add_to_cart right account-bar">
      <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
      <div class="cart-inner">
        <div class="cart_top">
          <h3>@lang('home.My Account')</h3>
          <div class="close-cart">
            <a href="javascript:void(0)" onclick="closeAccount()">
              <i class="fa fa-times" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <form class="theme-form" action="{{route('login_user')}}" method="POST" autocomplete="off">
          @csrf
          <div class="form-group">
            <label for="email">@lang('home.Email')</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="@lang('home.Email')" required="">
          </div>
          <div class="form-group">
            <label for="review">@lang('home.Password')</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="@lang('home.Enter your password')" required="">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-solid btn-md btn-block">@lang('home.Login')</a>
          </div>
          <div class="accout-fwd">
            <a href="{{route('forget_pwd')}}" class="d-block"><h5>@lang('home.forget password?')</h5></a>
            <a href="{{route('register_user')}}" class="d-block"><h6>@lang('you have no account ?')<span>@lang('home.Signup Now')</span></h6></a>
          </div>
        </form>
      </div>
    </div>

    <div id="wishlist_side" class="add_to_cart right">
      <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
      <div class="cart-inner">
        <div class="cart_top">
          <h3>@lang('home.my wishlist')</h3>
          <div class="close-cart">
            <a href="javascript:void(0)" onclick="closeWishlist()">
              <i class="fa fa-times" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="cart_media">
          <ul class="cart_product">
            @php $total = 0 @endphp
            @if(session('wishlist'))
                @foreach(session('wishlist') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
            <li>
              <div class="media">
                <a href="#">
                  <img alt="megastore1" class="me-3" src="{{ asset('uploads/items/' . $details['image'] )}}">
                </a>
                <div class="media-body">
                  <a href="#">
                    <h4>{{ $details['name'] }}</h4>
                  </a>
                  <h6>
                    {{ $details['price'] }} <span></span>
                  </h6>
                  <div class="addit-box">
                    <div class="qty-box">
                      <div class="input-group">

                      </div>
                    </div>
                    <div class="pro-add" data-id="{{ $details['id'] }}">

                      <a href="javascript:void(0)" class="remove-from-wishlist">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            @endforeach
            @endif
          </ul>

        </div>
      </div>
    </div>



@include('frontend.includes.login')



  </div>
</header>
<!--header end-->


<div id="myAccount" class="add_to_cart left account-bar">
  <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
  <div class="cart-inner">
    <div class="cart_top">
      <h3>My Account</h3>
      <div class="close-cart">
        <a href="javascript:void(0)" onclick="closeAccount()">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <form class="theme-form">
      <div class="form-group">
        <label for="email">@lang('home.Email')</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="@lang('home.Email')" required="">
      </div>
      <div class="form-group">
        <label for="review">@lang('home.Password')</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="@lang('home.Enter your password')" required="">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-solid btn-md btn-block">@lang('home.Login')</a>
      </div>
      <div class="accout-fwd">
        <a href="{{route('forget_pwd')}}" class="d-block"><h5>@lang('home.forget password?')</h5></a>
            <a href="{{route('register_user')}}" class="d-block"><h6>@lang('you have no account ?')<span>@lang('home.Signup Now')</span></h6></a>
      </div>
    </form>
  </div>
</div>

</div>
</div>

<div class="modal" tabindex="-1" id="googlemaps">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('addressdelver')}}" method="get">
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
           <input type="hidden" name="long" id="long" value="" required>
           <input type="hidden" name="lat" id="lat" value="" required>
           <input type="text" id="search_input" name="address" placeholder="Search for a place" />
            <div id="maps"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="confirmlocation" disabled>@lang('home.Confirm Location') {{App::getLocale()}}</button>
      </div>
       </form>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="googlemaps">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('home.Add New Address')</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('addressdelver')}}" method="get">
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
           <input type="hidden" name="long" id="long" value="" required>
           <input type="hidden" name="lat" id="lat" value="" required>
           <input type="text" id="search_input" name="address" placeholder="@lang('home.Search for a place')" />
            <div id="maps"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="confirmlocation" disabled>@lang('home.Confirm Location')</button>
      </div>
       </form>
    </div>
  </div>
</div>

    @yield('content')



<!-- footer start -->
<footer>
  <div class="footer1">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="footer-main">
            <div class="footer-box">
              <div class="footer-title mobile-title">
                <h5>@lang('home.about')</h5>
              </div>
              <div class="footer-contant">
                <div class="footer-logo">
                  <a href="{{route('ecommerce')}}" style="width: 60%;padding-right: 15px;">
                    <img src="{{asset('media/logos/bagdones_logo.svg')}}" class="img-fluid image-logo" alt="logo">
                  </a>
                </div>
                <p></p>
                <ul class="paymant">
                  <li><a href="javascript:void(0)"><img src="{{ asset('frontend/assets/images/layout-1/pay/1.png')}}" class="img-fluid" alt="pay"></a></li>
                  <li><a href="javascript:void(0)"><img src="{{ asset('frontend/assets/images/layout-1/pay/2.png')}}" class="img-fluid" alt="pay"></a></li>
                  <li><a href="javascript:void(0)"><img src="{{ asset('frontend/assets/images/layout-1/pay/3.png')}}" class="img-fluid" alt="pay"></a></li>
                  <li><a href="javascript:void(0)"><img src="{{ asset('frontend/assets/images/layout-1/pay/4.png')}}" class="img-fluid" alt="pay"></a></li>
                  <li><a href="javascript:void(0)"><img src="{{ asset('frontend/assets/images/layout-1/pay/5.png')}}" class="img-fluid" alt="pay"></a></li>
                </ul>
              </div>
            </div>
            <div class="footer-box">
              <div class="footer-title">
                <h5>@lang('home.My Account')</h5>
              </div>
              <div class="footer-contant">
                <ul>
                  <li><a href="{{route('aboutus')}}">@lang('home.about us')</a></li>
                  <li><a href="{{route('contactus')}}">@lang('home.contact us')</a></li>
                  <!-- <li><a href="javascript:void(0)">terms &amp; conditions</a></li>
                  <li><a href="javascript:void(0)">returns &amp; exchanges</a></li>
                  <li><a href="javascript:void(0)">shipping &amp; delivery</a></li> -->
                </ul>
              </div>
            </div>
            <div class="footer-box">
              <div class="footer-title">
                <h5>@lang('home.contact us')</h5>
              </div>
              <div class="footer-contant">
                <ul class="contact-list">
                  <li><i class="fa fa-map-marker"></i>@lang('home.United Arab Emirates Abu Dhabi') </li>
                  <li><i class="fa fa-phone"></i>@lang('home.Call us')' : <span>+971 50 440 5854</span></li>
                  <li><i class="fa fa-envelope-o"></i>@lang('home.Email us')': hello@bagdones.com </li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="subfooter dark-footer ">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-md-8 col-sm-12">
          <div class="footer-left">
            <p>@lang('home.2022 Powered by Bagdones')</p>
          </div>
        </div>
        <div class="col-xl-6 col-md-4 col-sm-12">
          <div class="footer-right">
            <ul class="sosiyal">
              <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- footer end -->

        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <!-- latest jquery-->
        <script src="{{ asset('frontend/assets/js/jquery-3.3.1.min.js')}}"></script>

        <!-- slick js-->
        <script src="{{ asset('frontend/assets/js/slick.js')}}"></script>

        <!-- popper js-->
        <script src="{{ asset('frontend/assets/js/popper.min.js')}}" ></script>
        <script src="{{ asset('frontend/assets/js/bootstrap-notify.min.js')}}"></script>

        <!-- menu js-->
        <script src="{{ asset('frontend/assets/js/menu.js')}}"></script>

        <!-- timer js -->
        <script src="{{ asset('frontend/assets/js/timer2.js')}}"></script>

        <!-- Bootstrap js-->
        <script src="{{ asset('frontend/assets/js/bootstrap.js')}}"></script>

        <!-- tool tip js -->
        <script src="{{ asset('frontend/assets/js/tippy-popper.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/tippy-bundle.iife.min.js')}}"></script>

        <!-- father icon -->
        <script src="{{ asset('frontend/assets/js/feather.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/feather-icon.js')}}"></script>

        <!-- Theme js-->
        <script src="{{ asset('frontend/assets/js/modal.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/script.js')}}"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        autoplay: 5000,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        mousewheel: true,
        keyboard: true,
      });
    </script>


        <script>
          function myMap() {
          var mapProp= {
            center:new google.maps.LatLng(23.0996365,54.3210099),
            zoom:5,
          };
          var map = new google.maps.Map(document.getElementById("maps"),mapProp);
          }
          </script>

          <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAgetfsUjWTD71H7UEq3gyPjjnRFaBT5Wc&signed_in=true&libraries=places&callback=myMap'></script>


          <script src="{{asset('js/script.js')}}"></script>

        @yield('scripts')


        <script>
          @if($message = session('succes_message'))
          swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ $message }}",

          });
          @endif
          </script>

<script>

$(document).ready(function(){

});

function plusmius()
{
  var qtyDecs = document.querySelectorAll(".qty-minus");
  var qtyIncs = document.querySelectorAll(".qty-plus");
  qtyDecs.forEach((qtyDec) => {
    qtyDec.addEventListener("click",function(e){
      if(e.target.nextElementSibling.value > 0){
        e.target.nextElementSibling.value--;
      } else {
        // delete the item, etc
      }
    })
  })
  qtyIncs.forEach((qtyDec) => {
    qtyDec.addEventListener("click",function(e){
      e.target.previousElementSibling.value++;
    })
  })
}
  @if($message = session('succes'))
  swal.fire({
    icon: 'success',
    text: "{{ $message }}"
  });
  @endif
  </script>

<script type="text/javascript">



let passwordInput = document.querySelector('[name="password"]'),
    toggle = document.getElementById('btnToggle'),
    icon =  document.getElementById('eyeIcon');

function togglePassword() {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
  } else {
    passwordInput.type = 'password';

  }
}





toggle.addEventListener('click', togglePassword, false);

$("#forgot-password").click(function(){
  $('#Login').modal('hide');
  $('#forget_password').modal('show');
});

$(".back-button-text").click(function(){
  $('#Login').modal('show');
  $('#forget_password').modal('hide');
});

$(".btn_signUpButton").click(function(){
  $('#Login').modal('hide');
  $('#Register').modal('show');
});

$(".signUpButton").click(function(){
  $('#Login').modal('show');
  $('#Register').modal('hide');
});

$(".toggle-password").click(function() {


var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});

function addToCart(id)
{
  var addtocart = "{{ asset('add-to-cart/') }}";

    $.ajax({
      url:  addtocart + '/' +  id ,
      method: "get",
      data: {
          _token: '{{ csrf_token() }}',
          id: id
      },
      success: function (response)
      {
        $('#cart_product').empty().html(response.html);
        var count = parseInt($('.data-count').attr("data-id"));
        var dataid = $('.data-count').attr("data-id",count+1);
        $('.data-count').empty().html(count+1);
        toastr.success('Your Product is Added to cart', 'Product added');
        document.getElementById("cart_side").classList.add('open-side');
        plusmius();
      }
  });
}

function updateCart(id,quantity)
{

  $.ajax({
      url: '{{ route('update.cart') }}',
      method: "patch",
      data: {
          _token: '{{ csrf_token() }}',
          id: id ,
          quantity: quantity
      },
      success: function (response)
      {
        $('#cart_product').empty().html(response.html);
      }
  });
}

function removeFromCart(id)
{
  if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function (response)
                {
                  console.log(response);
                  $('#cart_product').empty().html(response.html);
                }
            });
        }
}

    $(".remove-from-wishlist").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        $(".remove-from-wishlist").click(function (e) {
        e.preventDefault();

        var ele = $(this); $(this).attr("data-id")

        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.wishlist') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("div").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

  });

</script>

<script type="text/javascript">
  
  var url = "{{ route('changeLang') }}";

  $(".changeLang").change(function(){
      window.location.href = url + "?lang="+ $(this).val();
  });

</script>

    </body>
</html>

