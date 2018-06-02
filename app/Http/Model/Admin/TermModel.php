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
              ->orderBy('terms.created_at','desc')->get();
    }
}
