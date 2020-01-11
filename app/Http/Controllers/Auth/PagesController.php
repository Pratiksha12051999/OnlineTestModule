<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index(){
          // $user_role = auth()->users()->role=='2';
          $users = user::where('role','1')->get();
          // return $users;
          // $users =user::all();
          // dd($users);
        // var_dump($users);
          return view('auth/adminregister')->with('users',$users);      
        // return view('auth/adminregister');
    }
    public function addteacher(){
      return view('auth/addteacher');
    }
    
}
