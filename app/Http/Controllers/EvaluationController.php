<?php

namespace App\Http\Controllers;

use App\Applay;
use App\Applicant;
use App\Evaluation;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Plugin\AbstractPlugin;

class EvaluationController extends Controller
{
    //this function get the applicant and the job for every applicant who pass the all exams and
    //ready to receive job offer
    //and send them to the page which begin offers management

    public function get_app_offer(){


        //this code in comments below has no importance
        /*
        $applys =collect([]);
        $apps=collect([]);
        $jobs=collect([]);

        //get all evaluations that pass interview stage
        $evals = Evaluation::where('interview_result',true)->get();


        //get all applicants who own the previous evaluations
        foreach ($evals as $eval){
            $apps->push(Applicant::where('id',$eval->app_id)->first());
        }

        //get the jobs of the previous applicants
        foreach ($apps as $app){
          $apply=  Applay::where('app_id',$app->id)->first();
          $jobs->push(Job::where('id',  $apply->job_id  )->first());
        }



        $apps_arr=array('apps'=>$apps);


                $jobs_arr=array('jobs'=>$jobs);

        foreach ( $jobs as $job)
        {
            echo $job."|_________ ____|\n\n";}

     //   return view('Hrfun/offers',);


        echo "____________________________________________________________
        __________________________________________________________________
        ______________________________________________________________\n\n";


*/

        $tab = DB::table('evaluations')
            ->join('applicants' , 'applicants.id' ,'=', 'evaluations.app_id')
            ->join('applays' , 'applays.app_id' ,'=','applicants.id')
            ->join('jobs' ,'jobs.id' ,'=','applays.job_id')
            ->where('evaluations.interview_result' , '=' ,true)
            ->select('applicants.first','applicants.last','jobs.name','evaluations.id')
            ->get();

        $arr=array('data'=>$tab);
        return view('/Hrfun/offers',$arr);

        //echo $tab;


    }

    public  function sendoffer(Request $request , $eval_id){
        //the offer from the request
        $offerdata = $request->input('offer_description'.$eval_id);

        DB::table('evaluations')
            ->where('id',$eval_id)
            ->update(['offer' => $offerdata]);

       return $this->get_app_offer();
    }

    public function edit_offer_page(){



        $tab = DB::table('evaluations')
            ->join('applicants' , 'applicants.id' ,'=', 'evaluations.app_id')
            ->join('applays' , 'applays.app_id' ,'=','applicants.id')
            ->join('jobs' ,'jobs.id' ,'=','applays.job_id')
            ->where('evaluations.interview_result' , '=' ,true)
            ->select('applicants.first','applicants.last','jobs.name','evaluations.*')
            ->get();

        $arr=array('data'=>$tab);

        return view('/Hrfun/app_offers',$arr);
    }


    public function edit_offer(Request $request ,$eval_id){

        DB::table('evaluations')
            ->where('id',$eval_id)
            ->update(['offer' => $request->input('edit_offer_description'.$eval_id)]);

        return $this->edit_offer_page();
    }

    public function edit_response(Request $request ,$eval_id){

        if ($request->input('response_state'.$eval_id)=="Accepted")
            $respo=1;
        elseif($request->input('response_state'.$eval_id)=="Rejected")
            $respo=2;
        else
            $respo=0;


        DB::table('evaluations')
            ->where('id',$eval_id)
            ->update(['response' => $respo]);

        return $this->edit_offer_page();

    }

    public function edit_refuse(Request $request ,$eval_id){

        DB::table('evaluations')
            ->where('id',$eval_id)
            ->update(['refuse' => $request->input('refuse_reason'.$eval_id)]);

        return $this->edit_offer_page();
    }








































    //this function create new row in evaluation table



/*
    public function newevaluation(){

        $eval = new Evaluation();
        $eval->cv_notes="";
        $eval->cv_result=false;
        $eval->english=0;
        $eval->iq=0;
        $eval->technical=0;
        $eval->exam_result=false;
        $eval->interview_notes="";
        $eval->interview_result=false;
        $eval->degree=0;
        $eval->offer="";
        $eval->response=0;
        $eval->refuse="";
        $eval->save();
        $last_id = $eval->id;
        return $last_id;

        return view('/evaluation.starteva');
    }


    //this function display the offer manager
public function display_app_offer(){

        $evals = Evaluation::where('interview_result',true)->get();
        $app=collect([]);
        $app_evval=collect([]);
    foreach ($evals as $eval)
        {
            $app->push(Applicant::where('app_id',$eval->eval_id)->get()->first());

            //echo $app[0]->first_name.' ';
        }
        return view('offers.offermanager',array('app_off'=>$app),array());


}

//this function add response to database and return the offermanager display
    public  function getresponse($response , $app_id){
    $app = Applicant::where('app_id',$app_id)->get()->first();
    //$eval = Evaluation::where('eval_id',$app->eval_id)->get()->first();
    //$eval->response=$response;

        Evaluation::where('eval_id',$app->eval_id)
            ->update(['response' => $response]);

    return    $this->display_app_offer();

    }


    //this function add offer to the database and return the offermanager display
    public function addoffer(Request $request , $app_id){
        $app = Applicant::where('app_id',$app_id)->get()->first();
        Evaluation::where('eval_id',$app->eval_id)
            ->update(['offer'=>$request->input('add_offer')]);
        return $this->display_app_offer();
    }


    //this function still under development
    //this function return the offer for this applicant to display for editing
    public function getoffer($app_id){
        $app = Applicant::where('app_id',$app_id)->get()->first();
        $eval = Evaluation::where('eval_id',$app->eval_id)->get()->first();

        return $this->display_app_offer();
    }

//    public function editoffer(Request $request ,$app_id){
//        $app = Applicant::where('app_id',$app_id)->get()->first();
//        $eval = Evaluation::where('eval_id',$app->eval_id)->get()->first();
//        $arr = array('evaly'=>$eval);
//        return $this ->display_app_offer();
//
/    }


*/
}
