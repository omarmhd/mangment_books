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
                    <form role="form" action="{{route('admin.updateReservedBook.update',['id'=>$user_book->id])}}" method="post" >
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-5">

                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <label for="form_cont_1rol">Book  name </label>

                                        <div class="input-icon">
                                            <select class="selectpicker" data-live-search="true" name="book_id">
                                                <option selected disabled >Nothing Selected </option>

                                                @foreach($books as $book)
                                                    <option {{$book->id==$user_book->book_id?'selected':''}}  value="{{$book->id}}">{{$book->name}}</option>
                                                @endforeach

                                            </select>
                                            {{--                                              <span class="help-block">Some help goes here...</span>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <label for="form_cont_1rol">User Name</label>

                                        <div class="input-icon">

                                            <select class="selectpicker" data-live-search="true" name="user_id">

                                                <option selected disabled >Nothing Selected </option>

                                                @foreach($users as $user)
                                                    <option   {{$user->id==$user_book->user_id?'selected':''}} data-tokens="ketchup mustard" value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <label for="form_control_1">Collection appointment</label>

                                        <div class="input-icon">
                                            <input  type="date" class="form-control"  value="{{$user_book->collection_appointment}}" name="collection_appointment">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-5">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <label for="form_control_1">Notes</label>

                                        <div class="input-icon">
                                            <input  type="text" class="form-control"  value="{{$user_book->note}}"  name="note" >
                                            <i class="fa fa-file"></i>

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


@endsection
