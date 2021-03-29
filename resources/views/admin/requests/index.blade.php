

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
        Mangment users
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>

            <li>
                <a href="#">Mangment users</a>
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
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>users table
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="#portlet-config" data-toggle="modal" class="config">
                        </a>
                        <a href="javascript:;" class="reload">
                        </a>
                        <a href="javascript:;" class="remove">
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a id="" class="btn green" href="{{route('book.create')}}" >
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                Name Book
                            </th>
                            <th>
                                Request
                            </th>
                            <th>
                                Request date
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        <tr>--}}

{{--                            <td></td>--}}
{{--                            <td></td>--}}
{{--                            <td></td>--}}
{{--                            <td></td>--}}
{{--                            <td></td>--}}
{{--                            <td></td>2--}}
{{--                        </tr>--}}
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

                                     @if($request->status=='-1')

                                        <span class="label label-sm label-warning">
									    pending
                                        </span>
                                        @endif

                                        @if($request->status=='0')

                                            <span class="label label-sm  label-danger">
									             Rejected
                                            </span>
                                        @endif
                                        @if($request->status=='1')

                                            <span class="label label-sm label-success">
									            Approved
                                            </span>
                                        @endif


                                </td>

                                <td>
                                    @if($request->status=='1')

                                    <a class="btn btn-danger update"    href=" {{route('admin.request.update_status',['id'=>$request->id,'status'=>'0'])}}" data-id="{{$request->id}}"  > <i class="fa fa-close"></i>reject
                                    </a>

                                    @else

                                    <a class="btn btn-primary update"   href=" {{route('admin.request.update_status',['id'=>$request->id,'status'=>'1'])}}" data-id="{{$request->id}}"  > <i class="fa fa-check "> </i>accept
                                    </a>

                                        @endif
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
    @push('script')
{{--        <script>--}}
{{--            $(function() {--}}

{{--                fetchRecords();--}}
{{--                $(".update").click(function (e) {--}}
{{--                    e.preventDefault();--}}
{{--                    $.ajaxSetup({--}}
{{--                        headers: {--}}
{{--                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}

{{--                        }--}}

{{--                    });--}}
{{--                    var id = $(this).data('id')--}}
{{--                    var url = "{{ route('admin.request.update_status') }}/"--}}
{{--                    url = url + id--}}
{{--                    alert(id)--}}
{{--                    jQuery.ajax({--}}
{{--                        url: url,--}}
{{--                        method: 'get',--}}
{{--                        data: {id: id},--}}


{{--                        success: function (result) {--}}

{{--                            $('#sample_editable_1').DataTable().ajax.reload()--}}
{{--                        }--}}
{{--                    })--}}


{{--                })--}}

{{--                function fetchRecords() {--}}
{{--                    $.ajax({--}}
{{--                        url: "{{ route('admin.index_ajax.index') }}",--}}
{{--                        type: 'get',--}}
{{--                        success: function (response) {--}}
{{--                            console.log(response)--}}
{{--                            var len = 0;--}}
{{--                            $('.table tbody tr:first').remove(); // Empty <tbody>--}}
{{--                            if(response['data'] != null){--}}
{{--                                len = response['data'].length;--}}
{{--                            }--}}

{{--                            if (len > 0) {--}}

{{--                                for (var i = 0; i < len; i++) {--}}

{{--                                    var id = response['data'][i].id;--}}
{{--                                    var request = response['data'][i].request;--}}
{{--                                    var date = response['data'][i].date;--}}
{{--                                    var status = response['data'][i].status;--}}

{{--                                    var tr_str =--}}
{{--                                        "<tr>" +--}}
{{--                                        "<td align='center'><input type='text' value='" + id + "' id='username_" + id + "' disabled></td>" +--}}
{{--                                        "<td align='center'><input type='text' value='" + request + "' id='name_" + id + "'></td>" +--}}
{{--                                        "<td align='center'><input type='email' value='" + date + "' id='email_" + id + "'></td>" +--}}
{{--                                        "<td align='center'><input type='button' value=" + status + "' class='update' data-id='" + id + "' ><input type='button' value='Delete' class='delete' data-id='" + id + "' ></td>" +--}}
{{--                                        "</tr>";--}}

{{--                                    $(".table tbody").append(tr_str);--}}

{{--                                }--}}
{{--                            } else {--}}
{{--                                var tr_str = "<tr class='norecord'>" +--}}
{{--                                    "<td align='center' colspan='4'>No record found.</td>" +--}}
{{--                                    "</tr>";--}}

{{--                                $(". tbody").append(tr_str);--}}
{{--                            }--}}

{{--                        }--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}

{{--        </script>--}}
    @endpush


@endsection


