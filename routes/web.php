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

Route::get('/application/application/','ApplicationController@newapplication');
Route::post('/application/thanks','ApplicationController@applayrequenst');


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