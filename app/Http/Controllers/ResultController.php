<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Qualitative;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Config;
use App\User;
class ResultController extends Controller
{
    private $setid,$id;
    public function qcorrect(Request $request){
    
         $this->id=auth()->user()->id;
         $this->setid=auth()->user()->id%2+1;
        $qans = DB::select(DB::raw("select * from qualitative_analysis where setid='$this->setid'"));
        $qans1 = DB::select(DB::raw("select * from qualitatives where id='$this->id'"));
        $cans =DB::select(DB::raw("select * from comprehension where setid='$this->setid'"));
        $cans1 = DB::select(DB::raw("select * from qualitatives where id='$this->id'"));
        $crans = DB::select(DB::raw("select * from creative_test where setid='$this->setid'"));
        $crans1 = DB::select(DB::raw("select * from qualitatives where id='$this->id'"));
        $anans = DB::select(DB::raw("select * from analytical_test where setid='$this->setid'"));
        $anans1 = DB::select(DB::raw("select * from qualitatives where id='$this->id'"));
        //return view('final',['qans'=>$qans,'qans1'=>$qans1,'cans'=>$cans,'cans1'=>$cans1,'crans'=>$crans,'crans1'=>$crans1,'anans'=>$anans,'anans1'=>$anans1]);  

$x = array();
$marks=array();
$i=1; 
foreach($qans as $qan)
               { $x[$i] = $qan->correct;
                 $marks[$i]=$qan->marks;
                 $i=$i+1;                  
                }
                // echo implode(" ",$x);
echo "<br>";

$y = array();
$j=1; 
foreach($qans1 as $qan1)
{
for($j=1;$j<=20;$j=$j+1)
{$a="SEC1_ans".$j;
//echo $a;
$y[$j]=$qan1->$a;
//echo ($y[$j]);
} 
}
//echo implode(" ",$y);

$count = 0;
for($k=1;$k<$i;$k=$k+1)
{
if ($x[$k] == $y[$k]) {
$count=$count+1;
}
}

$x1 = array();
$marks=array();
$i1=1;
foreach($cans as $can){
                 $x1[$i1] = $can->correct;
                 $marks[$i1]=$can->marks;
                 $i1=$i1+1;
}                  


//echo implode(" ",$marks);

$y1 = array();
$j1=1;
foreach($cans1 as $can1)
{
    for($j1=1;$j1<=20;$j1=$j1+1)
{$a="COMP_ANS".$j1;
//echo $a;
$y1[$j1]=$can1->$a;
}
}

//echo implode("<br> ",$y);




$count1 = 0;
for($k1=1;$k1<$i1;$k1=$k1+1)
{
if ($x1[$k1] == $y1[$k1]) {
$count1=$count1+$marks[$k1];
}

}
//echo $count1;

$x2 = array();
$marks2=array();
$i2=1; 
foreach($crans as $cran)
 {               $x2[$i2] = $cran->correct;
                 $marks2[$i2]=$cran->marks;
                 $i2=$i2+1;                  
 }
//echo implode(" ",$marks);


$y2 = array();
$j2=1; 
foreach($crans1 as $cran1) 
{for($j2=1;$j2<=20;$j2=$j2+1)
{$a="CRE_ANS".$j2;
//echo $a;
$y2[$j2]=$cran1->$a;
}
}
//echo implode("<br> ",$y);

$count2 = 0;
for($k2=1;$k2<$i2;$k2=$k2+1)
{
if ($x2[$k2] == $y2[$k2]) {
$count2=$count2+$marks2[$k2];
}

}
//echo $count2;

$x3 = array();
$marks3=array();
$i3=1; 
foreach($anans as $anan)
 {               $x3[$i3] = $anan->correct;
                 $marks3[$i3]=$anan->marks;
                 $i3=$i3+1;
 }                                


//echo implode(" ",$marks);


$y3 = array();
$j3=1; 
foreach($anans1 as $anan1)
{
    for($j3=1;$j3<=20;$j3=$j3+1)
{$a="ANA_ANS".$j3;
//echo $a;
$y3[$j3]=$anan1->$a;
}
//echo implode("<br> ",$y);
}

$count3 = 0;
for($k3=1;$k3<$i3;$k3=$k3+1)
{
if ($x3[$k3] == $y3[$k3]) {
$count3=$count3+$marks3[$k3];
}

}
$total=$count+$count1+$count2+$count3;
//echo $total;
$rating = Qualitative::firstOrNew(['id' =>auth()->user()->id]);
//$w=auth()->user()->id;
//$data=input::all('value');
//$data= $request->all();
//$rating->email=auth()->user()->email;
//$count=1;
//$name=array_keys($data);
//$count=count($name);
 //return ($data);
//return $name;
$rating->id=auth()->user()->id;
$rating->marks=$total;
$rating->qualt=$count;
$rating->compt=$count1;
$rating->creat=$count2;
$rating->analt=$count3;
$rating->save();
//$section='Qualitative'; 
//echo $count3;

return view('final',['count'=>$count,'count1'=>$count1,'count2'=>$count2,'count3'=>$count3]);  


//echo $count;

}
public function fetchall(){
    $users=User::all();
    $result=Qualitative::all();
    return view('auth.resultadmin')->with('result',$result);
}
}
