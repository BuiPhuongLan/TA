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
        $mssv = $request->MSSV;
        $users = User::where('MSSV',$mssv)->delete();
        return view('admins.editStudent',compact('mssv'));
    }

    

}