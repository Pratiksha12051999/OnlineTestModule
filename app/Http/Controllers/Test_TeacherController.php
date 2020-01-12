<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Create_test;
use App\Qualitative_test;
use App\Analytical_test;
use App\Creative_test;
use App\Comprehension_test;

class Test_TeacherController extends Controller
{
    
    /* ------------------------------TEST PAGE -------------------------------------*/
    public function index() {
        $t = DB::select('select * from tests');
        return view('test_display',['t'=>$t]);
     }

     public function store(Request $request) {
        $this->validate($request,['test_name'=>'required',]);
        $tt = new Create_test;
        $tt->setname = $request->input('test_name');
        $tt->save();
        $t = DB::select('select * from tests');
        return view('test_display',['t'=>$t]);
     }
/* -------------------------- QUESTIONS DISPLAY ------------------------------------------*/
     public function display(){
         $a=$_GET['test_id'];
         $b=$_GET['test_n'];
         $qual = Qualitative_test::all()->where('setid',$a);
         $analy = Analytical_test::all()->where('setid',$a);
         $creat = Creative_test::all()->where('setid',$a);
         $comp = Comprehension_test::all()->where('setid',$a);
        return view('view_test')->with('qual',$qual)->with('a',$a)->with('b',$b)->with('analy',$analy)->with('creat',$creat)->with('comp',$comp);
     }

     /* ----------------------QUESTION ADD FORM ----------------------------------------*/
     public function question(){
        $a=$_GET['test_id'];
        $b=$_GET['test_n'];
        $sect=$_GET['section'];
        $last_qt = Qualitative_test::all()->where('setid',$a)->last();
        $last_at = Analytical_test::all()->where('setid',$a)->last();
        $last_ct = Creative_test::all()->where('setid',$a)->last();
        $last_cot = Comprehension_test::all()->where('setid',$a)->last();
        //return $qual;
        return view('add_question')->with('a',$a)->with('b',$b)->with('sect',$sect)->with('last_qt',$last_qt)->with('last_at',$last_at)->with('last_ct',$last_ct)->with('last_cot',$last_cot);
     }

/* ------------------------------------------------- QUALITATIVE STORE ----------------------------------------------------------- */
     
     public function qual_store(Request $request){
        $a=$_POST['test_id'];
        $b=$_POST['test_n'];
        $sect=$_POST['section'];

        $qual = new Qualitative_test();
        $qual->qid = $request->input('q_number');
        $qual->question = $request->input('q_content');
        $qual->marks = $request->input('q_mks');
        $qual->setid = $request->input('sid');
        $qual->correct = $request->input('correct');
        if($request->hasfile('q_image')){
            $file = $request->file('q_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/questions/', $filename);
            $qual->questionimg = $filename;
        }
        else
        {
            $qual->questionimg=' ';
        }
        
        $qual->option1 = $request->input('o1_content');
        if($request->hasfile('o1_image')){
            $file = $request->file('o1_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option1/', $filename);
            $qual->option1img = $filename;
        }
        else
        {
            $qual->option1img=' ';
        }

        
        $qual->option2 = $request->input('o2_content');
        if($request->hasfile('o2_image')){
            $file = $request->file('o2_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option2/', $filename);
            $qual->option2img = $filename;
        }
        else
        {
            $qual->option2img=' ';
        }

        $qual->option3 = $request->input('o3_content');
        if($request->hasfile('o3_image')){
            $file = $request->file('o3_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option3/', $filename);
            $qual->option3img = $filename;
        }
        else
        {
            $qual->option3img=' ';
        }

        $qual->option4 = $request->input('o4_content');
        if($request->hasfile('o4_image')){
            $file = $request->file('o4_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option4/', $filename);
            $qual->option4img = $filename;
        }
        else
        {
            $qual->option4img=' ';
        }
        $qual->uniq_id=$qual->setid.$qual->qid;

        $qual->save();
        

        return view('add_question')->with('qual',$qual)->with('a',$a)->with('b',$b)->with('sect',$sect);
    }


    /* ------------------------------------------------- ANALYTICAL STORE ----------------------------------------------------------- */

