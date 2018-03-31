@extends('admin-home')
@section('setup')
<div class="container">

<div class="row">
<div class="col-md-8">
 
    @if ($questionData->type_quiz == 'radio')

  <form class="form-horizontal " method="POST" action="{{ route('addquestiondata') }}" enctype="multipart/form-data">

    {{ csrf_field() }}
    <input type="hidden" name="action" value="addquiz">
    @if (Auth::guard("admin_user")->user())
      <input type="hidden" name="user_id" value="{{Auth::guard('admin_user')->user()->id}}">
    @endif
    <input type="hidden" name="quiz_id" value="{{$quizData->id}}">
   
    <div class="form-group">
      <label for="Label" class="col-lg-6 col-md-6 control-label">{{$quizData->name}}</label>
      <label for="Label" class="col-lg-2 col-md-2 control-label">T.Q.  {{$quizData->questions->count()}}</label>
    </div>


    <div class="form-group">
      <label for="Label" class="col-lg-3 col-md-3 control-label">Answer 1 </label>
      <div class="col-md-7">
        <input type="text" id="answer1" name="answer1" class="form-control" required>
      </div>
      <div class="col-lg-1 col-md-1">
        <input type="text" class="form-control" id="score1" name="score1" placeholder="Score" >
      </div>
    </div>

   <div class="form-group">
      <label for="Label" class="col-lg-3 col-md-3 control-label">Answer 2 </label>
      <div class="col-md-7">
        <input type="text" id="answer2" name="answer2" class="form-control" required>
      </div>
      <div class="col-lg-1 col-md-1">
        <input type="text"  class="form-control" id="score2" name="score2" placeholder="Score" >
      </div>
   </div>          

    <div class="form-group">
      <label for="Label" class="col-lg-3 col-md-3 control-label">Answer 3 </label>
      <div class="col-md-7">
        <input type="text" id="answer3" name="answer3" class="form-control" required>
      </div>
      <div class="col-lg-1 col-md-1">
        <input type="text" class="form-control" id="score3" name="score3" placeholder="Score" >
      </div>
    </div>     
    
      <div class="form-group">
      <div class="col-lg-3 col-md-3 col-lg-offset-3 col-md-offset-3">
        <button type="submit"  value="submit" class="btn btn-warning">Save</button>
        <a href="{{route('viewquiz')}}" class="btn btn-warning">Cancel</a>
        {{-- <a href="{{route('addquiz')}}" class="btn btn-warning">Previous</a> --}}
      </div>
      </div>
      
  </form>
  @else
  
  <form class="form-horizontal " method="POST" action="{{route('addquestiondata_text')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
 
     <input type="hidden" name="action" value="addquiz">
     @if (Auth::guard("admin_user")->user())
       <input type="hidden" name="user_id" value="{{Auth::guard('admin_user')->user()->id}}">
     @endif
     <input type="hidden" name="quiz_id" value="{{$quizData->id}}">
     
     <div class="form-group">
       <label for="Label" class="col-lg-6 col-md-6 control-label">{{$quizData->name}}</label>
       <label for="Label" class="col-lg-2 col-md-2 control-label">T.Q.  {{$quizData->questions->count()}}</label>
     </div>
 
     <div class="form-group">
       <label for="Label" class="col-lg-3 col-md-3 control-label">Type question</label>
       <div class="col-md-7">
       <select id="type" name="type" class="form-control">
         <option id="radio" name="radio">radio</option>
         <option id="text" name="text" >text</option>
       </select>
       </div>
       {{--  <div class="col-md-7">
         <input type="text" id="type" name="type" class="form-control" >
       </div>  --}}
     </div> 
 
     <div class="form-group">
         <label for="Label" class="col-lg-3 col-md-3 control-label">Question</label>
         <div class="col-md-7">
         <input type="text" id="question" name="question" class="form-control" required>
         </div>
     </div> 
 
     <div class="form-group">
         <div class="col-lg-3 col-md-3 col-lg-offset-3 col-md-offset-3">
             <button type="submit"  value="submit" class="btn btn-warning">Save</button>
             {{-- <a href="{{route('viewquiz')}}" class="btn btn-warning">Cancel</a> --}}
             <a href="{{route('viewquiz')}}" class="btn btn-warning">Cancel</a>
         </div>
         </div> 
     </form>
  

@endif

</div>
</div>
</div>

@endsection