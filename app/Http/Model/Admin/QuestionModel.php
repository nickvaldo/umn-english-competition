<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve Questions Data by Term Id
    public static function SelectQuestionByTermID($term_id){
      return self::select('questions.id as question_id',
                          'terms.term as term',
                          'educational_stages.educational_stage as educational_stage',
                          'questions.question as question',
                          'questions.first_option as first_option',
                          'questions.second_option as second_option',
                          'questions.third_option as third_option',
                          'questions.fourth_option as fourth_option',
                          'questions.answer as answer',
                          'questions.created_at as created_at',
                          'questions.updated_at as updated_at')
        ->join('terms', 'questions.term_id', '=', 'terms.id')
        ->join('educational_stages', 'questions.educational_stage_id', '=', 'educational_stages.id')
        ->where('term_id',$term_id)->get();
    }
    // NOT USED
    // Retrieve SMA/SMK Questions Data by Term Id
    public static function SelectSMAQuestionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 1)->get();
    }
    // Retrieve Universitas Questions Data by Term Id
    public static function SelectUniversitasQuestionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 2)->get();
    }
    // Retrieve SMA/SMK Questions Counter Data by Term Id
    public static function SelectCountSMAQuestionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 1)->count();
    }
    // Retrieve Universitas Questions Counter Data by Term Id
    public static function SelectCountUniversitasQuestionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 2)->count();
    }
    // END NOT USED
    // Create New Question Data
    public static function InsertQuestion($term_id, $educational_stage_id, $question, $first_option, $second_option, $third_option, $fourth_option, $answer){
      return self::create([
        'term_id'               => $term_id,
        'educational_stage_id'  => $educational_stage_id,
        'question'              => $question,
        'first_option'          => $first_option,
        'second_option'         => $second_option,
        'third_option'          => $third_option,
        'fourth_option'         => $fourth_option,
        'answer'                => $answer
      ]);
    }
}
