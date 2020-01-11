<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class QuestionsController extends Controller
{
    private $setid;
    public function qualitative(){
        $this->setid=auth()->user()->id%2+1;
 
            $users = DB::select(DB::raw("select * from qualitative_analysis where setid='$this->setid'"));
        
        return view('qualitative',['users'=>$users]);
    }
    public function creativity(){
        $this->setid=auth()->user()->id%2+1;
        if($this->setid==1){
            $users1 = DB::select('select * from creative_test where setid="1"');
        }
        else if($this->setid==2){
            $users1 = DB::select('select * from creative_test where setid="2"');
        }
        return view('creativity',['users1'=>$users1]);
    }
    public function analytical(){
        $this->setid=auth()->user()->id%2+1;
        if($this->setid==1){
            $users2 = DB::select('select * from analytical_test where setid="1"');
        }
        else if($this->setid==2){
            $users2 = DB::select('select * from analytical_test where setid="2"');
        }
        return view('analytical',['users2'=>$users2]);
    }

    public function comprehension(){
        $this->setid=auth()->user()->id%2+1;
        if($this->setid==1){
            $users3 = DB::select('select * from comprehension where setid="1"');
        }
        else if($this->setid==2){
            $users3 = DB::select('select * from comprehension where setid="2"');
        }
        return view('comprehension',['users3'=>$users3]);
    }
}
