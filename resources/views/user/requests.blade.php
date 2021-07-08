@extends('Master_layout.app')
@section('content')

    <h3 class="page-title">
        My requests </h3>

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
                                {{$request->request=='E'?'E-book':''}}
                                {{$request->request=='H'?'H-book':''}}
                                {{$request->request=='C'?'Change book':''}}

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
