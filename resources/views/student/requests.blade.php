@extends('Master_layout.app')
@section('content')

    <h3 class="page-title">
        Portfolio <small>4,3,2 columns portfolio</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Extra</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Actions <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">Action</a>
                    </li>
                    <li>
                        <a href="#">Another action</a>
                    </li>
                    <li>
                        <a href="#">Something else here</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Actions <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">Action</a>
                    </li>
                    <li>
                        <a href="#">Another action</a>
                    </li>
                    <li>
                        <a href="#">Something else here</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-9">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Requests Table
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="reload" data-original-title="" title="">
                    </a>


                </div>
            </div>
            <div class="portlet-body" style="">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                             Book name
                            </th>
                            <th>
                              Request
                            </th>
                            <th>
                               Date
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($requests as $request)
                        <tr>
                            <td>
                                {{$request->id}}
                            </td>
                            <td>
                                {{$request->book->name}}
                            </td>
                            <td>
                                {{$request->request=='E' ?'E-book':'Hard Book'}}

                            </td>
                            <td>
                                {{$request->date}}
                            </td>

                            <td>
										<span class="label label-sm {{$request->status==1 ?'label-success':'label-warning'}}">
									 {{$request->status==1 ?'Approved':'pending'}}</span>
                            </td>
                        </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>

</div>


@endsection
