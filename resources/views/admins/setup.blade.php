@extends('admin-home')
@section('setup')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Setup question</div>

                {{-- <div class="panel-body">
                    <a href="{{ route('create')}}">Add Group</a>
                </div> --}}
                
                <div class="panel-body">
                    <a href="{{ route('addquiz')}}">Add new quiz</a>
                </div>
                <div class="panel-body">
                    <a href="{{ route('viewquiz')}}">Edit quiz</a>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection