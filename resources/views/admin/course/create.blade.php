@extends('Master_layout.app')
@section('content')



    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" >
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
        Manegment Courses
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Mangement Users</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Create user</a>
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
                        <span class="caption-subject bold uppercase">Create course</span>
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
                    <form role="form" action="{{route('course.store')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                      <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="name">
                                            <label for="form_control_1">Course name </label>
{{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="fa fa-book"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="number" class="form-control" name="number_course">
                                            <label for="form_control_1">number course</label>
                                            {{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="fa fa-barcode"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="description">
                                            <label for="form_control_1">description</label>
                                            {{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="icon-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group form-md-line-input has-info">
                                <select class="form-control" id="form_control_1" name="user_id">
                                    <option value=""  selected disabled="disabled">Choose teacher</option>
                                   @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                                <label for="form_control_1">Course teacher</label>
                            </div>


                        </div>
                        <div class="form-actions noborder">
                            <button type="submit" class="btn blue">Submit</button>
                            <a  href="{{route('course.index')}}" class="btn default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->

        </div>
    </div>

@endsection
