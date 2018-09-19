<?php

namespace App\Http\Model\Institution;

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
        ->where('term_id',$term_id)
        ->where('questions.deleted', 0)
        ->orderBy('created_at', 'desc')->get();
    }
    // Retrieve Questions Data by Id
    public static function SelectQuestionByID($question_id){
      return self::where('id',$question_id)->first();
    }
    // Retrieve SMA/SMK Questions Data by Term Id
    public static function SelectSMAQuestionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 1)->where('questions.deleted', 0)->get();
    }
    // Retrieve Universitas Questions Data by Term Id
    public static function SelectUniversitasQuestionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 2)->where('questions.deleted', 0)->get();
    }
    // Retrieve SMA/SMK Questions Counter Data by Term Id
    public static function SelectCountSMAQuestionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 1)->where('questions.deleted', 0)->count();
    }
    // Retrieve Universitas Questions Counter Data by Term Id
    public static function SelectCountUniversitasQuestionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 2)->where('questions.deleted', 0)->count();
    }
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
    // Update Current Question Data
    public static function UpdateQuestion($term_id, $educational_stage_id, $question, $first_option, $second_option, $third_option, $fourth_option, $answer, $question_id){
      return self::where('id', $question_id)->update([
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
    // Update Question's Deleted Flag Data
    public static function UpdateDeletedQuestion($question_id){
      return self::where('id', $question_id)->update([
        'deleted' => 1
      ]);
    }
}
