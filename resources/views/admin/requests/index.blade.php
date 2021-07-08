

@extends('Master_layout.app')
@section('content')


    <h3 class="page-title">
        Manegment  Requests</h3>



    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>Table Requests
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

                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                Book name
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



                        @foreach($requests as $request)
                            <tr>
                                <td>
                                    {{$request->id}}
                                </td>
                                <td>
                                    {{$request->book->name}}
                                </td>
                                <td>
                                    {{$request->request=='E' ?'E-book':''}}
                                    {{$request->request=='H' ?'H-book':''}}

                                    @if($request->request=='C')
                                        <a class="" data-toggle="modal" data-target="#exampleModalCenter{{$request->id}}">Change book </a>


                                    @endif



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

                                        <a title="accept" class="btn margin-right-10" style="background-color: #12f302"  href=" {{route('admin.request.update_status',['id'=>$request->id,'status'=>'1'])}}">
                                            <i style="color: #fff6a1" class="fa  fa-check-square-o">
                                            </i>
                                        </a>
                                    <a title="reject" class="btn margin-right-10" style="background-color: #f38702" href=" {{route('admin.request.update_status',['id'=>$request->id,'status'=>'0'])}}">
                                        <i style="color: #fff6a1" class="fa  fa-times-circle">
                                        </i>
                                    </a>




                                </td>

                            </tr>
                            <div class="modal fade" id="exampleModalCenter{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Change Book to </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">New book:</label>
                                                        <input type="text" value="{{$request->new_book}}"  readonly class="form-control" id="recipient-name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">New book link Or Details :</label>
                                                        <input type="text" value="{{$request->new_book_link}}" disabled class="form-control" id="recipient-name">
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>                           </td>

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


