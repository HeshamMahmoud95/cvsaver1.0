<?php

namespace App\Http\Controllers;

use App\Applay;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplayController extends Controller
{
    // creating applay relationship between new applicant and existed job
    /**
     * @param $app_id
     * @param $job_id
     * @return mixed
     */
    public function newapplay($app_id, $job_id){
        $aply = new Applay();
        $aply->app_id=$app_id;
        $aply->job_id=$job_id;
        $mytime = Carbon::now();
        $aply->date=$mytime->toDateString();
        $aply->save();
        return $aply->id;


    }
}
