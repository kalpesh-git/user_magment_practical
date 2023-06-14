<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Carbon\Carbon;

class AdminController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminHome()
    {
        $users = User::where('type',0)->get(); 
        $users->each(function ($user) {
            $user->last_login = Carbon::parse($user->last_login)->format('d M,Y H:i:s A');
        }); 
        return view('adminHome',['users' => $users]);
    } 

    public function task($userId){  
        $user = User::where('type',0)->where("id",$userId)->first();  
        if (empty($user)) {
            return redirect()->route('admin.home')->with('error','User not found.');; 
        }
        return view('userTask',['userId' => $userId,'name'=>$user->first_name.' '.$user->last_name]);  
        
    }

    public function createTask($userId,Request $request){ 
        $input = $request->all();
     
        $validate = $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);   
        if($userId != ""){
            $task = new Task();
            $task->userId = $userId;
            $task->title = $input['title'];
            $task->description = $input['description']; 
            $task->save(); 

            return redirect()->route('admin.home')->with('success','Task has been created successfully.');
        }
        
        return redirect()->route('admin.home')->with('error','User id should not be blank.'); 
    }
    
    public function userTasks($userId){   
        $loginUser = auth()->user(); 
        $user = User::where('type',0)->where("id",$userId)->first();   
        // dd( $user->type);die();
        if (empty($user)) {
            return redirect()->route('admin.home')->with('error','User not found.');; 
        }
        $tasks = $user->tasks;

        return view('tasks',['tasks'=>$tasks,'user'=>$user,'type'=>$loginUser->type]); 
    }

    public function deleteTask($taskId){  
        $task = Task::where("id",$taskId)->first();   

        if (empty($task)) {
            return redirect()->route('admin.home')->with('error','Task can not be blank.');
        }
        
        $task->delete();

        return redirect()->route('admin.usertasks',["userId"=>$task->userId])->with('success','Task has been deleted successfully.'); 

    }

    public function editTask($taskId){  
        $task = Task::where("id",$taskId)->first();   

        if (empty($task)) {
            return redirect()->route('admin.home')->with('error','Task can not be blank.');; 
        }

        $user = User::where('type',0)->where("id",$task->userId)->first();  
        if (empty($user)) {
            return redirect()->route('admin.home')->with('error','User not found.');; 
        }

        return view('userTask',['task'=>$task,'userId' => $task->userId,'name'=>$user->first_name.' '.$user->last_name,'action'=>"edit"]); 
    }

    public function updateTask($taskId,Request $request){ 
         
        $input = $request->all(); 

        $validate = $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);   
        
        $task = Task::where("id",$taskId)->first();   
        
        if (empty($task)) {
            return redirect()->route('admin.home')->with('error','Task can not be blank.'); 
        } 

        $task->title = $input['title'];
        $task->description = $input['description']; 
        $task->save(); 

        return redirect()->route('admin.usertasks',['userId'=>$task->userId])->with('success','Task has been updated successfully.');
    }
  
}
