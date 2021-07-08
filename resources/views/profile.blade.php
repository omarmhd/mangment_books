
@extends('Master_layout.app')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<h3 class="page-title">
    My profile </h3>
<div class="page-bar">


</div>

<div class="row margin-top-20">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="{{asset('files')}}/{{$user->image}}" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{$user->name}}

                   </div>
                    <div class="profile-usertitle-job">
                        {{$user->role}}
                    </div>
                </div>

            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <div class="portlet light">
                <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title">
                            {{$count_pending}}
                        </div>
                        <div class="uppercase profile-stat-text">
                            Pending requests
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title">
                            {{$count_accepted}}
                        </div>
                        <div class="uppercase profile-stat-text">
                            Requests accepted
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title">
                            {{$count_rejected}}
                        </div>
                        <div class="uppercase profile-stat-text">
                            Requests rejected
                        </div>
                    </div>
                </div>
                <!-- END STAT -->

            </div>
            <!-- END PORTLET MAIN -->
        </div>


        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                </li>

                                <li>
                                    <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                </li>

                            </ul>
                        </div>
                        <div class="portlet-body">
                            <form role="form" action="{{route('user.update',['user'=>$user])}}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->

                                <div class="tab-pane active" id="tab_1_1">


                                        <div class="form-group">
                                            <label class="control-label"> Name</label>
                                            <input type="text"  NAME="name" value="{{$user->name}}" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">email</label>
                                            <input type="email"  class="form-control" value="{{$user->email}}" name="email"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Phone</label>
                                            <input type="number" value="{{$user->phone}}" name="phone"  class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Avatar</label>
                                            <input type="file" name="image"  class="form-control"/>
                                        </div>

                                        <div class="margiv-top-10">
                                            <input type="submit" name="user_request" href="javascript:;" class="btn green-haze">
                                        </div>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane" id="tab_1_3">


                                        <div class="form-group">
                                            <label class="control-label">New Password</label>
                                            <input type="password" name="password" class="form-control"/>
                                        </div>

                                        <div class="margin-top-10">

                                            <input type="submit"  name="user_request" href="javascript:;" class="btn green-haze">

                                        </div>

                                </div>

                                <!-- END CHANGE PASSWORD TAB -->

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
@endsection
