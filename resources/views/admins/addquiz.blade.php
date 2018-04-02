@extends('admin-home')
@section('setup')

<div class="container">
 
<div class="row">
  <div class="col-md-7">

  <form class="form-horizontal " method="POST" action="{{route('addquizdata')}}" enctype="multipart/form-data">

    {{ csrf_field() }}
    <input type="hidden" name="action" value="addquiz">
    
    @if (Auth::guard("admin_user")->user())
      <input type="hidden" name="user_id" value="{{Auth::guard('admin_user')->user()->id}}">
    @endif

    <div class="form-group">
      <label for="Label" class="col-lg-3 col-md-3 control-label">Name</label>
      <div class="col-md-7">
        <input type="text" name="name" id="name"  class="form-control" required>
        
      </div>
    </div>  

    

    {{-- <div class="form-group">
      <label  for="Label" class="col-lg-3 col-md-3 control-label">Group </label>
      <div class="col-md-7">
        <select class="form-control" id="group" name="group">
          @foreach($groups as $group)
            <option value="{{$group->id}}">{{$group->name}}</option>
          @endforeach
        </select>
        <br>
      </div>
    </div>  --}}

    
    <div class="form-group">
      <div class="col-lg-3 col-md-3 col-lg-offset-3 col-md-offset-3">
        <button type="submit"  value="Submit" class="btn btn-warning">Next</button>
      </div>
    </div>
      
  </form>
<!-- ****************** END adding product form ****************** --> </div>
  </div>
</div>


@endsection