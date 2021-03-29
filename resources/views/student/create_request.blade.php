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
                <a href="#">Create request</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">

        <div class="col-md-9">
            <!-- BEGIN SAMPLE FORM PORTLET-->

            <!-- END SAMPLE FORM PORTLET-->
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <span class="caption-subject bold uppercase">Create request</span>
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
                    <form role="form" action="{{route('request.store')}}" method="post" >
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-5">

                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input readonly type="text" class="form-control" value="{{$book->name}}"  name="name">
                                            <input type="hidden" name="book_id" value="{{$book->id}}" >
                                            <label for="form_control_1">Book  name </label>
                                            {{--                                              <span class="help-block">Some help goes here...</span>--}}
                                            <i class="fa fa-book"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input readonly type="text" class="form-control"  name="date" value="{{$date}}">
                                            <label for="form_control_1">Date request</label>
                                            <i class="fa fa-book"></i>
                                        </div>
                                    </div>
                            </div>

                                <div class="col-md-5">
                                    <div class="form-group form-md-line-input has-info ">
                                        <select class="form-control request" id="form_control_1" name="request_type">
                                            <option    value="E">E-book</option>
                                            <option    value="H">h-book</option>
                                            <option    value="C">change book</option>
                                        </select>
                                        <label for="form_control_1">Request</label>
                                    </div>


                                </div>

                                <div class="col-md-5">

                                    <div class="form-group form-md-line-input has-success form-md-floating-label NewBook"  style="display: none">
                                        <div class="input-icon">
                                            <input  type="text" class="form-control"  name="new_book" >

                                            <label for="form_control_1">New Book</label>
                                            {{--                                              <span class="help-block">Some help goes here...</span>--}}
                                            <i class="fa fa-book"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5" >
                                    <div class="form-group form-md-line-input has-success form-md-floating-label NewBookLink"  style="display: none">
                                        <div class="input-icon">
                                            <input  type="text" class="form-control"  name="new_book_link" >

                                            <label for="form_control_1">New book link</label>
                                            <i class="fa fa-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-actions noborder">
                            <button type="submit" class="btn blue">Submit</button>
                            <a  href="" class="btn default">Cancel</a>

                        </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->

        </div>
    </div>

    @push('script')
        <script>
            $(function(){

                $('.request').change(function (){



                    if('C'==$(this).val()) {
                        $(".NewBook").show();
                        $(".NewBookLink").show();

                    }else{
                        $(".NewBook").hide();
                        $(".NewBookLink").hide();

                    }

                })});

        </script>
    @endpush

@endsection