    public function analy_store(Request $request){
        $a=$_POST['test_id'];
        $b=$_POST['test_n'];
        $sect=$_POST['section'];

        $analy = new Analytical_test();
        $analy->qid = $request->input('q_number');
        $analy->question = $request->input('q_content');
        $analy->marks = $request->input('q_mks');
        $analy->setid = $request->input('sid');
        $analy->correct = $request->input('correct');
        if($request->hasfile('q_image')){
            $file = $request->file('q_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/questions/', $filename);
            $analy->questionimg = $filename;
        }
        else
        {
            $analy->questionimg=' ';
        }
        
        $analy->option1 = $request->input('o1_content');
        if($request->hasfile('o1_image')){
            $file = $request->file('o1_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option1/', $filename);
            $analy->option1img = $filename;
        }
        else
        {
            $analy->option1img=' ';
        }

        
        $analy->option2 = $request->input('o2_content');
        if($request->hasfile('o2_image')){
            $file = $request->file('o2_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option2/', $filename);
            $analy->option2img = $filename;
        }
        else
        {
            $analy->option2img=' ';
        }

        $analy->option3 = $request->input('o3_content');
        if($request->hasfile('o3_image')){
            $file = $request->file('o3_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option3/', $filename);
            $analy->option3img = $filename;
        }
        else
        {
            $analy->option3img=' ';
        }

        $analy->option4 = $request->input('o4_content');
        if($request->hasfile('o4_image')){
            $file = $request->file('o4_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option4/', $filename);
            $analy->option4img = $filename;
        }
        else
        {
            $analy->option4img=' ';
        }
        $analy->uniq_id=$analy->setid.$analy->qid;
        $analy->save();
        
        return view('add_question')->with('analy',$analy)->with('a',$a)->with('b',$b)->with('sect',$sect);
    }

    /* ------------------------------------------------- CREATIVE STORE ----------------------------------------------------------- */


    public function creat_store(Request $request){
        $a=$_POST['test_id'];
        $b=$_POST['test_n'];
        $sect=$_POST['section'];

        $creat = new Creative_test();
        $creat->qid = $request->input('q_number');
        $creat->question = $request->input('q_content');
        $creat->marks = $request->input('q_mks');
        $creat->setid = $request->input('sid');
        $creat->correct = $request->input('correct');
        if($request->hasfile('q_image')){
            $file = $request->file('q_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/questions/', $filename);
            $creat->questionimg = $filename;
        }
        else
        {
            $creat->questionimg=' ';
        }
        
        $creat->option1 = $request->input('o1_content');
        if($request->hasfile('o1_image')){
            $file = $request->file('o1_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option1/', $filename);
            $creat->option1img = $filename;
        }
        else
        {
            $creat->option1img=' ';
        }

        
        $creat->option2 = $request->input('o2_content');
        if($request->hasfile('o2_image')){
            $file = $request->file('o2_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option2/', $filename);
            $creat->option2img = $filename;
        }
        else
        {
            $creat->option2img=' ';
        }

        $creat->option3 = $request->input('o3_content');
        if($request->hasfile('o3_image')){
            $file = $request->file('o3_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option3/', $filename);
            $creat->option3img = $filename;
        }
        else
        {
            $creat->option3img=' ';
        }

        $creat->option4 = $request->input('o4_content');
        if($request->hasfile('o4_image')){
            $file = $request->file('o4_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option4/', $filename);
            $creat->option4img = $filename;
        }
        else
        {
            $creat->option4img=' ';
        }
        
        $creat->option5 = $request->input('o5_content');
        if($request->hasfile('o5_image')){
            $file = $request->file('o5_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option5/', $filename);
            $creat->option5img = $filename;
        }
        else
        {
            $creat->option5img=' ';
        }
        $creat->uniq_id=$creat->setid.$creat->qid;

        $creat->save();
        
        return view('add_question')->with('creat',$creat)->with('a',$a)->with('b',$b)->with('sect',$sect);
    }


    /* ------------------------------------------------- COMPREHENSION STORE ----------------------------------------------------------- */

