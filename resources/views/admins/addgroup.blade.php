@extends('admin-home')
@section('setup')
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12">
<!-- add tag ************************************************ -->
    <form class="form-horizontal "  method="POST" action="{{ route('add_group') }}">
 <fieldset>
        {{ csrf_field() }}
        <input type="hidden" name="action" value="addgroup">

         <div class="form-group">
          <div class="col-md-7">
         <label for="inputTag" class="col-lg-3 col-md-3 control-label" >Add Group </label>    
           <div class="col-lg-6 col-md-6">

            <input type="text" class="form-control" placeholder="" id="newGroup" name="newGroup">
            <br>
            </div>
             
            <div class="col-lg-3 col-md-3">

            <button style="submit" class=" btn btn-warning ">add</button>
           </div>
        </div>
        </div>
        
      
       </fieldset>
    </form>
<!-- Update tag ************************************************ -->
  <form class="form-horizontal " method="POST" action="{{ route('add_group') }}">
   <fieldset>
      {{ csrf_field() }}
      <input type="hidden" name="action" value="updategroup">
      
      
      <div class="form-group">
      <div class="col-md-7">
        <label  class="col-lg-3 col-md-3 control-label" >Update Group </label>
        <div class="col-lg-6 col-md-6">
          <select class="form-control" id="groupToUpdate" name="groupToUpdate">
          @foreach($groups as $group)
          <option value="{{$group->id}}">{{$group->name}}</option>
          @endforeach
        </select
        </div>
        
        </div>
        </div>
    </fieldset>
  </form>

 
</div>
</div>
</div>
<script>
$(document).ready(function() {
var t =  $('#groupForsub').val();
getsubgroups(t);
});

$('#groupForsub').change(function() {
var t =  $('#groupForsub').val();
 
getsubgroups(t);



});
/*
function getsubtags(id){
$.post('/add/Dsubtags', {"id":id,'_token':$('input[name=_token]').val()}, function(data) {
  $('#subtagToRemove').html(data);
  
});
*/
}
</script> 
@endsection