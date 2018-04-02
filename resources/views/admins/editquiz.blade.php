@extends('admin-home')
@section('setup')
<div class="conainer">
    <div class="row">
    <div class="col-lg-8 col-md-8">      
        <form class="form-horizontal " method="POST" action="/admin_home/quiz/{{$quizData->id}}/update" enctype="multipart/form-data">      
            {{ csrf_field() }}

            <input type="hidden" name="action" value="editquiz">
            @if (Auth::guard("admin_user")->user())
                <input type="hidden" name="user_id" value="{{Auth::guard('admin_user')->user()->id}}">
            @endif
            <input type="hidden" name="quiz_id" value="{{$quizData->id}}">

            <div class="form-group">
                <div class="form-group">
                    <label for="Label" class="col-lg-3 col-md-3 control-label">Name</label>
                    <div class="col-lg-7 col-md-7">
                    <input class="form-control" type="text" id="name" name="name" class="form-control" value="{{$quizData->name}}">
                    </div>
                </div>  
            </div>

            <div class="form-group">
            <label  for="Label" class="col-lg-3 col-md-3 control-label">Group </label>
                <div class="col-lg-7 col-md-7">
                    <select class="form-control" id="group" name="group">
                    @foreach($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                    </select>
                    <br>
                </div>
            </div> 

            <div class="form-group">
            <label for="Label" class="col-lg-7 col-md-7 control-label">Total Questions: {{$quizData->questions->count()}}</label>
            </div>  

            <div class="form-group">
                <div class="col-lg-3 col-md-3 col-lg-offset-3 col-md-offset-3">
                    <button type="submit"  value="Submit" class="btn btn-warning">Edit</button>
                    <a href="{{route('viewquiz')}}" class="btn btn-warning">Cancel</a>
                </div>
            </div>
        </form>

        <form method="POST" action="{{route('addnewqdata')}}">
            {{ csrf_field() }}
            <input type="hidden" name="quiz_id" value="{{$quizData->id}}">
            <input type="hidden" name="name" value="{{$quizData->name}}">
            <div class="form-group">
                <div class="col-lg-3 col-md-3 col-lg-offset-3 col-md-offset-3 ">
                    <button type="submit"  value="Submit" class="btn btn-warning">Add Question</button>
                </div>
            </div>
        </form>
      <!--delete question form -->    
        <form method="POST" action="/admin_home/quiz/{{$quizData->id}}/delete">
            {{ csrf_field() }}
            
            <div class="form-group">
            <div class="col-lg-3 col-md-3 col-lg-offset-3 col-md-offset-3 ">
                <button type="submit"  value="Submit" class="btn btn-warning">delete</button>
                </div>
            
            </div>
        </form>
    </div>
    </div>


    <?php $counterQuestions = 1?> 
    @foreach($quizData->questions as $question)
    <div class="row">
    <div class="col-lg-8 col-md-8">
    <!-- Editing question Form--> 
    <form class="form-horizontal " method="POST" action="/admin_home/question/{{$question->id}}/update" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="action" value="editquiz">
        @if (Auth::guard("admin_user")->user())
            <input type="hidden" name="user_id" value="{{Auth::guard('admin_user')->user()->id}}">
        @endif
        <input type="hidden" name="question_id" value="{{$question->id}}">
        <input type="hidden" name="quiz_id" value="{{$quizData->id}}">

        
        <div class="form-group">
            <label for="Label" class="col-lg-3 col-md-3 control-label">Question No: {{$counterQuestions}}/{{$quizData->questions->count()}}</label>
        </div>    

    <!--Question  --> 
        <div class="form-group">
            <label for="Label" class="col-lg-3 col-md-3 control-label">Question</label>
            <div class="col-lg-6 col-md-6">
            <input class="form-control" type="text" id="question" name="question" class="form-control" value="{{$question->question}}">
            </div>
        </div>  

        <?php $counter = 1?>   
        @foreach($question->answers as $answer)

    <!--Answer  --> 
        <input type="hidden" name="answer_id{{$counter}}" value="{{$answer->id}}">
        <div class="form-group">
            <label for="Label" class="col-lg-3 col-md-3 control-label">Answer {{$counter}} </label>
            <div class="col-lg-6 col-md-6">
                <input class="form-control" type="text" id="answer{{$counter}}" name="answer{{$counter}}" class="form-control" value="{{$answer->answer}}" >
            </div>
            <div class="col-lg-2 col-md-2">
                <input class="form-control" type="text" class="form-control" id="score{{$counter}}" name="score{{$counter}}" placeholder="Score" value="{{$answer->score}}" >
            </div>
        </div>
    <?php $counter =$counter+1?>  
    @endforeach   
    
    <!--submit -->     
        <div class="form-group">
        <div class="col-lg-3 col-md-3 col-lg-offset-3 col-md-offset-3 ">
            <button type="submit"  value="Submit" class="btn btn-warning">Save</button>
        </div>
        
        </div>
        
    </form>
    <!--delete question form  -->    
    
    <form method="POST" action="/admin_home/question/{{$question->id}}/delete">
        {{ csrf_field() }}

        <input type="hidden" name="question_id" value="{{$question->id}}">
        <input type="hidden" name="quiz_id" value="{{$quizData->id}}">
        
        <div class="form-group">
        <div class="col-lg-3 col-md-3 col-lg-offset-3 col-md-offset-3 ">
            <button type="submit"  value="Submit" class="btn btn-warning">delete</button>
        </div>
        
        </div>
    </form>
   </div>
    </div>
</div>
<?php $counterQuestions = $counterQuestions + 1?> 
@endforeach



 

@endsection