    public function comp_store(Request $request){
        $a=$_POST['test_id'];
        $b=$_POST['test_n'];
        $sect=$_POST['section'];

        $comp = new Comprehension_test();
        $comp->para = $request->input('para');
        $comp->qid = $request->input('q_number');
        $comp->question = $request->input('q_content');
        $comp->marks = $request->input('q_mks');
        $comp->setid = $request->input('sid');
        $comp->correct = $request->input('correct');
        if($request->hasfile('q_image')){
            $file = $request->file('q_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/questions/', $filename);
            $comp->questionimg = $filename;
        }
        else
        {
            $comp->questionimg=' ';
        }
        
        $comp->option1 = $request->input('o1_content');
        if($request->hasfile('o1_image')){
            $file = $request->file('o1_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option1/', $filename);
            $comp->option1img = $filename;
        }
        else
        {
            $comp->option1img=' ';
        }

        
        $comp->option2 = $request->input('o2_content');
        if($request->hasfile('o2_image')){
            $file = $request->file('o2_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option2/', $filename);
            $comp->option2img = $filename;
        }
        else
        {
            $comp->option2img=' ';
        }

        $comp->option3 = $request->input('o3_content');
        if($request->hasfile('o3_image')){
            $file = $request->file('o3_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option3/', $filename);
            $comp->option3img = $filename;
        }
        else
        {
            $comp->option3img=' ';
        }

        $comp->option4 = $request->input('o4_content');
        if($request->hasfile('o4_image')){
            $file = $request->file('o4_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option4/', $filename);
            $comp->option4img = $filename;
        }
        else
        {
            $comp->option4img=' ';
        }
        $comp->uniq_id=$comp->setid.$comp->qid;

        $comp->save();
        
        return view('add_question')->with('comp',$comp)->with('a',$a)->with('b',$b)->with('sect',$sect); 
       }


/* ------------------------------------- QUALITATIVE EDIT --------------------------------------------------- */
       public function qual_edit(){
        $a=$_POST['test_id'];
        $b=$_POST['test_n'];
        $sect=$_POST['section'];
        $c=$_POST['quest_id']; 
        $u=$a.$c;
        $qual=Qualitative_test::all()->where('uniq_id',$u)->first();
        return view('edit_question',['qual'=>$qual])->with('a',$a)->with('b',$b)->with('sect',$sect)->with('c',$c); 
        //$qual=json_encode($array[0]);
        //$qual=json_decode($qual);
        //echo $qual->qid;
        //return $qual;
        //$query = $this->select("select * from qualitatives where qid='$c' and setid='$a'");
        //echo $query;
        //$qual = response()->json($array);
        //$qual = json_encode($array);
        //return ($qual->qid);
        //$qual=DB::table('qualitatives')->where([['qid',$c],['setid',$a]]);
        
       }


       public function qual_update(Request $request){

        $a=$_POST['test_id'];
        $b=$_POST['test_n'];
        $sect=$_POST['section'];
        $c=$_POST['quest_id']; 

        /* $array =DB::select("select * from qualitatives where qid='$c' and setid='$a'");
        $qual=json_encode($array[0]);
        $qual=json_decode($qual);  */
        $u=$a.$c;
        $qual=Qualitative_test::all()->where('uniq_id',$u)->first();
        $qual->qid = $request->input('q_number');
        $qual->question = $request->input('q_content');
        $qual->marks = $request->input('q_mks');
        $qual->setid = $request->input('sid');
        $qual->uniq_id=$qual->setid.$qual->qid;
        $qual->correct = $request->input('correct');
        if($request->hasfile('q_image')){
            $file = $request->file('q_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/questions/', $filename);
            $qual->questionimg = $filename;
        }
        /* else
        {
            $qual->questionimg=' ';
        } */
        
        $qual->option1 = $request->input('o1_content');
        if($request->hasfile('o1_image')){
            $file = $request->file('o1_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option1/', $filename);
            $qual->option1img = $filename;
        }
       /*  else
        {
            $qual->option1img=' ';
        } */

        
        $qual->option2 = $request->input('o2_content');
        if($request->hasfile('o2_image')){
            $file = $request->file('o2_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option2/', $filename);
            $qual->option2img = $filename;
        }
        /* else
        {
            $qual->option2img=' ';
        }
 */
        $qual->option3 = $request->input('o3_content');
        if($request->hasfile('o3_image')){
            $file = $request->file('o3_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option3/', $filename);
            $qual->option3img = $filename;
        }
        /* else
        {
            $qual->option3img=' ';
        } */

        $qual->option4 = $request->input('o4_content');
        if($request->hasfile('o4_image')){
            $file = $request->file('o4_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/option4/', $filename);
            $qual->option4img = $filename;
        }
       /*  else
        {
            $qual->option4img=' ';
        } */
        $qual->save();
        return view('succ')->with('a',$a)->with('b',$b)->with('sect',$sect); 
        //$qual_a=(array)$qual;
      // $qual->save();
//return $qual;
/* $qual = new stdClass();
$arr = array();
echo $arr[$qual]; */      
    }



/* ------------------------------------- ANALYTICAL EDIT --------------------------------------------------- */


public function analy_edit(){
    $a=$_POST['test_id'];
    $b=$_POST['test_n'];
    $sect=$_POST['section'];
    $c=$_POST['quest_id']; 
    $u=$a.$c;
    $qual=Analytical_test::all()->where('uniq_id',$u)->first();
    return view('edit_question',['qual'=>$qual])->with('a',$a)->with('b',$b)->with('sect',$sect)->with('c',$c); 
   }


