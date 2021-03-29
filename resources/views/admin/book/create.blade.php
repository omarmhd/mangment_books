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
        Mangement books
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Mangement books</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Create book</a>
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
                        <span class="caption-subject bold uppercase">Create user</span>
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
                    <form role="form" action="{{route('book.store')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                      <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="name">
                                            <label for="form_control_1">Name book</label>
                 {{--     <span class="help-block">Some help goes here...</span>--}}
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="number" min="0" class="form-control" name="number_copies">
                                            <label for="form_control_1">   Number copies</label>


                                            {{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="icon-envelope-open"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="author">
                                            <label for="form_control_1">Author</label>
                                            {{-- <span class="help-block">Some help goes here...</span>--}}
                                            <i class="glyphicon-phone"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="published_by">
                                            <label for="form_control_1">Published by</label>
                                            {{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="glyphicon-phone"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="number" min="0" class="form-control" name="number_pages">
                                            <label for="form_control_1">Number pages</label>
                                            {{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="icon-key"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="description">
                                            <label for="form_control_1">Description</label>
                                            {{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="icon-key"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="publish_year" min="0" pattern="\d*" maxlength="4">
                                            <label for="form_control_1">Publish year</label>
                                            {{--                                            <span class="help-block">Some help goes here...</span>--}}
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success form-md-floating-label delivery_date">
                                        <div class="input-icon">
                                            <input type="date" class="form-control" name="delivery_date">
                                            <label for="form_control_1">Delivery date</label>
                                            {{--                                            <span class="help-block">Some help goes here...</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <div class="form-group form-md-radios">
                              <label>Checkboxes</label>
                              <div class="md-radio-inline">
                                  <div class="md-radio">
                                      <input type="radio" value="Electronic" id="radio6" onclick="myFunction()" name="type_delivery" class="md-radiobtn" >
                                      <label for="radio6">       <span class="inc"></span>
                                          <span class="check"></span>
                                          <span class="box"></span> Electronic book </label>

                                  </div>
                                  <div class="md-radio">
                                      <input type="radio"value="Hard" id="radio7" name="type_delivery" class="md-radiobtn" checked="">
                                      <label for="radio7">   <span class="inc"></span>
                                          <span class="check"></span>
                                          <span class="box"></span>Hard book</label>

                                  </div>

                              </div>
                          </div>
                          <div class="form-group form-md-line-input has-info">
                              <select class="form-control" id="form_control_1" name="category_id" >
                                  <option value=""  selected disabled="disabled">Choose category</option>
                                  @foreach($categories as $category)
                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                              </select>
                              <label for="form_control_1">categories </label>
                          </div>

                          <div class="form-group form-md-line-input has-info"   >
                              <input type="file" class="form-control" name="cover" required  >
                              <label for="form_control_1">Cover book</label>

                          </div>
                            <div class="form-group form-md-line-input has-info" id="Upload" >
                                <input type="file" class="form-control book" name="file"   >
                                <label for="form_control_1">Upload book</label>

                            </div>

                        </div>
                        <div class="form-actions noborder">
                            <button type="submit" class="btn blue">Submit</button>
                            <a  href="{{route('book.index')}}" class="btn default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->

        </div>
    </div>
@push('script')
    <script>
        $(".md-radiobtn").change(function (){

            if($(this).val()=="Electronic")
            {
                $("#Upload").show();
                $(".delivery_date").hide();
                $('.book').attr('required','true');

            }
            else
            {
                $(".delivery_date").show();

            }

        });

    </script>
@endpush
@endsection
