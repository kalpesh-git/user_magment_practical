<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Carbon\Carbon;
  
class HomeController extends Controller
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
  
    public function index()
    { 
        $loginUser = auth()->user(); 
        
        $date = Carbon::parse($loginUser->last_login);
        $loginUser->last_login = $date->format('d M,Y H:i:s A'); 

        if($loginUser->status == "disabled"){
            auth()->logout();
            return redirect()->route('login')->with('error','You are disabled.Please contact to admin.');
        }
        return view('home',['user' => $loginUser]);
    } 
   
    public function tasks(){  
        $loginUser = auth()->user(); 
        $tasks = $loginUser->tasks; 
        return view('tasks',['tasks'=>$tasks,'user'=>$loginUser,'type'=>$loginUser->type]); 
    }  
}