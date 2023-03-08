{{-- Content --}}
@section('sidebar')
    <!-- LEFT MAIN SIDEBAR -->
    <div class="ec-left-sidebar ec-bg-sidebar">
        <div id="sidebar" class="sidebar ec-sidebar-footer">

            <div class="ec-brand">
                <a href="#" title="bagdones">
                    <img class="ec-brand-icon" src="{{asset('admin/assets/img/logo/ec-site-logo.png')}}" alt="" />
                    <span class="ec-brand-name text-truncate">Bagdones</span>
                </a>
            </div>

            <!-- begin sidebar scrollbar -->
            <div class="ec-navigation" data-simplebar>
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">
                    <!-- Dashboard -->
                    <li class="{{Request::is('/')  ?  "active" : ""}}">
                        <a class="sidenav-item-link" href="{{route('dashboard')}}">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <hr>
                    </li>

                    <!-- Localization -->
{{--                    <li class="has-sub">--}}
{{--                        <a class="sidenav-item-link" href="javascript:void(0)">--}}
{{--                            <i class="mdi mdi-account-group-outline"></i>--}}

{{--                            <span class="nav-text">Localization</span> <b class="caret"></b>--}}
{{--                        </a>--}}
{{--                        <div class="collapse">--}}
{{--                            <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">--}}
{{--                                <li class="">--}}
{{--                                    <a class="sidenav-item-link" href="{{route('area.index')}}">--}}
{{--                                        <span class="nav-text">Areas</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="">--}}
{{--                                    <a class="sidenav-item-link" href="{{route('city.index')}}">--}}
{{--                                        <span class="nav-text">Cities</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="">--}}
{{--                                    <a class="sidenav-item-link" href="{{route('country.index')}}">--}}
{{--                                        <span class="nav-text">Countries</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                <!-- Category -->
                    <li class="has-sub {{Request::is('category') || Request::is('subCategory') ?  "active" : ""}}">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-dns-outline"></i>
                            <span class="nav-text">Categories</span> <b class="caret"></b>
                        </a>
                        <div class="collapse {{Request::is('category') || Request::is('subCategory') ?  "d-block" : ""}}">
                            <ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('category')}}">
                                        <span class="nav-text">Main Category</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('subCategory.index')}}">
                                        <span class="nav-text">Sub Category</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <!-- Home and Appearance -->
                    <li class="has-sub {{Request::is('appearance') || Request::is('home') ?  "active" : ""}}">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="fa-icon fas fa-home" aria-hidden="true"></i>
                            <span class="nav-text">Home and Appearance</span> <b class="caret"></b>
                        </a>
                        <div class="collapse {{Request::is('appearance') || Request::is('home') ?  "d-block" : ""}}">
                            <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
{{--                                <li class="">--}}
{{--                                    <a class="sidenav-item-link" href="{{route('content_type')}}">--}}
{{--                                        <span class="nav-text">Content Types</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('appearance')}}">
                                        <span class="nav-text">Appearance</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('home')}}">
                                        <span class="nav-text">Home</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <!-- Stores and Items -->
                    <li class="has-sub {{Request::is('store') || Request::is('items') || Request::is('attribute') ?  "active" : ""}}">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="fa-icon fas fa-store-slash" aria-hidden="true"></i>
                            <span class="nav-text">Stores and Items</span> <b class="caret"></b>
                        </a>
                        <div class="collapse {{Request::is('store') || Request::is('items') || Request::is('attribute') ?  "d-block" : ""}}">
                            <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('store')}}">
                                        <span class="nav-text">Stores</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('items')}}">
                                        <span class="nav-text">Item</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('attribute')}}">
                                        <span class="nav-text">Attributes</span>
                                    </a>
                                </li>
                                 <li class=""> 
                                   <a class="sidenav-item-link" href="{{route('compulsory_choice')}}"> 
                                      <span class="nav-text">Compulsory Choice</span> 
                                       </a> 
                                   </li> 
                                   <li class=""> 
                                        <a class="sidenav-item-link" href="{{route('multiple_choice')}}"> 
                                       <span class="nav-text">Multipule Choices</span> 
                                    </a> 
                                   </li> 
                            </ul>
                        </div>
                    </li>

                    <!-- Orders -->
                    <li class="has-sub {{Request::is('orders') || Request::is('ordershistory') ?  "active" : ""}}">
                        <a class="sidenav-item-link"  href="javascript:void(0)">
                            <i class="mdi mdi-cart"></i>
                            <span class="nav-text">Orders</span> <b class="caret"></b>
                        </a>
                        <div class="collapse {{Request::is('orders') || Request::is('ordershistory') ?  "d-block" : ""}}" >
                            <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                <li>
                                    <a class="sidenav-item-link" href="{{route('orders')}}">
                                        <span class="nav-text">Orders List</span>
                                    </a>
                                </li>

                                <li>
                                    <a class="sidenav-item-link" href="{{route('ordershistory')}}">
                                        <span class="nav-text">Orders History</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                        <hr>
                    </li>

                    <!-- Notification -->
                    <li class="has-sub {{Request::is('sendnotification') || Request::is('itemnotification') || Request::is('specificnotification') ?  "active" : ""}}">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="fa-icon fas fa-concierge-bell" aria-hidden="true"></i>
                            <span class="nav-text">Notification</span> <b class="caret"></b>
                        </a>
                        <div class="collapse {{Request::is('sendnotification') || Request::is('itemnotification') || Request::is('specificnotification') ?  "d-block" : ""}}">
                            <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                <li>
                                    <a class="sidenav-item-link" href="{{url('sendnotification')}}">
                                        <span class="nav-text">Normal Notification</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('itemnotification')}}">
                                        <span class="nav-text">Item Notification</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('specificnotification')}}">
                                        <span class="nav-text">Specific Notification</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                    </li>

                    <!-- Users -->
                    <li class="has-sub {{Request::is('Users') || Request::is('Address') ?  "active" : ""}}">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-account-group"></i>
                            <span class="nav-text">Users</span> <b class="caret"></b>
                        </a>
                        <div class="collapse {{Request::is('Users') || Request::is('Address') ?  "d-block" : ""}}">
                            <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                <li>
                                    <a class="sidenav-item-link" href="{{route('Users')}}">
                                        <span class="nav-text">Users</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('Address')}}">
                                        <span class="nav-text">Address</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                    </li>




                </ul>
            </div>
        </div>
    </div>

    <!--  PAGE WRAPPER -->
    <div class="ec-page-wrapper">

        <!-- Header -->
        <header class="ec-main-header" id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
                <!-- Sidebar toggle button -->
                <button id="sidebar-toggler" class="sidebar-toggle"></button>
                <!-- search form -->
                <div class="search-form d-lg-inline-block">
                    <div class="input-group">
                        <!-- <input type="text" name="query" id="search-input" class="form-control"
                               placeholder="search.." autofocus autocomplete="off" />
                        <button type="button" name="search" id="search-btn" class="btn btn-flat">
                            <i class="mdi mdi-magnify"></i>
                        </button> -->
                    </div>
                    <div id="search-results-container">
                        <ul id="search-results"></ul>
                    </div>
                </div>

                <!-- navbar right -->
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account -->
                        <li class="dropdown user-menu">
                            <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <img src="{{asset('admin/assets/img/user/user-icon.png')}}" class="user-image" alt="User Image" />
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
                                <!-- User image -->
                                <li class="dropdown-header">
                                    <img src="{{asset('admin/assets/img/user/user-icon.png')}}" class="img-circle" alt="User Image" />
                                    <div class="d-inline-block">
                                     <small class="pt-1">Admin</small>
                                    </div>
                                </li>
                                <!-- <li>
                                    <a href="#">
                                        <i class="mdi mdi-account"></i> My Profile
                                    </a>
                                </li> -->
{{--                                <li class="right-sidebar-in">--}}
{{--                                    <a href="javascript:0"> <i class="mdi mdi-settings-outline"></i> Setting </a>--}}
{{--                                </li>--}}
                                <li class="dropdown-footer">
                                    <a href="{{route('logout')}}"> <i class="mdi mdi-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </nav>
        </header>

    @yield('content')

    <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="copyright bg-white">
                <p>
                Copyright &copy; <span id="ec-year"></span><a class="text-primary"
                href="#" target="_blank"> Bagdones Admin Dashboard</a>. All Rights Reserved.
                </p>
            </div>
        </footer>

    </div> <!-- End Page Wrapper -->
@endsection

