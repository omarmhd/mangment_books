@extends('Master_layout.app')
@section('content')

    <h3 class="page-title">
     Reserved books</small>
    </h3>

    <div class="row">
        <div class="col-md-9">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i> Table Books
                    </div>

                </div>
                <div class="portlet-body" style="">
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                            <tr>

                                <th>
                                    Book name
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
                            </tr>
                            </thead>
                            <tbody>

                            @if($book_user==null)
                                <tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No data available in table</td></tr>
                                @endif

                            @foreach($book_user as $bookuser )
                                <tr>
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
                                            <span class="btn-danger">Please take the book from the library</span>
                                        @endif


                                        @if($bookuser->status=='2')
                                            <span  class="bg-success">  received</span>
                                        @endif
                                    </td>


                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>

    </div>


@endsection
