<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Question;
use App\User;
use App\AdminUser;
use App\Result;
use App\Answer;
use App\quizTitle;
use App\Group;
use Auth;

class QuestionController extends Controller
{
    //Student

    // public function index(){
    //     $questions = Question::simplePaginate(6);
    //     $users = User::all();
    //     $id_nhom = Auth::user()->nhom;
    //     $dem = 1;
    //     //$count = DB::table('questions')->count();
    //     // $questions = DB::table('questions')->simplePaginate(2);
    //     return view('student.survey', compact('questions','users','id_nhom','dem'));
    // }

    //Admin

    public function index(){
        $groups = Group::all();
        $quizzes = quizTitle::paginate(10);
        return view('admins.viewquiz',compact('groups','quizzes'));
    }
    
    public function showquiz($id){
        $groups = Group::all();
        $quizzes = quizTitle::find($id);
        return view('admins.quiz',compact('groups','quizzes'));
    }

    public function setup(){
        return view('admins.setup',compact('$admin'));
    }
    public function addquiz(){
        $groups = Group::all();
        return view('admins.addquiz',compact('groups'));
    }
    public function addQuizData(Request $request){

        // $this->validate($request, [
        //     'type'=>'required',
        //     'name' => 'required',
        // ]);
        
        $quizData = quizTitle::create([
              'name'=>$request->name,
              'user_id'=>$request->user_id,
              'group_id'=>$request->group,
              
        ]);
        $groups = Group::all();
        return view('admins.addquizQA',compact('quizData','groups'));
    }

    public function addnewquestionView(Request $request){
        $quizData = quizTitle::find($request->quiz_id);
        $groups = Group::all();
        return view('admins.addquizQA',compact('quizData','groups'));
    }

    //adding answers function
    public function addanswer($answer,$score,$question_id)
    {
        Answer::create([
            'answer'=>$answer,
            'score'=>$score,
            'question_id'=>$question_id,
        ]);
    }

    //add new question for a new quiz
    public function addQuestionData(Request $request)
    {
        // $this->validate($request, [
        //     'question' => 'required',    
        // ]);
      
        // $questionData = Question::create([
        //     'question'=>$request->question,
        //     'quiz_titles_id'=>$request->quiz_id,
        // ]);

        $questionData = Question::where('type_quiz','radio')->latest()->first();
        $this->addanswer($request->answer1,$request->score1,$questionData->id);
        $this->addanswer($request->answer2,$request->score2,$questionData->id);
        $this->addanswer($request->answer3,$request->score3,$questionData->id);
        
        $quizData = quizTitle::find($request->quiz_id);
        $groups = Group::all();
        return view('admins.addquizQA',compact('quizData','groups'));
    }

    // public function addQuestionData(Request $request){
    //     // $this->validate($request, [
    //     //     'question' => 'required', 
    //     //     'answer1' => 'required',
    //     //     'answer2' => 'required',
    //     //     'answer3' => 'required',
    //     // ]);
      
    //     $questionData = Question::create([
    //           'question'=>$request->question,
    //           'answer1'=>$request->answer1,
    //           'answer2'=>$request->answer2,
    //           'answer3'=>$request->answer3,
    //           'quiz_titles_id'=>$request->quiz_id,
    //       ]);
      

    //     $quizData = quizTitle::find($request->quiz_id);
    //     $groups = Group::all();
    //     return view('admins.addquiz',compact('quizData','groups'));
    // }

    public function addQuestionDataText(Request $request){
        // $this->validate($request, [
        //     'question' => 'required', 
        // ]);
      
        $questionData = Question::create([
            'type_quiz'=>$request->type,
            'question'=>$request->question,
            'quiz_titles_id'=>$request->quiz_id,
          ]);
      

        $quizData = quizTitle::find($request->quiz_id);
        $groups = Group::all();
        return view('admins.addanswerQA',compact('quizData','questionData','groups'));
    }

    //editing quiz
    public function editquiz($id){
        $groups = Group::all();
        $quizData = quizTitle::find($id);
        return view('admins.editquiz',compact('quizData','groups'));
    }
    
  //update quiz
    public function updatequiz(Request $request,$id){
        // $this->validate($request, [
        //     'name' => 'required',
        //     'type'=>'required',
        //     ]);
        //session()->flash('flash_message', 'Ban da update thanh cong');
        $quizData=quizTitle::find($request->quiz_id);
        $quizData = $quizData->update([
            'name'=>$request->name,
            'group_id'=>$request->group,
            'user_id'=>$request->user_id,
        ]);

        $groups = Group::all();
        $quizData = quizTitle::find($id);
        return view('admins.editquiz',compact('quizData','groups'));
    }
    
    // public function deletequiz($id)
    // {
    //     $quiz = quizTitle::find($id);
    //     $quiz->delete();
       
    //     return redirect()->route('viewquiz');
    // }
    public function deletequiz($id)
    {
       // \Session::flash('message', 'Ban da xoa title thanh cong');
        $quiz = quizTitle::find($id);
        // $question = Question::where('quiz_titles_id',$quiz->id);
        // $answer = Answer::where('question_id',$question->id)->delete();    
        // $question ->delete();
        $quiz->delete();
        
        return redirect()->route('viewquiz');
    }

    
    //updating answers function
    public function updatinganswer($answer_id,$answer,$score)
    {
        $answerdata = answer::find($answer_id);
        $answerdata=$answerdata->update([
            'answer'=>$answer,
            'score'=>$score,
            
        ]);
    }

    //updating question
    public function updatequestion(Request $request){
        // $this->validate($request, [
        //     'question' => 'required',    
        // ]);
       // \Session::flash('message', 'Ban da update thanh cong');

        $questionData = Question::find($request->question_id);

        $questionData = $questionData->update([
            'question'=>$request->question,
        ]);

        $this->updatinganswer($request->answer_id1,$request->answer1,$request->score1);
        $this->updatinganswer($request->answer_id2,$request->answer2,$request->score2);
        $this->updatinganswer($request->answer_id3,$request->answer3,$request->score3);
        
        $groups = Group::all();
        $quizData = quizTitle::find($request->quiz_id);
        return view('admins.editquiz',compact('quizData','groups'));

    }

    public function deleteQuestion(Request $request)
    {
        //\Session::flash('message', 'Ban da xoa question thanh cong');
        $question = Question::find($request->question_id);
        $answer = Answer::where('question_id',$question->id)->delete();    
        $question->delete();
        $groups = Group::all();
        $quizData = quizTitle::find($request->quiz_id);
        return view('admins.editquiz',compact('quizData','groups'));
    }
    

}