@extends('Master_layout.app')
@section('content')

    <h3 class="page-title">
        Management users
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('dashboard')}}">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>

            <li>
                <a href="#">management users</a>
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
                        <i class="fa fa-edit"></i>users table
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="javascript:;" class="reload">
                        </a>

                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a id="" class="btn green" href="{{route('user.create')}}" >
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
                            @can('super_privileges')
                            <th>
                         Action
                            </th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <a target="_blank" href="{{asset('files')}}/{{$user->image}}"><img width="80px" src="{{asset('files')}}/{{$user->image}}" alt=""> </a>
                            </td>
                            <td>

                                {{$user->role=='Student'?"$user->name($user->student_id)":"$user->name"}}
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
                                @can('super_privileges')

                                <a class="btn btn-info" href="{{route('user.edit',['user'=>$user])}}">
                                    Edit </a>


                                <a class="btn btn-danger" href="{{route('user.destroy.get',['id'=>$user->id])}}">
                                    Delete </a>
                                @endcan
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


