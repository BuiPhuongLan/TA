@extends('admin-home')
@section('setup')

<div class="container">
 
<div class="row">
  <div class="col-md-7">
    @include('errors')
  <form class="form-horizontal " method="POST" action="{{route('show_score_group')}}" enctype="multipart/form-data">

    {{ csrf_field() }}
    
    @if (Auth::guard("admin_user")->user())
      <input type="hidden" name="user_id" value="{{Auth::guard('admin_user')->user()->id}}">
    @endif

    <div class="form-group">
      <label for="MSSV" class="col-lg-3 col-md-3 control-label">Group</label>
      <div class="col-md-7">
        <input type="text" name="group" id="group"  class="form-control" required>
        
      </div>
    </div>

    
    
    <div class="form-group">
      <div class="col-lg-3 col-md-3 col-lg-offset-3 col-md-offset-3">
        <button type="submit"  value="Submit" class="btn btn-warning">Submit</button>
        <a href="{{route('view_result')}}" class="btn btn-warning">Previous</a>
      </div>
    </div>
      
  </form>
  </div>
  </div>
</div>


@endsection