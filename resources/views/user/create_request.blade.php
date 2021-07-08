@extends('Master_layout.app')
@section('content')



    <h3 class="page-title">
Add new request
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="#">My profile</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#"> Add new request</a>
                <i class="fa fa-angle-right"></i>
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

                                            @if(auth()->user()->role=='Faculty')
                                            <option    value="C">change book</option>
                                            @endif
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
