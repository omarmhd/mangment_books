<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
<head>

    @include('Master_layout._head')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="#">
                <img style="height:50px; width: 67px ; margin: 0px"   src="{{asset('files/Logo.png')}}" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li>

                    @can('high_privileges')
                    <a href="{{route('admin.request.index')}}"> <i class="fa fa-send"> </i></a>
                    @endcan

                   @can('low_privileges')
                    <a href="{{route('request.index')}}"> <i class="fa fa-send"> </i></a>
                    @endcan

                </li>


                <li>

                    @can('high_privileges')
                        <a href="{{route('book.index')}}"> <i class="icon-book-open"> </i></a>
                    @endcan

                    @can('low_privileges')
                        <a href="{{route('library')}}"> <i class="fa fa-th"> </i></a>
                    @endcan

                </li>
                <li>

                    <a href="{{route('profile_user.index',['user'=>auth()->user()->id])}}"><i class="icon-user"></i></a>

                </li>
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{asset('files')}}/{{auth()->user()->image}}"/>
                        <span class="username username-hide-on-mobile">
					{{auth()->user()->name}} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                          <a href="{{route('profile_user.index',['user'=>auth()->user()->id])}}"><i class="icon-user"></i> My profile</a>
                        </li>
                        <li>
                            <a href="{{route('logout')}}"      onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="icon-key"></i> Log Out </a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="{{route('logout')}}" class="dropdown-toggle"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="icon-logout"></i>
                    </a>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <!-- END SIDEBAR -->


@include('Master_layout._sidebarr')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('content')

        </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>

<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->

<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        2021 &copy;. Library management project
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
@include('Master_layout._script')
@stack('script')
@include('Master_layout._messeges')

</body>
<!-- END BODY -->
</html>
