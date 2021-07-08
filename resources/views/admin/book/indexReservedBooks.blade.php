

@extends('Master_layout.app')
@section('content')



    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    Widget settings form goes here
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn blue">Save changes</button>
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN STYLE CUSTOMIZER -->
    <!-- END STYLE CUSTOMIZER -->
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Reserved Books
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('dashboard')}}">   Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>

            <li>
                <a href="#">Reserved Books</a>
            </li>
        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>Table
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                       <a href="javascript:;" class="reload">
                        </a>

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a id="" class="btn green" href="{{route('admin.createReservedBook.create')}}" >
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>

                            <th>
                                User
                            </th>
                            <th>
                                Book
                            </th>
                            <th>
                                Collection appointment
                            </th>
                            <th>
                                Note
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Actions
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($book_user as $bookuser)
                            <tr>
                                <td>
                                    {{$bookuser->user_name}}

                                </td>
                                <td>
                                    {{$bookuser->book_name}}
                                </td>
                                <td>
                                    {{$bookuser->collection_appointment}}
                                </td>
                                <td>
                                    {{$bookuser->note}}
                                </td>
                                <td>

                                    @if($bookuser->status=='0')
                                        <span class="bg-info">Booked up</span>

                                    @endif
                                    @if($bookuser->status=='1')
                                       <span class="bg-warning">Reminded</span>
                                    @endif


                                    @if($bookuser->status=='2')
                                      <span  class="bg-success">  received</span>
                                    @endif
                                </td>
                                <td>
                                    <a style="background-color: #f5b30a" class="btn margin-right-10" href="{{route('admin.statusReservedBook.update',['status'=>1,'id'=>$bookuser->id])}}">

                                        <i style="color: #fff6a1" class="fa  fa-hand-o-left">
                                        </i>
                                    </a>

                                    <a class="btn margin-right-10" style="background-color: #12f302" href="{{route('admin.statusReservedBook.update',['status'=>2,'id'=>$bookuser->id])}}">
                                        <i style="color: #fff6a1" class="fa  fa-check-square-o">
                                        </i>
                                    </a>
                                </td>

                                <td>
                                    <a class="" href="{{route('admin.editReservedBook.edit',['id'=>$bookuser->id])}}">
                                        Edit </a>
                                </td>
                                <td>
                                    <a class="delete" href="javascript:;">
                                        Delete </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>


@endsection


