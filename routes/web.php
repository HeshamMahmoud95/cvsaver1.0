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

Route::get('/home', 'HomeController@index');

//Route::get('/application/application/','ApplicationController@newapplication');
//Route::post('/application/thanks','ApplicationController@applayrequenst');


//experiment
Route::get('/evaluation/starteva','EvaluationController@newevaluation');



Route::get('jobs/jobmanager',  'JobController@displayjobs');

Route::get('/jobs/addjob','JobController@addjob');
Route::post('/jobs/addjob','JobController@addjob');

Route::get('jobs/editjob/{job_id}','JobController@editjob');
Route::post('jobs/editjob/{job_id}','JobController@editjob');
Route::get('/jobs/disactivejob/{job_id}','JobController@disactivejob');



Route::get('/offers/offermanager','EvaluationController@display_app_offer');

Route::get('/offer/{response}/{app_id}','EvaluationController@getresponse');
Route::post('/offer/add/{app_id}','EvaluationController@addoffer');
Route::get('/offer/start_edit/{app_id}','EvaluationController@getoffer');
Route::post('/offer/edit/{app_id}','EvaluationController@editoffer');




//___________________________________________________________________


Route::get('/soso/koko','EvaluationController@get_app_offer');




 Route::get('/Hrfun/jobsoptions',"JobController@addjob");
Route::post('/Hrfun/jobsoptions',"JobController@addjob");

Route::get('/Hrfun/jobsoptions2','JobController@hrdisplayjobs');
Route::post('/Hrfun/jobsoptions2','JobController@hrdisplayjobs');






//routes for applicant form
Route::get('/ui/appform',"ApplicationController@newapplication");
Route::POST('/application/thanks','ApplicationController@applayrequenst');
Route::get('/ui/appjobs',"JobController@displayjobs");
Route::POST('/ui/appjobs',"JobController@displayjobs");
Route::get('/ui/description/{id}',"JobController@getjob");












//Route::POST('/ui/description/{id}',"JobController@getjob");
/*

Route::get('/Hrfun/jobsoptions',"HRcontroller@jobsoptions");

Route::get('/Hr/jobsoptions',"HRcontroller@jobsoptions");
Route::get('/Hrfun/offers',"HRcontroller@offers");
Route::get('/Hrfun/app_offers',"HRcontroller@app_offers");
Route::post('/Hrfun/jobsoptions',"HRcontroller@jobsoptions");
Route::post('/Hrfun/offers',"HRcontroller@offers");





Route::get('/ui/appform',"uicontroller@appform");
Route::get('/ui/appjobs',"uicontroller@appjobs");

Route::get('/ui/description',"uicontroller@descr");
Route::POST('/ui/appjobs',"uicontroller@appjobs");
Route::POST('/ui/description',"uicontroller@descr");
Route::get('/Hr/jobsoptions',"HRcontroller@jobsoptions");
Route::get('/Hrfun/offers',"HRcontroller@offers");
Route::get('/Hrfun/app_offers',"HRcontroller@app_offers");

Route::post('/Hrfun/offers',"HRcontroller@offers");
Route::post('/ui/appform',"uicontroller@appform");
Route::get('/Hrfun/v',"HRcontroller@ve");
Route::get('/Hrfun/editjob',"HRcontroller@edit");
Route::post('/Hrfun/editjob',"HRcontroller@edit");
Route::post('/Hrfun/app_offers',"HRcontroller@app_offers");

*/







