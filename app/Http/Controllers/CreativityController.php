<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qualitative;
use Illuminate\Support\Facades\Input;
use App\User;

class CreativityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rating = Qualitative::firstOrNew(['id' =>auth()->user()->id]);
        //return $request->all();
     //  $rating = new qualitative;
      // $data=input::all('value');
       //$count=1;
       $rating->name=auth()->user()->name;
     $rating->email=auth()->user()->email;
       $data= $request->all();
       $name=array_keys($data);
       $count=count($name);
      // return $name;
      for($d=2;$d<=$count;$d=$d+1)
      // foreach($name as $n)
       { $rating->id= auth()->user()->id;
        $f="CRE_ANS".$name[$d-1];
        $rating->$f = $data[$name[$d-1]];
      //  echo " <br> ".$f." ";
        //echo $data[$name[$d-1]];   
                 
        }
       //  $count=$count+1;
        $rating->save();
       return redirect('analytical');
        
      
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