   public function analy_update(Request $request){

    $a=$_POST['test_id'];
    $b=$_POST['test_n'];
    $sect=$_POST['section'];
    $c=$_POST['quest_id']; 
    $u=$a.$c;
    $qual=Analytical_test::all()->where('uniq_id',$u)->first();
    $qual->qid = $request->input('q_number');
    $qual->question = $request->input('q_content');
    $qual->marks = $request->input('q_mks');
    $qual->setid = $request->input('sid');
    $qual->uniq_id=$qual->setid.$qual->qid;
    $qual->correct = $request->input('correct');
    if($request->hasfile('q_image')){
        $file = $request->file('q_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/questions/', $filename);
        $qual->questionimg = $filename;
    }
    /* else
    {
        $qual->questionimg=' ';
    } */
    
    $qual->option1 = $request->input('o1_content');
    if($request->hasfile('o1_image')){
        $file = $request->file('o1_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option1/', $filename);
        $qual->option1img = $filename;
    }
    /* else
    {
        $qual->option1img=' ';
    } */

    
    $qual->option2 = $request->input('o2_content');
    if($request->hasfile('o2_image')){
        $file = $request->file('o2_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option2/', $filename);
        $qual->option2img = $filename;
    }
    /* else
    {
        $qual->option2img=' ';
    } */

    $qual->option3 = $request->input('o3_content');
    if($request->hasfile('o3_image')){
        $file = $request->file('o3_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option3/', $filename);
        $qual->option3img = $filename;
    }
    /* else
    {
        $qual->option3img=' ';
    } */

    $qual->option4 = $request->input('o4_content');
    if($request->hasfile('o4_image')){
        $file = $request->file('o4_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option4/', $filename);
        $qual->option4img = $filename;
    }
    /*else
     {
        $qual->option4img=' ';
    } */
    $qual->save();
    return view('succ')->with('a',$a)->with('b',$b)->with('sect',$sect);     
}


/* ------------------------------------- CREATIVE EDIT --------------------------------------------------- */



public function creat_edit(){
    $a=$_POST['test_id'];
    $b=$_POST['test_n'];
    $sect=$_POST['section'];
    $c=$_POST['quest_id']; 
    $u=$a.$c;
    $qual=Creative_test::all()->where('uniq_id',$u)->first();
    return view('edit_question',['qual'=>$qual])->with('a',$a)->with('b',$b)->with('sect',$sect)->with('c',$c); 
   }


   public function creat_update(Request $request){

    $a=$_POST['test_id'];
    $b=$_POST['test_n'];
    $sect=$_POST['section'];
    $c=$_POST['quest_id']; 
    $u=$a.$c;
    $qual=Creative_test::all()->where('uniq_id',$u)->first();
    $qual->qid = $request->input('q_number');
    $qual->question = $request->input('q_content');
    $qual->marks = $request->input('q_mks');
    $qual->setid = $request->input('sid');
    $qual->uniq_id=$qual->setid.$qual->qid;
    $qual->correct = $request->input('correct');
    if($request->hasfile('q_image')){
        $file = $request->file('q_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/questions/', $filename);
        $qual->questionimg = $filename;
    }
    /* else
    {
        $qual->questionimg=' ';
    } */
    
    $qual->option1 = $request->input('o1_content');
    if($request->hasfile('o1_image')){
        $file = $request->file('o1_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option1/', $filename);
        $qual->option1img = $filename;
    }
    /* else
    {
        $qual->option1img=' ';
    } */

    
    $qual->option2 = $request->input('o2_content');
    if($request->hasfile('o2_image')){
        $file = $request->file('o2_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option2/', $filename);
        $qual->option2img = $filename;
    }
   /*  else
    {
        $qual->option2img=' ';
    } */

    $qual->option3 = $request->input('o3_content');
    if($request->hasfile('o3_image')){
        $file = $request->file('o3_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option3/', $filename);
        $qual->option3img = $filename;
    }
    /* else
    {
        $qual->option3img=' ';
    } */

    $qual->option4 = $request->input('o4_content');
    if($request->hasfile('o4_image')){
        $file = $request->file('o4_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option4/', $filename);
        $qual->option4img = $filename;
    }
    /* else
    {
        $qual->option4img=' ';
    } */

    $qual->option5 = $request->input('o5_content');
    if($request->hasfile('o5_image')){
        $file = $request->file('o5_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option5/', $filename);
        $qual->option5img = $filename;
    }
    /* else
    {
        $qual->option5img=' ';
    } */
    $qual->save();
    return view('succ')->with('a',$a)->with('b',$b)->with('sect',$sect); 
}


/* ------------------------------------- COMPREHENSION EDIT --------------------------------------------------- */

public function comp_edit(){
    $a=$_POST['test_id'];
    $b=$_POST['test_n'];
    $sect=$_POST['section'];
    $c=$_POST['quest_id']; 
    $u=$a.$c;
    $qual=Comprehension_test::all()->where('uniq_id',$u)->first();
    return view('edit_question',['qual'=>$qual])->with('a',$a)->with('b',$b)->with('sect',$sect)->with('c',$c); 
   }


