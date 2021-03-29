@extends('Master_layout.app')
@section('content')
    <h3 class="page-title">
        Portfolio <small>4,3,2 columns portfolio</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Extra</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Actions <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">Action</a>
                    </li>
                    <li>
                        <a href="#">Another action</a>
                    </li>
                    <li>
                        <a href="#">Something else here</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable-line boxless">

                <div class="tab-content">
                    <div class="tab-pane active"  id="tab_1">
                        <!-- BEGIN FILTER -->
                        <div class="margin-top-10">
                            <ul class="mix-filter">
                                <li class="filter active" data-filter="ALL">
                                  All
                                </li>

                                @foreach ($categories as $category)

                                <li class="filter" data-filter="{{$category->name}}">
                                    {{$category->name}}
                                </li>
                                @endforeach


                            </ul>
                            <div class="row mix-grid">
                            @foreach ($categories as $category)
                            @foreach ($category->books as $book)



                                <div class="col-md-2 col-sm-4 mix ALL {{$category->name}}">
                                    <div class="mix-inner">
                                        <img class="img-responsive" width="100%" src="{{asset('files')}}/{{$book->cover}}" alt="{{$book->name}}">
                                        <div class="mix-details">
                                            <h4>{{$book->name}}</h4>
                                            <a class="mix-link btn btn-primary" href=""  data-toggle="modal" data-target="#exampleModalCenter{{$book->id}}" >
                                                <i class="fa fa-file-excel-o"></i>
                                            </a>
                                            <a class="mix-link btn btn-primary"  title="rw" STYLE="top: 110px"  href=""  data-toggle="modal" data-target="#request" >
                                                <i class="fa fa-send"></i>
                                            </a>
                                            <a class="mix-preview fancybox-button" href="{{asset('files')}}/{{$book->cover}}" title="{{$book->description}}"data-rel="fancybox-button">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            @if($requests_to_check)


                                                @foreach ($requests as $request_book)
                                                    @if($request_book->book->id==$book->id and $request_book->status=='1' )

                                                        <a class="mix-preview btn btn-primary"  data-toggle="modal"  STYLE="top: 110px" href= {{asset('files')}}/{{$book->file}}  >
                                                        <i class="fa fa-download"></i>
                                                        </a>
                                                    @else
                                                        <a class="mix-preview btn btn-primary"  data-toggle="modal" data-target="{{$book->type_delivery=='Hard'?'#Hard':''}}" STYLE="top: 110px" href=@if($book->type_delivery=='Hard')   @else{{asset('files')}}/{{$book->file}} @endif >
                                                        <i class="fa fa-download"></i> </a>
                                                    @endif
                                                @endforeach
                                            @else
                                                <a class="mix-preview btn btn-primary"  data-toggle="modal" data-target="{{$book->type_delivery=='Hard'?'#Hard':''}}" STYLE="top: 110px" href=@if($book->type_delivery=='Hard')   @else{{asset('files')}}/{{$book->file}} @endif >
                                                <i class="fa fa-download"></i> </a>

                                            @endif


                                        </div>
                                    </div>
                                </div>

                                        <div class="modal fade" id="Hard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-blue-dark">
                                                        <h3 class="modal-title " id="exampleModalLongTitle"> <i class="fa fa-info"></i> info</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        The book is available in hard copy or e-copy.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="modal fade" id="request" tabindex="-1" data-rel="back" role="dialog" aria-labelledby="request" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-blue-dark text-white">
                                                        <h4 class="modal-title "  id="exampleModalLongTitle"> <i class="fa fa-send"></i> Request</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>



                                                    <div class="modal-body">
                                                        <h4> {{$requests_to_check?'You have a previous request , please check the status of your request on the requests page':'Do you want to request an e-copy or a h-copy?'}}</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        @if($requests_to_check==null)
                                                        <a href="{{route('request.create',['id'=>$book->id])}}" class="btn btn-success" >Yes</a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                         @endif

                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="modal fade" id="exampleModalCenter{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-blue-dark">
                                                    <h4 class="modal-title"   id="exampleModalLongTitle"> <i class="fa fa-book"></i> About the {{$book->name}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>ذ
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <h5> Author</h5>
                                                    <p>{{$book->author}}</p>
                                                    <hr>
                                                    <h5>Published by</h5>
                                                    <p>{{$book->published_by}}</p>
                                                    <hr>
                                                    <h5>Number pages</h5>
                                                    <p>{{$book->number_pages}}</p>
                                                    <hr><h5>Number copies</h5>
                                                    <p>{{$book->number_copies}}</p>
                                                    <hr><h5>Description</h5>
                                                    <p>{{$book->description}}</p>
                                                    <hr>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            @endforeach
                            @endforeach

                            </div>
                        </div>
                        <!-- END FILTER -->
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

