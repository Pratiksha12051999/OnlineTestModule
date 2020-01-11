<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/t', function () {
//     return view('auth/login1');
// });
Route::get('/tt', function () {
    return view('auth/resultadmin');
});
$submit=0;
//New Working Routes (Multi auth)
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['web','auth']],function(){
    Route::get('/home', function () {
    if(Auth::user()->token!=null){
        return redirect('/')->with('status','please verify your email account');
    }
    else if(Auth::user()->role==1){
        return view('auth/home');
    }
    else if(Auth::user()->role==2){
        return view('teacher/home');
    }
    else{
        return view('home');
    }
    })->name('home');
});
Auth::routes();
Route::get('/verify/{token}','VerifyController@verify')->name('verify');
// Route::get('/teacher/home', ['middleware'=>['auth','teacher'],'uses'=>'TestController@index'])->name('home');
Route::get('/registeradmin',['middleware'=>['auth','admin'],'uses'=>'PagesController@index']);
// Route::get('/home', ['middleware'=>['auth','student'],'uses'=>'HomeController@index'])->name('home');
Route::resource('users','TeacherController');
Route::get('/addteacher',['middleware'=>['auth','admin'],'uses'=>'PagesController@addteacher']);
Route::post('/qualitative',['middleware'=>['auth','student'],'uses'=>'QualitativeController@store']);
Route::get('/qualitative',['middleware'=>['auth','student'],'uses'=>'QuestionsController@qualitative']);

Route::get('/comprehension',['middleware'=>['auth','student'],'uses'=>'QuestionsController@comprehension'])->name('comprehension');
Route::post('/comprehension',['middleware'=>['auth','student'],'uses'=>'ComprehensionController@store'])->name('comprehension');

Route::post('/analytical',['middleware'=>['auth','student'],'uses'=>'AnalyticalController@store'])->name('analytical');
Route::get('/analytical',['middleware'=>['auth','student'],'uses'=>'QuestionsController@analytical'])->name('analytical');;

Route::post('creativity',['middleware'=>['auth','student'],'uses'=>'CreativityController@store'])->name('creativity');
Route::get('creativity',['middleware'=>['auth','student'],'uses'=>'QuestionsController@creativity'])->name('creativity');

Route::post('qualitative',['middleware'=>['auth','student'],'uses'=>'QualitativeController@store'])->name('qualitative');
Route::get('qualitative',['middleware'=>['auth','student'],'uses'=>'QuestionsController@qualitative'])->name('qualtative');

Route::post('final','ResultController@qcorrect')->name('final');
Route::get('final','ResultController@qcorrect')->name('final');

Route::get('/viewfinal', function () {
    return view('viewfinal');
})->name('viewfinal');

Route::get('/result',['middleware'=>['auth','teacher'],'uses'=>'ResultController@fetchall'])->name('result');
Route::get('/result',['middleware'=>['auth','admin'],'uses'=>'ResultController@fetchall'])->name('result');

Route::any('marks','MarksController@store')->name('marks');
Route::get('/student/{token}','StudentsController@show')->name('student');


/*-------------------------------------------------------------------------------------------------------*/

Route::get('/test_display','Test_TeacherController@index');
Route::post('/test_display1','Test_TeacherController@store');
Route::get('/test_view','Test_TeacherController@display');
Route::get('/add_question','Test_TeacherController@question');

Route::post('/add_question_qual','Test_TeacherController@qual_store');
Route::post('/add_question_analy','Test_TeacherController@analy_store');
Route::post('/add_question_creat','Test_TeacherController@creat_store');
Route::post('/add_question_comp','Test_TeacherController@comp_store');

Route::any('/edit_qual_question','Test_TeacherController@qual_edit');
Route::put('/update_qual_question','Test_TeacherController@qual_update');
Route::any('/edit_analy_question','Test_TeacherController@analy_edit');
Route::put('/update_analy_question','Test_TeacherController@analy_update');
Route::any('/edit_creat_question','Test_TeacherController@creat_edit');
Route::put('/update_creat_question','Test_TeacherController@creat_update');
Route::any('/edit_comp_question','Test_TeacherController@comp_edit');
Route::put('/update_comp_question','Test_TeacherController@comp_update');

Route::get('/qual_delete','Test_TeacherController@qual_delete');
Route::get('/analy_delete','Test_TeacherController@analy_delete');
Route::get('/creat_delete','Test_TeacherController@creat_delete');
Route::get('/comp_delete','Test_TeacherController@comp_delete');

Route::get('/test_delete','Test_TeacherController@delete');
