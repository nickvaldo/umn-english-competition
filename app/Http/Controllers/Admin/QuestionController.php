<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/* Load Model */
use App\Http\Model\Admin\Educational_StageModel as Educational_Stage;
use App\Http\Model\Admin\QuestionModel as Question;
use App\Http\Model\Admin\TermModel as Term;

class QuestionController extends Controller
{
    // Display Question Page
    public function QuestionView(Request $request, $term_id){
      // Retrieve All Data For Question View Page
      $questions  = Question::SelectQuestionByTermID($term_id);
      $term       = Term::SelectTermByTermID($term_id);
      // Show Question Data on View Page
      return view('admin.question.view',[
        'term_id'   => $term_id,
        'questions' => $questions,
        'term'      => $term,
      ]);
    }
    // Display Question Add Page
    public function QuestionAddView(Request $request, $term_id){
      $term               = Term::SelectTermByTermID($term_id);
      $educational_stage  = Educational_Stage::SelectEducationalStagesByEducationalSTageID($term->educational_stage_id);
      $answer_enum        = $this->getEnumValues('questions','answer');
      // Show Add & Edit Term Page
      return view('admin.question.add-edit',[
        'term_id'           => $term_id,
        'term'              => $term,
        'educational_stage' => $educational_stage,
        'answer_enum'       => $answer_enum,
        'question'          => (object)[], //Create NULL Object
      ]);
    }
    // Process of Adding Question Data
    public function QuestionAddProcess(Request $request, $term_id){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('add_question_admin')){
        // Validate Data
        $request->validate([
          'term'              => 'required|exists:terms,id',
          'educational_stage' => 'required|exists:educational_stages,id',
          'question'          => 'required',
          'first_option'      => 'required',
          'second_option'     => 'required',
          'third_option'      => 'required',
          'fourth_option'     => 'required',
          'answer'            => 'required'
        ]);
        // Insert New Period Data When There is No Period Data
        $question = Question::InsertQuestion($request->term, $request->educational_stage, $request->question, $request->first_option, $request->second_option, $request->third_option, $request->fourth_option, $request->answer);

        // Check Whether Question is Null or Not
        if($term_id != NULL)
          // Redirect to Dashboard Page when Term Id is not NULL
          return redirect('admin/questions/'.$term_id);
        else
          // Redirect Back when Term Id is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
    // Display Question Edit Page
    public function QuestionEditView(Request $request, $term_id, $question_id){
      var_dump($term_id);die;
      // Show Add & Edit Term Page
      return view('admin.question.add-edit',[
        'term'                => (object)[], //Create NULL Object
        'sma'                 => (object)[], //Create NULL Object
        'universitas'         => (object)[], //Create NULL Object
      ]);
    }
    // Select ENUM Value from Current Column in Table
    public function getEnumValues($table, $column){
        $type = DB::select( DB::raw("SHOW COLUMNS FROM $table WHERE Field = '$column'") )[0]->Type;

        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach( explode(',', $matches[1]) as $value ){
            $v = trim( $value, "'" );
            $enum = array_add($enum, $v, $v);
        }
        return $enum;
    }
}
