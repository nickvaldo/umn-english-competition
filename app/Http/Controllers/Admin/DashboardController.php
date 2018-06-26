<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Load Model */
use App\Http\Model\Admin\Educational_StageModel as Educational_Stage;
use App\Http\Model\Admin\PeriodModel as Period;
use App\Http\Model\Admin\TermModel as Term;

class DashboardController extends Controller
{
    // Display Dashboard Page
    public function DashboardView(Request $request){
      // Retrieve All Terms Data
      $terms = Term::SelectAllTerms();
      // Show All Terms Data on Dashboard
      return view('admin.dashboard',['terms' => $terms]);
    }
    // Display Term Add Page
    public function TermAddView(Request $request){
      // Retrieve All Education Stages Data
      $educational_stages = Educational_Stage::SelectAllEducationalStages();
      // Retrieve All Periods Data
      $periods            = Period::SelectAllPeriods();
      // Show Add & Edit Term Page
      return view('admin.term.add-edit',[
        'term'                => (object)[], //Create NULL Object
        'sma'                 => (object)[], //Create NULL Object
        'universitas'         => (object)[], //Create NULL Object
        'educational_stages'  => $educational_stages,
        'periods'             => $periods,
      ]);
    }
    // Process of Adding Term DATA
    public function TermAddProcess(Request $request){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('add_term_admin')){
        // Validate Data
        $request->validate([
          'educational_stage'               => 'required|exists:educational_stages,id',
          'period'                          => 'required|unique:periods,year',
          'sma_number_of_question'          => 'required',
          'sma_login_time'                  => 'required',
          'sma_test_time'                   => 'required',
          'sma_test_duration'               => 'required',
          'universitas_number_of_question'  => 'required',
          'universitas_login_time'          => 'required',
          'universitas_test_time'           => 'required',
          'universitas_test_duration'       => 'required',
        ]);
        // Retrieve Current Period Data by Year
        $period  = Period::SelectPeriodByYear($request->period);
        // Insert New Period Data When There is No Period Data
        if(!isset($period)){ $period = Period::InsertPeriod($request->period); }
        // Set Term Id Variable Equal to NULL
        $term_id    = NULL;
        foreach ($request->educational_stage as $index => $educational_stage_id) {
          if(!strcmp($educational_stage_id,"1")){ // SMA/SMK
            // Set SMA/SMK Term Data
            $term               = "SMA/SMK PRE Elimination Test ".$request->period;
            $number_of_question = $request->sma_number_of_question;
            $login_datetime     = date_format(date_create($request->sma_login_time),"Y-m-d H:i:s");
            $test_datetime      = date_format(date_create($request->sma_test_time),"Y-m-d H:i:s");
            $tolerance_datetime = date("Y-m-d H:i:s", strtotime('+'.$request->sma_test_duration.' hours', strtotime($test_datetime)));
          }elseif(!strcmp($educational_stage_id,"2")){ // Universitas
            // Set Universitas Term Data
            $term               = "Universitas PRE Elimination Test ".$request->period;
            $number_of_question = $request->universitas_number_of_question;
            $login_datetime     = date_format(date_create($request->universitas_login_time),"Y-m-d H:i:s");
            $test_datetime      = date_format(date_create($request->universitas_test_time),"Y-m-d H:i:s");
            $tolerance_datetime = date("Y-m-d H:i:s", strtotime('+'.$request->universitas_test_duration.' hours', strtotime($test_datetime)));
          }
          // Insert New Term
          $term_id = Term::InsertTerm($period->id, $educational_stage_id, $term, $number_of_question, $login_datetime, $test_datetime, $tolerance_datetime);
        }
        // Check Whether Term Id is Null or Not
        if($term_id != NULL)
          // Redirect to Dashboard Page when Term Id is not NULL
          return redirect('admin/index');
        else
          // Redirect Back when Term Id is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
    // Display Term Edit Page
    public function TermEditView(Request $request, $period_id){
      // Retrieve Current Term Data
      $term               = Term::SelectTermByPeriodID($period_id);
      $sma                = Term::SelectSMATermByPeriodID($period_id);
      $universitas        = Term::SelectUniversitasTermByPeriodID($period_id);
      // Retrieve All Education Stages Data
      $educational_stages = Educational_Stage::SelectAllEducationalStages();
      // Retrieve All Periods Data
      $periods            = Period::SelectAllPeriods();
      // Show Add & Edit Term Page
      return view('admin.term.add-edit',[
        'term'                => $term,
        'sma'                 => $sma,
        'universitas'         => $universitas,
        'educational_stages'  => $educational_stages,
        'periods'             => $periods,
      ]);
    }
    // Process of Editing Term DATA
    public function TermEditProcess(Request $request, $period_id){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('edit_term_admin')){
        // Validate Data
        $request->validate([
          'educational_stage'               => 'required|exists:educational_stages,id',
          'period'                          => 'required',
          'sma_number_of_question'          => 'required',
          'sma_login_time'                  => 'required',
          'sma_test_time'                   => 'required',
          'sma_test_duration'               => 'required',
          'universitas_number_of_question'  => 'required',
          'universitas_login_time'          => 'required',
          'universitas_test_time'           => 'required',
          'universitas_test_duration'       => 'required',
        ]);
        // Retrieve Current Period Data by Year
        $period  = Period::SelectPeriodByYear($request->period);
        // Set Term Id Variable Equal to NULL
        $term_id    = NULL;
        foreach ($request->educational_stage as $index => $educational_stage_id) {
          if(!strcmp($educational_stage_id,"1")){ // SMA/SMK
            // Set SMA/SMK Term Data
            $term               = "SMA/SMK PRE Elimination Test ".$request->period;
            $number_of_question = $request->sma_number_of_question;
            $login_datetime     = date_format(date_create($request->sma_login_time),"Y-m-d H:i:s");
            $test_datetime      = date_format(date_create($request->sma_test_time),"Y-m-d H:i:s");
            $tolerance_datetime = date("Y-m-d H:i:s", strtotime('+'.$request->sma_test_duration.' hours', strtotime($test_datetime)));
          }elseif(!strcmp($educational_stage_id,"2")){ // Universitas
            // Set Universitas Term Data
            $term               = "Universitas PRE Elimination Test ".$request->period;
            $number_of_question = $request->universitas_number_of_question;
            $login_datetime     = date_format(date_create($request->universitas_login_time),"Y-m-d H:i:s");
            $test_datetime      = date_format(date_create($request->universitas_test_time),"Y-m-d H:i:s");
            $tolerance_datetime = date("Y-m-d H:i:s", strtotime('+'.$request->universitas_test_duration.' hours', strtotime($test_datetime)));
          }
          // Update Current Term
          $term_id = Term::UpdateTerm($period->id, $educational_stage_id, $term, $number_of_question, $login_datetime, $test_datetime, $tolerance_datetime);
        }
        // Check Whether Term Id is Null or Not
        if($term_id != NULL)
          // Redirect to Dashboard Page when Term Id is not NULL
            return redirect('admin/index');
        else
          // Redirect Back when Term Id is NUll
            return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
}
