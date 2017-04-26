<?php

namespace App\Http\Controllers;

use App\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
//    protected $table = ['id', 'name', 'email', 'address', 'created_at', 'updated_at'];
    //
    public function addjob(Request $request){
//        echo "hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh";
        if($request->isMethod('post')){
            $job = new Job();
            $job->name=$request->input('name');
            $job->description=$request->input('description');
            $mytime = Carbon::now();
            $job->announcement_date='2013-12-12'; //$mytime->toDateString();
            $job->active=true;
            $job->save();

//            return $this->displayjobs();
        }
//        return redirect('/Hrfun/jobsoptions');
        $jobs = Job::all();
        $arr = array('jobs'=>$jobs);
        return view('/Hrfun/jobsoptions',$arr);
    }

    /*
    public function editjob(Request $request ,$job_id){
        $job = Job::where('job_id',$job_id)
            ->update(['name'=>$request->input('name')],
                ['description'=>$request->input('description')]);
        return $this->displayjobs();

    }
*/




    public function displayjobs(){
        $jobs=Job::where('active',true)->get();
        $arr=array('jobs'=>$jobs);
        return view('/ui/appjobs',$arr);

    }




    public function hrdisplayjobs(){
        $jobs=Job::where('active',true)->get();
        $arr=array('jobs'=>$jobs);
//        echo "sooooooooooooooooo";
        return view('/Hrfun/jobsoptions',$arr);

    }




    public function getjob($id){
        $job = Job::where('id',$id)->get();
        $arr = array('jobs'=>$job);
        return view('/ui/description',$arr);


    }




    public function editjob(Request $request,$job_id){

        if($request->isMethod('post')){

            Job::find($job_id)
                ->update(['name'=>$request->input('name'),'description'=>$request->input('description')]);




            return $this->displayjobs();
        }

        $job=Job::find($job_id)->get();
        $arr=array('job'=>$job);
        return view('jobs.editjob',$arr);
    }






    public function disactivejob($job_id){
        echo "start";
        echo $job_id;
        Job::where('id',$job_id)
            ->update(['active'=>false]);


        echo "done";
        return $this->displayjobs();
    }



    public function jobsoptions(){


        return view('/Hrfun/jobsoptions');
    }







}
