<?php

namespace App\Http\Controllers;

use App\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function addjob(Request $request){

        if($request->isMethod('post')){
            $job = new Job();
            $job->name=$request->input('name');
            $job->description=$request->input('description');
            $mytime = Carbon::now();
            $job->announcement_date=$mytime->toDateString();
            $job->active=true;
            $job->save();

            return $this->displayjobs();
        }

        return view('jobs.addjob');
    }

    public function displayjobs(){
        $jobs=Job::where('active',true)->get();
        $arr=array('job_list'=>$jobs);
        return view('jobs.jobmanager',$arr);

    }

    public function editjob(Request $request,$job_id){
        if($request->isMethod('post')){

            Job::where('job_id', $job_id)
                ->update(['name' => $request->input('name')],
                    ['description' => $request->input('description')]);

            return $this->displayjobs();
        }

        $job=Job::where('job_id',$job_id)->get();
        $arr=array('job'=>$job);
        return view('jobs.editjob',$arr);
    }

    public function disactivejob($job_id){
        Job::where('job_id',$job_id)
            ->update(['active'=>false]);
        return $this->displayjobs();
    }


}
