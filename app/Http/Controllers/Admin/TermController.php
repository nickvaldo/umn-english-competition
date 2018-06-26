<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Load Model */
use App\Http\Model\Admin\InstitutionModel as Institution;
use App\Http\Model\Admin\QuestionModel as Question;
use App\Http\Model\Admin\TermModel as Term;

class TermController extends Controller
{
    // Display Term Dashboard Page
    public function TermDashboardView(Request $request, $period_id){
      // Retrieve Current Term Data
      $term         = Term::SelectTermByPeriodID($period_id);
      $sma          = Term::SelectSMATermByPeriodID($period_id);
      $universitas  = Term::SelectUniversitasTermByPeriodID($period_id);
      $raw_terms    = Term::SelectRawTermByPeriodID($period_id);
      foreach ($raw_terms as $index => $term) {
        if($term->educational_stage_id == 1){ // SMA/SMK;
          $sma_term_id                    = $term->term_id;
          $sma_participants_count         = Institution::SelectCountSMAInstitutionByTermID($term->term_id);
          $sma_participants               = Institution::SelectSMAInstitutionByTermID($term->term_id);
          $sma_questions_count            = Question::SelectCountSMAQuestionByTermID($term->term_id);
          $sma_questions                  = Question::SelectSMAQuestionByTermID($term->term_id);
        }else if($term->educational_stage_id == 2){ // Universitas;
          $universitas_term_id            = $term->term_id;
          $universitas_participants_count = Institution::SelectCountUniversitasInstitutionByTermID($term->term_id);
          $universitas_participants       = Institution::SelectUniversitasInstitutionByTermID($term->term_id);
          $universitas_questions_count    = Question::SelectCountUniversitasQuestionByTermID($term->term_id);
          $universitas_questions          = Question::SelectUniversitasQuestionByTermID($term->term_id);
        }
      }
      //Create or Update Selected Term Session
      session(['selected_term' => [
        'period_id'           => $period_id,
        'term'                => $term,
        'sma_term_id'         => $sma_term_id,
        'universitas_term_id' => $universitas_term_id
      ]]);
      // Show Terms Data on Term Dashboard
      return view('admin.term.term-dashboard',[
        'term'                           => $term,
        'sma'                            => $sma,
        'universitas'                    => $universitas,
        'raw_terms'                      => $raw_terms,
        'sma_participants_count'         => $sma_participants_count,
        'sma_participants'               => $sma_participants,
        'sma_questions_count'            => $sma_questions_count,
        'sma_questions'                  => $sma_questions,
        'universitas_participants_count' => $universitas_participants_count,
        'universitas_participants'       => $universitas_participants,
        'universitas_questions_count'    => $universitas_questions_count,
        'universitas_questions'          => $universitas_questions,
      ]);
    }
}
