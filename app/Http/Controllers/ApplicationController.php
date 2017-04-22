<?php

namespace App\Http\Controllers;
use App\Applicant;
use App\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class ApplicationController extends Controller
{
    //

    public function newapplication(){


        return view('application.application');
    }


    public  function applayrequenst(Request $request){

        $app = new Applicant();
        $app->first_name=$request->input('first_name');
        $app->last_name=$request->input('last_name');
        $app->gender="male";//$request->
        $app->nationality=$request->input('nationality');
        $app->birth_date="1990-12-12";//$request->
        $app->relagion=$request->input('relagion');
        $app->phone=$request->input('phone');
        $app->email=$request->input('email');
        $app->address=$request->input('address');
        $app->military="toto";//$request->
        $app->years_experience=2;//$request->
        $app->university="cairo";//$request->
        $app->faculty="engineering";//$request->
        $app->department="computer";//$request->
        $app->gpa=50;//$request->
        $app->graduation_year=2019;//$request->


        $file=$request->file('upload_file');
        $uniqueFileName ='new.pdf'; //=  $file->getClientOriginalName() ;
        $file->move(storage_path('app') , $uniqueFileName);

        $app->cv=$uniqueFileName;



        $app->eval_id=app('App\Http\Controllers\EvaluationController')->newevaluation();

        $app->save();

        $app_id=$app->id;
        $job_id=$request->input('job_id');
        app('App\Http\Controllers\ApplayController')->newapplay($app_id,$job_id);


        if (File::exists(storage_path('cvs/new.pdf')))
        {
            echo asset('storage/cvs/new.pdf ');

            echo $app_id."Yup. It exists.";
        }

        if(  Storage::disk('local')->exists('new.pdf')){
            echo "DAWOOOOOOOOOOD";
        }


        Storage::move('new.pdf' , $app_id . '.pdf');
  //      $file->move(storage_path('cvs/').'new.pdf' , storage_path('cvs/' . $app_id . '.pdf'));
        //Storage::move('cvs/new.pdf', 'cvs/file1.pdf');
//        Storage::move(public_path('cvs/new.pdf'),public_path('cvs/'.$app_id.'.pdf'));
        //Storage::move('cvs/','new.pdf');



        return view('application.thanks');
    }





}
