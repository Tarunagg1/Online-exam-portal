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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin','admin@index');

Route::get('/admin/examcategory','admin@exam_category');

Route::post('/admin/add_category','admin@add_category');

Route::get('/admin/deletecat/{id}','admin@deletecat');
Route::get('/admin/edit/{id}','admin@editcat');
Route::post('/admin/update_category','admin@updatcat');

//////////////////cadd exam
Route::get('admin/manage_exam','admin@manage_exam');
Route::post('admin/add_exm','admin@addexm');
Route::get('admin/exmstatus/{id}','admin@exmstatus');
Route::get('admin/deleteexm/{id}','admin@deleteexm');

///////////////// add exam
Route::get('admin/manage_student','admin@manage_student');
Route::post('admin/add_student','admin@addstudent');
Route::get('admin/studentstatus/{id}','admin@studentstatus');
Route::get('admin/studentdelete/{id}','admin@studentdelete');
Route::get('admin/addquestion/{id}','admin@addquestion');
Route::post('admin/addquestion','admin@addquestiondb');
Route::get('admin/addquesstatus/{id}','admin@addquesstatus');
Route::get('admin/deletequestion/{id}','admin@deletequestion');

/////////////////////// portal
Route::get('admin/portal','admin@portal');
Route::post('admin/add_portal','admin@addportal');
Route::get('admin/deleteportauser/{id}','admin@deleteportauser');

Route::get('portal/signup',"protalcontorler@portalsignup");
Route::post('portal/userportalsignup',"protalcontorler@userportalsignup");
Route::get('portal/login',"protalcontorler@vlogin");
Route::post('portal/login',"protalcontorler@login");
Route::get('portal/dashboard',"portaloperation@dashboard");
Route::get('portal/exam_from/{id}',"portaloperation@exam_from");
Route::post('portal/exam_fromsubmit',"portaloperation@exam_fromsubmit");
Route::get('portal/printr/{id}',"portaloperation@printr");
Route::get('portal/update-form',"portaloperation@update_form");
Route::post('portal/fetchformdata',"portaloperation@fetchformdata");
Route::post('portal/exam_fromupdate',"portaloperation@exam_fromupdate");
Route::get('portal/portallogout',"portaloperation@portallogout");

////////////////////////////////////////// student pannel routes
Route::get('student/login',"studentcont@login");
Route::post('student/login',"studentcont@plogin");
Route::get('student/logout',"studentcont@logout");
Route::get('student/dashboard',"studentcont@dashboard");
Route::get('student/exam',"studentcont@exam");
Route::get('student/joinexam/{id}',"studentcont@joinexam");
Route::post('student/submitexm',"studentcont@submitexm");



