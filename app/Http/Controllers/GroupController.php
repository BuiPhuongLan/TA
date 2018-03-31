<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
class GroupController extends Controller
{
    public function create(){
        $groups = Group::all();
        return view('admins.addgroup', compact('groups'));
    }

    public function addAndUpdateGroups(Request $request){
 	
        if($request->action == "addgroup"){
          $groups = new Group;
          $groups->name = $request->newGroup;
          $groups->save();
          return redirect('admin_home/addgroup');
                
       }
        
         //update tag
         if($request->action == "updategroup"){
          $groups = Group::find($request->groupToUpdate);
          $groups->name = $request->updatGroup;
          $groups->update();
          return redirect('admin_home-home/addgroup');
                
       }
   
        $groups = Group::all();
       return view('admins.addgroup', compact('groups'));
    }
}