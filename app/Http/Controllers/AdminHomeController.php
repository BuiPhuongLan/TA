<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\Question;
use App\User;
use App\AdminUser;
use App\Result;
use App\Answer;
use App\quizTitle;
use App\Group;
use Auth;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.user');
    }
    
    public function index()
    {
        return view("admin-home");
    }

    //Edit Student
    public function edit_student()
    {
        return view("admins.editStudent");
    }
    public function add_student()
    {
        $groups = Group::all();
        return view('admins.addStudent',compact('groups'));
    }
    public function addInforStudent(Request $request)
    {
        $users = User::create([
            'user_id'=>$request->user_id,
            'MSSV'=>$request->MSSV,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'group_id'=>$request->group,           
                       
        ]);
        $groups = Group::all();
        return view('admins.editStudent',compact('users','groups'));
    }
    public function delete_student()
    {
        return view('admins.deleteStudent');
    }
    public function deleteInforStudent(Request $request)
    {
        // $mssv = $request->MSSV;
        // $users = User::where('MSSV',$mssv)->delete();
        // return view('admins.editStudent');
        $mssv = $request->MSSV;      
        if (User::where('MSSV',$mssv)->exists()) {
            $users = User::where('MSSV',$mssv)->delete();
            $check = 'Da xoa thanh cong';
            return view('admins.checkExistDelete', compact('check'));
        }
        else {
            $check = 'MSSV khong ton tai.Vui long nhap lai!';
            return view('admins.checkExistDelete', compact('check'));
        }
        
    }

    //View result

    public function viewResult(){
        return view('admins.viewResult');
    }
    public function viewScoreIndivitual(){
        return view('admins.viewScoreIndivitual');
    }
    public function showScoreIndivitual(Request $request){
        $mssv = $request->MSSV;
        if (Result::where('user_mssv',$mssv)->exists()) {
            $scores = Result::where('user_mssv',$mssv)->avg('score');
            $score = round($scores, 2);
            $check = '';
            return view('admins.showScoreIndivitual', compact('mssv','score','check'));
        }
        else {
            $check = 'MSSV khong ton tai. Vui long nhap lai!';
            return view('admins.showScoreIndivitual', compact('check'));
        }
        
    }

    public function viewScoreGroup(){
        return view('admins.viewScoreGroup');
    }
    public function showScoreGroup(Request $request){
        $group = $request->group;
        if (Result::where('group_id',$group)->exists()) {
            $scores = Result::where('group_id',$group)->avg('score');
            $score = round($scores, 2);
            $check = '';
            return view('admins.showScoreGroup', compact('group','score','check'));
        }
        else {
            $check = 'Name group khong ton tai. Vui long nhap lai!';
            return view('admins.showScoreGroup', compact('check'));
        }
       
    }
}