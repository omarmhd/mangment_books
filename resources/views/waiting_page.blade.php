
@extends('Master_layout.app')

@section('content')
<h3 class="page-title" style="color: orange">
    Waiting page
</h3>
<hr>

<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12 page-500">

        <div class="note note-danger">
            <h4 class="block">            Welcome {{$name}}!
            </h4>
            <p>
                wait a little, your membership is under review by Administration , please  return at a later time.           </p>
        </div>    </div>
</div>

@endsection
