<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    //


    //this function create new row in evaluation table
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

//        return view('evaluation.starteva');
    }


    //this function display the offer manager
public function display_app_offer(){

        $evals = Evaluation::where('interview_result',true)->get();
        $app=collect([]);
    foreach ($evals as $eval)
        {
            $app->push(Applicant::where('app_id',$eval->eval_id)->get());
            //echo $app[0]->first_name.' ';
        }
        return view('offers.offermanager',array('app_off'=>$app));


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



}
