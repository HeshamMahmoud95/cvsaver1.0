<?php

namespace App\Http\Controllers;
use App\Applicant;
use App\Evaluation;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class ApplicationController extends Controller
{
    //

    public function newapplication(){
        $jobs = Job::all();
        $arr = array('jobs'=>$jobs);

        return view('/ui/appform',$arr);
    }


    public  function applayrequenst(Request $request){

        $app = new Applicant();
        $app->first=$request->input('first_name');
        $app->last=$request->input('last_name');
        $app->gender=$request->input('gender');
        $app->nation=$request->input('nationality');
        $app->bod=$request->input('birth_date');
        $app->religion=$request->input('religion');
        $app->phone=$request->input('phone');
        $app->email=$request->input('email');
        $app->address=$request->input('address');
        $app->military=$request->input('military');
        $app->yoe=2;//$request->input('experience_year');
        $app->university=$request->input('university');
        $app->faculty=$request->input('faculty');
        $app->department=$request->input('department');
        $app->gpa=$request->input('gpa');
        $app->graduation_year=$request->input('graduation_year');


        $file=$request->file('upload_file');
        $uniqueFileName ='new.pdf';


      //  $file->move(storage_path('app') , $uniqueFileName);

        $app->cv=$uniqueFileName;



        $app->save();

        $app_id=$app->id;
        $job = Job::where('name',$request->input('job'))->get()->first();


       // $app = Applicant::where('app_id',$app_id)->get()->first();
       // Evaluation::where('eval_id',$app->eval_id)
       //     ->update(['offer'=>$request->input('add_offer')]);


        $job_id=$job->id;


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



        return view('/application/thanks');
    }





}
