@extends('Master_layout.app')
@section('content')



    <!-- /.modal -->
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN STYLE CUSTOMIZER -->
    <!-- END STYLE CUSTOMIZER -->
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Mangement Users
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="">Mangement Users</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Edit user</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">

        <div class="col-md-9 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->

            <!-- END SAMPLE FORM PORTLET-->
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <span class="caption-subject bold uppercase">Edit user</span>
                    </div>
                    <div class="actions">

                        <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                            <i class="icon-trash"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" action="{{route('user.update',['user'=>$user])}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('Put')

                      <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                            <label for="form_control_1">User name </label>
{{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                            <label for="form_control_1">Email</label>
                                            {{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="icon-envelope-open"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="number" class="form-control" name="phone" value="{{$user->phone}}">
                                            <label for="form_control_1">Phone</label>
                                            {{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="glyphicon-phone"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="password" >
                                            <label for="form_control_1">Password</label>
                                            {{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="icon-key"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group form-md-line-input has-info">
                                <select  class="form-control" id="form_control_1" name="role" value="{{$user->role}}">
                                    <option   disabled="disabled">Choose Role</option>
                                    <option value="1" >Adminstrator</option>
                                    <option value="2">Bookstore Manager</option>
                                    <option value="3">Dept Chairs</option>
                                    <option value="4">Faculty</option>
                                    <option value="5">Dean</option>
                                    <option value="6">Student</option>


                                </select>
                                <label for="form_control_1">Role</label>
                            </div>
                          <div class="form-group form-md-line-input has-info">

                              <select class="form-control selectpicker " multiple name="course_id[]">
                                  @foreach($courses as $course)
                                      <option   @foreach($user->courses as $course_user) {{$course_user->id==$course->id?'selected':''}}@endforeach  value="{{$course->id}}">{{$course->name}}</option>

                                  @endforeach
                              </select>
                              <label for="form_control_1">course</label>

                          </div>

                            <div class="form-group form-md-line-input has-info">
                                <input type="file" id="exampleInputFile1" class="form-control" name="image">
                                <label for="form_control_1">Personal picture</label>

                            </div>
                        </div>
                        <div class="form-actions noborder">
                            <button type="submit" class="btn blue">Submit</button>
                            <a  href="{{route('user.index')}}" class="btn default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->

        </div>
    </div>

@endsection
