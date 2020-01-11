<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qualitative;
use Illuminate\Support\Facades\Input;
use Redirect;
use View;
use App\User;

class MarksController extends Controller
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
      return  $data= $request->all();
        $rating->email=auth()->user()->email;
        $name=array_keys($data);
        $count=count($name);
        $rating->id=auth()->user()->id;
        $rating->qualt =$data[1];
        $rating->compt =$data[2];
        $rating->creat =$data[3];
        $rating->analt =$data[4];
    
        $rating->marks =$data[5];  
        $rating->save();
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
