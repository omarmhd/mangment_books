

    @extends('Master_layout.app')
@section('content')



    <!-- /.modal -->
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN STYLE CUSTOMIZER -->
    <!-- END STYLE CUSTOMIZER -->
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Management books
    </h3>

    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>Books table
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a id="" class="btn green" href="{{route('book.create')}}" >
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
                                id
                            </th>
                            <th>
                                Book  Name
                            </th>
                            <th>
                                Course
                            </th>
                            <th>
                                Details
                            </th>
                            <th>
                                Action
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>
                                {{$book->id}}

                            </td>
                            <td>
                            {{$book->name}}
                            </td>
                            <td>
                                {{$book->category->name}}
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$book->id}}">click here

                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label"> Book name:</label>
                                                    <input type="text" value="{{$book->name}}" disabled class="form-control" id="recipient-name">
                                                </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                    <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Number copies:</label>
                                                        <input type="text" value="{{$book->number_copies}}" disabled class="form-control" id="recipient-name">
                                                   </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Author:</label>
                                                            <input type="text" value="{{$book->author}}" disabled class="form-control" id="recipient-name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Published by:</label>
                                                            <input type="text" value="{{$book->published_by}}" disabled class="form-control" id="recipient-name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Delivery date:</label>
                                                            <input type="text" value="{{$book->delivery_date}}" disabled class="form-control" id="recipient-name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Number pages:</label>
                                                            <input type="text" value="{{$book->number_pages}}" disabled class="form-control" id="recipient-name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Description:</label>
                                                            <textarea disabled class="form-control" id="message-text"> {{$book->description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Category name :</label>
                                                            <input type="text"  value="{{$book->category->name}}" disabled class="form-control" id="message-text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">cover book:</label>
                                                            <p><i class="icon-picture"></i>  <a target="_blank" href="{{asset('files/')}}/{{ $book->cover}}" >{{ $book->cover}}</a> </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">book:</label>
                                                            <p><i class="node-icon-handle"></i> <a href="{{asset('files/')}}/{{ $book->file}}" >{{ $book->file}}</a></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                           </td>

                            <td>
                                <a class="btn btn-info" href="{{route('book.edit',['book'=>$book])}}">
                                    Edit </a>

                                <form style="display: inline" action="{{route('book.destroy',['book'=>$book->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                <input  type="submit" value="delete" class="btn btn-danger">
                                </form>
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


