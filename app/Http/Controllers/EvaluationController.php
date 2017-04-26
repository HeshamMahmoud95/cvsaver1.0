<?php

namespace App\Http\Controllers;

use App\Applay;
use App\Applicant;
use App\Evaluation;
use App\Job;
use Illuminate\Http\Request;
use League\Flysystem\Plugin\AbstractPlugin;

class EvaluationController extends Controller
{
    //


    public function get_app_offer(){
        echo "haaaaaaaaaa";
        $evals = Evaluation::where('interview_result',true)->get();
            $applys =collect([]);
            $apps=collect([]);
            $jobs=collect([]);

//            echo $evals;
        foreach ($evals as $eval){
            $apps->push(Applicant::where('id',$eval->app_id)->get());


  //          echo "YES=YES=YES=YES=YES=YES";
        }

//        echo $apps;

        foreach ($apps as $app){
             // echo $app[0]->id;
          $rr=  Applay::where('app_id',$app[0]->id)->get();
//echo"&&&&&&&&&&&&&&&&&&";
          foreach ($rr as $r) {
  //        echo $r." ********************";
              $ss = $r->job_id;
              $jobs->push(Job::where('id',  $ss  )->get());
          }


        }
    //    echo "_________________________________________________________________________________________________________________________________";
        foreach ( $jobs as $job)
        {echo $job."|_________ ____|";}







        /*
        $applays = DB::table('applays')
            ->join('', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.id', 'contacts.phone', 'orders.price')
            ->get();

*/

    echo "hooooo";
        return view('application/thanks');

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
