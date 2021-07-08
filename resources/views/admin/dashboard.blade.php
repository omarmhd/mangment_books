@extends('Master_layout.app')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">

        <li>
            <i class="fa fa-home"></i>
            <a href="#">Dashboard</a>
        </li>
    </ul>

</div>
<h3 class="page-title">
    Dashboard <small>statistics</small>
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{$count_book}}
                </div>
                <div class="desc">
                    BOOKS
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{$count_request}}
                </div>
                <div class="desc">
                    REQUESTS
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{$count_Administrator}}
                </div>
                <div class="desc">
                    Administrators
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{$count_BookstoreManager}}
                </div>
                <div class="desc">
                    BookstoreManager
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{$count_DeptChairs}}
                </div>
                <div class="desc">
                 DeptChairs
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{$count_Faculty}}
                </div>
                <div class="desc">
                    Faculty
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{$count_Student}}
                </div>
                <div class="desc">
                    Student
                </div>
            </div>

        </div>
    </div>
</div>
 @endsection