   public function comp_update(Request $request){

    $a=$_POST['test_id'];
    $b=$_POST['test_n'];
    $sect=$_POST['section'];
    $c=$_POST['quest_id']; 
    $u=$a.$c;
    $qual=Comprehension_test::all()->where('uniq_id',$u)->first();
    $qual->qid = $request->input('q_number');
    $qual->para = $request->input('para');
    $qual->question = $request->input('q_content');
    $qual->marks = $request->input('q_mks');
    $qual->setid = $request->input('sid');
    $qual->uniq_id=$qual->setid.$qual->qid;
    $qual->correct = $request->input('correct');
    if($request->hasfile('q_image')){
        $file = $request->file('q_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/questions/', $filename);
        $qual->questionimg = $filename;
    }
    /* else
    {
        $qual->questionimg=' ';
    } */
    
    $qual->option1 = $request->input('o1_content');
    if($request->hasfile('o1_image')){
        $file = $request->file('o1_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option1/', $filename);
        $qual->option1img = $filename;
    }
    /* else
    {
        $qual->option1img=' ';
    } */

    
    $qual->option2 = $request->input('o2_content');
    if($request->hasfile('o2_image')){
        $file = $request->file('o2_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option2/', $filename);
        $qual->option2img = $filename;
    }
    /* else
    {
        $qual->option2img=' ';
    }
 */
    $qual->option3 = $request->input('o3_content');
    if($request->hasfile('o3_image')){
        $file = $request->file('o3_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option3/', $filename);
        $qual->option3img = $filename;
    }
    /* else
    {
        $qual->option3img=' ';
    } */

    $qual->option4 = $request->input('o4_content');
    if($request->hasfile('o4_image')){
        $file = $request->file('o4_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/option4/', $filename);
        $qual->option4img = $filename;
    }
   /*  else
    {
        $qual->option4img=' ';
    } */
    $qual->save();
    return view('succ')->with('a',$a)->with('b',$b)->with('sect',$sect);
}


/*------------------------------ DELETE------------------------------------------*/

    public function qual_delete()
    {
        $a=$_GET['test_id'];
        $b=$_GET['test_n'];
        $sect=$_GET['section'];
        $c=$_GET['quest_id'];
        $u=$a.$c;
        Qualitative_test::where('uniq_id',$u)->delete();
        return view('succ_delete')->with('a',$a)->with('b',$b)->with('sect',$sect);
    }

    public function analy_delete()
    {
        $a=$_GET['test_id'];
        $b=$_GET['test_n'];
        $sect=$_GET['section'];
        $c=$_GET['quest_id'];
        $u=$a.$c;

        Analytical_test::where('uniq_id',$u)->delete();
        //$qual->delete();
        return view('succ_delete')->with('a',$a)->with('b',$b)->with('sect',$sect);
    }

    public function creat_delete()
    {
        $a=$_GET['test_id'];
        $b=$_GET['test_n'];
        $sect=$_GET['section'];
        $c=$_GET['quest_id'];
        $u=$a.$c;

        Creative_test::where('uniq_id',$u)->delete();
        //$qual->delete();
        return view('succ_delete')->with('a',$a)->with('b',$b)->with('sect',$sect);
    }

    public function comp_delete()
    {
        $a=$_GET['test_id'];
        $b=$_GET['test_n'];
        $sect=$_GET['section'];
        $c=$_GET['quest_id'];
        $u=$a.$c;
        Comprehension_est::where('uniq_id',$u)->delete();
        //$qual->delete();
        return view('succ_delete')->with('a',$a)->with('b',$b)->with('sect',$sect);
    }

    public function delete()
    {
        $a=$_GET['test_id'];
        $b=$_GET['test_n'];

        Create_test::where('setid',$a)->where('setname',$b)->delete();
        Qualitative_test::where('setid',$a)->delete();
        Analytical_test::where('setid',$a)->delete();
        Creative_test::where('setid',$a)->delete();
        Comprehension_test::where('setid',$a)->delete();
    
        $t = DB::select('select * from tests');
        return view('test_display',['t'=>$t])->with('success','Test deleted');
        
    }

}
