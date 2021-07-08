<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler" style=" background: url({{asset('assets')}}/global/img/sidebar_inline_toggler_icon_darkblue.jpg);background-color: yellow">

                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>


            @can('high_privileges')
                <li class="heading">
                    <h3 class="uppercase">As {{auth()->user()->role}}</h3>
                </li>
                <li class="start ">
                    <a href="{{route('dashboard')}}">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="arrow "></span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-users"></i>
                        <span class="title">Users</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('user.index')}}">
                                <i class="icon-user-following"></i>
                                User management</a>
                        </li>

                        <li>
                            <a href="{{route('indexPendingUsers')}}">
                                <i class="icon-user-unfollow"></i>
                                Pending Users</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <i class="icon-book-open"></i>
                        <span class="title">Books</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('book.index')}}">
                                <i class="fa fa-book"></i>
                                Book management


                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.indexReservedBook.index')}}">
                                <i class="icon-clock"></i>
                                Reserved Books


                            </a>
                        </li>



                    </ul>
                </li>

                <li>
                    <a href="{{route('Category.index')}}">
                        <i class="fa fa-cube"></i>
                        <span class="title">Categories</span>
                        <span class="arrow "></span>
                    </a>
                </li>


                <li>
                    <a href="{{route('admin.request.index')}}">
                        <i class="fa fa-database"></i>
                        <span class="title">Requests</span>
                        <span class="arrow "></span>
                    </a>
                </li>

                <li class="heading">
                    <h3 class="uppercase">As user</h3>
                </li>
            @endcan


            <li>

                <a href="{{route('profile_user.index',['user'=>auth()->user()->id])}}">
                    <i class="icon-user"></i>
                    <span class="title">My profile  </span>
                    <span class="arrow "></span>

                </a>
            </li>
                <li>

                    <a href="{{route('student_book.index')}}">
                        <i class="fa fa-book"></i>
                        <span class="title"> My Books</span>
                        <span class="arrow "></span>

                    </a>
                </li>

            <li>

                <a href="{{route('request.index')}}">
                    <i class="fa fa-send"></i>
                    <span class="title">My requests  </span>
                    <span class="arrow "></span>

                </a>
            </li>





            <li>
                <a href="{{route('library')}}">
                    <i class="fa fa-th"></i>
                    <span class="title">Library</span>
                    <span class="arrow "></span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="icon-book-open"></i>
                    <span class="title">Reserved books</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('user.indexReservedBookUser.index')}}">
                            <i class="icon-handbag"></i>
                            Books to be reserved</a>
                    </li>
                    <li>
                        <a href="{{route('user.indexBooksRequiredToDeliver.index')}}">
                            <i class="icon-hourglass"></i>
                            Requested to delivery </a>
                    </li>
                </ul>


            </li>
            <!-- BEGIN ANGULARJS LINK -->
            <!-- END ANGULARJS LINK -->

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
