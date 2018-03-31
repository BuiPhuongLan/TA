@extends('admin-home')
@section('setup')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Student</div>

                <div class="panel-body">
                    <a href="{{ route('create')}}">Add New Group</a>
                </div>
                
                <div class="panel-body">
                    <a href="{{ route('add_student')}}">Add Student</a>
                </div>

                <div class="panel-body">
                    <a href="{{ route('delete_student')}}">Delete Student</a>
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection