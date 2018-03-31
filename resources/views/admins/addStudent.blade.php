@extends('admin-home')
@section('setup')

<div class="container">
 
<div class="row">
  <div class="col-md-7">
    @include('errors')
  <form class="form-horizontal " method="POST" action="{{route('addInforStudent')}}" enctype="multipart/form-data">

    {{ csrf_field() }}
    
    @if (Auth::guard("admin_user")->user())
      <input type="hidden" name="user_id" value="{{Auth::guard('admin_user')->user()->id}}">
    @endif

    <div class="form-group">
            <label for="MSSV" class="col-lg-3 col-md-3 control-label">MSSV</label>
            <div class="col-md-7">
              <input type="text" name="MSSV" id="MSSV"  class="form-control" required>
              
            </div>
          </div>

    <div class="form-group">
      <label for="Label" class="col-lg-3 col-md-3 control-label">Name</label>
      <div class="col-md-7">
        <input type="text" name="name" id="name"  class="form-control" required>
        
      </div>
    </div>
    
    <div class="form-group">
      <label for="Label" class="col-lg-3 col-md-3 control-label">Email address</label>
      <div class="col-md-7">
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
      </div>
    </div>

    <div class="form-group">
      <label for="Label" class="col-lg-3 col-md-3 control-label">Password</label>
      <div class="col-md-7">
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
    </div>

    <div class="form-group">
      <label  for="Label" class="col-lg-3 col-md-3 control-label">Group </label>
      <div class="col-md-7">
        <select class="form-control" id="group" name="group">
          @foreach($groups as $group)
            <option value="{{$group->id}}">{{$group->name}}</option>
          @endforeach
        </select>
        <br>
      </div>
    </div> 

    
    <div class="form-group">
      <div class="col-lg-3 col-md-3 col-lg-offset-3 col-md-offset-3">
        <button type="submit"  value="Submit" class="btn btn-warning">Submit</button>
      </div>
    </div>
      
  </form>
  </div>
  </div>
</div>


@endsection