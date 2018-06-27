<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TermModel extends Model
{
    protected $table = 'terms';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve All Raw Terms Data
    public static function SelectAllRawTerms(){
      return self::select('periods.id as period_id',
                          'periods.year as period_year',
                          'educational_stages.id as educational_stage_id',
                          'terms.created_at as term_created_at',
                          'terms.updated_at as term_updated_at')
              ->join('periods', 'terms.period_id', '=', 'periods.id')
              ->join('educational_stages', 'terms.educational_stage_id', '=', 'educational_stages.id')
              ->where('terms.deleted', FALSE)
              ->where('periods.deleted', FALSE)
              ->where('educational_stages.deleted', FALSE)
              ->orderBy('terms.id','desc')->get();
    }
    // Retrieve Current Raw Term Data by Period Id
    public static function SelectRawTermByPeriodID($period_id){
      return self::select('periods.id as period_id',
                          'terms.id as term_id',
                          'periods.year as period_year',
                          'educational_stages.id as educational_stage_id',
                          'terms.created_at as term_created_at',
                          'terms.updated_at as term_updated_at')
              ->join('periods', 'terms.period_id', '=', 'periods.id')
              ->join('educational_stages', 'terms.educational_stage_id', '=', 'educational_stages.id')
              ->where('terms.deleted', FALSE)
              ->where('periods.deleted', FALSE)
              ->where('educational_stages.deleted', FALSE)
              ->where('terms.period_id',$period_id)
              ->orderBy('terms.id','desc')->get();
    }
    // Retrieve All Terms Data
    public static function SelectAllTerms(){
      return self::select('periods.id as period_id',
                          'periods.year as period_year',
                          'educational_stages.id as educational_stage_id',
                          DB::raw('GROUP_CONCAT(educational_stages.educational_stage SEPARATOR ", ") as educational_stage'),
                          'terms.created_at as term_created_at',
                          'terms.updated_at as term_updated_at')
              ->join('periods', 'terms.period_id', '=', 'periods.id')
              ->join('educational_stages', 'terms.educational_stage_id', '=', 'educational_stages.id')
              ->where('terms.deleted', FALSE)
              ->where('periods.deleted', FALSE)
              ->where('educational_stages.deleted', FALSE)
              ->groupBy('periods.id')
              ->orderBy('terms.id','desc')->get();
    }
    // Retrieve Current Term Data by Period Id
    public static function SelectTermByPeriodID($period_id){
      return self::select('periods.id as period_id',
                          'periods.year as period_year',
                          'educational_stages.id as educational_stage_id',
                          DB::raw('GROUP_CONCAT(educational_stages.educational_stage SEPARATOR ", ") as educational_stage'),
                          'terms.created_at as term_created_at',
                          'terms.updated_at as term_updated_at')
              ->join('periods', 'terms.period_id', '=', 'periods.id')
              ->join('educational_stages', 'terms.educational_stage_id', '=', 'educational_stages.id')
              ->where('terms.deleted', FALSE)
              ->where('periods.deleted', FALSE)
              ->where('educational_stages.deleted', FALSE)
              ->where('terms.period_id',$period_id)
              ->groupBy('periods.id')
              ->orderBy('terms.id','desc')->first();
    }
    // Retrieve Current Term Data by Term Id
    public static function SelectTermByTermID($term_id){
      return self::select('terms.id as term_id',
                          'terms.term as term',
                          'periods.id as period_id',
                          'periods.year as period_year',
                          'educational_stages.id as educational_stage_id',
                          DB::raw('GROUP_CONCAT(educational_stages.educational_stage SEPARATOR ", ") as educational_stage'),
                          'terms.created_at as term_created_at',
                          'terms.updated_at as term_updated_at')
              ->join('periods', 'terms.period_id', '=', 'periods.id')
              ->join('educational_stages', 'terms.educational_stage_id', '=', 'educational_stages.id')
              ->where('terms.deleted', FALSE)
              ->where('periods.deleted', FALSE)
              ->where('educational_stages.deleted', FALSE)
              ->where('terms.id',$term_id)
              ->groupBy('periods.id')
              ->orderBy('terms.id','desc')->first();
    }
    // Retrieve SMA/SMK Current Term Data by Period Id
    public static function SelectSMATermByPeriodID($period_id){
      return self::where('period_id',$period_id)
              ->where('deleted', FALSE)
              ->where('educational_stage_id', 1)
              ->first();
    }
    // Retrieve Universitas Current Term Data by Period Id
    public static function SelectUniversitasTermByPeriodID($period_id){
      return self::where('period_id',$period_id)
              ->where('deleted', FALSE)
              ->where('educational_stage_id', 2)
              ->first();
    }
    // Insert New Term
    public static function InsertTerm($period_id, $educational_stage_id, $term, $number_of_question, $login_datetime, $test_datetime, $tolerance_datetime){
      return self::create([
        'period_id'             => $period_id,
        'educational_stage_id'  => $educational_stage_id,
        'term'                  => $term,
        'number_of_question'    => $number_of_question,
        'login_datetime'        => $login_datetime,
        'test_datetime'         => $test_datetime,
        'tolerance_datetime'    => $tolerance_datetime,
      ]);
    }
    // Update Current Term
    public static function UpdateTerm($period_id, $educational_stage_id, $term, $number_of_question, $login_datetime, $test_datetime, $tolerance_datetime){
      return self::where('period_id', $period_id)
                ->where('educational_stage_id', $educational_stage_id)->update([
          'term'                  => $term,
          'number_of_question'    => $number_of_question,
          'login_datetime'        => $login_datetime,
          'test_datetime'         => $test_datetime,
          'tolerance_datetime'    => $tolerance_datetime,
      ]);
    }
}
