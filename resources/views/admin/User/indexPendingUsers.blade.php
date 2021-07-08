

@extends('Master_layout.app')
@section('content')

    <h3 class="page-title">
      Pending users    </h3>

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

                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <th>
                                Avatar
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Role
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Accept
                            </th>
                            <th>
                                Delete
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <a target="_blank" href="{{asset('files')}}/{{$user->image}}"><img width="80px" src="{{asset('files')}}/{{$user->image}}" alt=""> </a>
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->phone}}
                                </td>
                                <td class="center">
                                    {{$user->role}}
                                </td>
                                <td class="center">
                                    {{$user->email}}
                                </td>
                                <td>
                                    <a class="" href="{{route( 'updatePendingUsers',['id'=>$user->id])}}">
                                        Accept </a>
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


