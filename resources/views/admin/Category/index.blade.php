

    @extends('Master_layout.app')
@section('content')



    <!-- /.modal -->
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN STYLE CUSTOMIZER -->
    <!-- END STYLE CUSTOMIZER -->
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        Mangment categories
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{route('dashboard')}}">dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>

            <li>
                <a href="#">Mangment categories </a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>categories table
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a id="" class="btn green" href="{{route('Category.create')}}" >
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
                                Number
                            </th>
                            <th>
                                Name category
                            </th>

                            <th>
                                Description
                            </th>

                            <th>
                               Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->number_category}}
                            </td>
                            <td>
                                {{$category->name}}
                            </td>

                            <td>
                                {{$category->description}}
                            </td>
                            <td>
                                <a   class="btn btn-info" href="{{route( 'Category.edit',['Category'=>$category])}}">
                                    Edit </a>


                            <form  style="display: inline" action="{{route('Category.destroy',['Category'=>$category->id])}}" method="post">
                                @method('delete')
                                @csrf
                                <input type='submit'  value="Delete" class="btn btn-danger">
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


