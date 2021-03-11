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

                                @foreach ($courses as $course)

                                <li class="filter" data-filter="{{$course->name}}">
                                    {{$course->name}}
                                </li>
                                @endforeach


                            </ul>
                            <div class="row mix-grid">
                            @foreach ($courses as $course)
                            @foreach ($course->books as $book)


                                <div class="col-md-4 col-sm-4 mix ALL {{$course->name}}">
                                    <div class="mix-inner">
                                        <img class="img-responsive"  width="800px" src="{{asset('files')}}/{{$book->cover}}" alt="{{$book->name}}">
                                        <div class="mix-details">
                                            <h4>{{$book->name}}</h4>
                                            <a class="mix-link btn btn-primary" href=""  data-toggle="modal" data-target="#exampleModalCenter{{$book->id}}" >
                                                <i class="fa fa-file-excel-o"></i>
                                            </a>

                                            <a class="mix-preview fancybox-button" href="{{asset('files')}}/{{$book->cover}}" title="{{$book->description}}"data-rel="fancybox-button">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <a class="mix-preview btn btn-primary" STYLE="top: 110px" href="{{asset('files')}}/{{$book->file}}"  >
                                                   <i class="fa fa-download"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>


                                    <div class="modal fade" id="exampleModalCenter{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">About the {{$book->name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
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
                                                    <button type="button" class="btn btn-primary">Save changes</button>
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

