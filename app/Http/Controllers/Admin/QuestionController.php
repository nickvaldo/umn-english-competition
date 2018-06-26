<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Load Model */
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
        'questions' => $questions,
        'term'      => $term,
      ]);
    }
}
