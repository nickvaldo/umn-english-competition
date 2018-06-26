<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class InstitutionModel extends Model
{
    protected $table = 'institutions';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve SMA/SMK Institutions Data by Term Id
    public static function SelectSMAInstitutionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 1)->get();
    }
    // Retrieve Universitas Institutions Data by Term Id
    public static function SelectUniversitasInstitutionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 2)->get();
    }
    // Retrieve SMA/SMK Institutions Counter Data by Term Id
    public static function SelectCountSMAInstitutionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 1)->count();
    }
    // Retrieve Universitas Institutions Counter Data by Term Id
    public static function SelectCountUniversitasInstitutionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 2)->count();
    }
}
