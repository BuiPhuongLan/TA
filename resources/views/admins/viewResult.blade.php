@extends('admin-home')
@section('setup')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">View result</div>

                <div class="panel-body">
                    <a href="{{ route('view_score')}}">View score of indivitual</a>
                </div>

                <div class="panel-body">
                    <a href="{{ route('view_score_group')}}">View score of group</a>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection