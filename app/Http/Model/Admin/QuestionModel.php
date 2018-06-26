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
      return self::where('term_id',$term_id)->get();
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
}
