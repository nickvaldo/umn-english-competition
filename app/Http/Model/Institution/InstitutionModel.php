<?php

namespace App\Http\Model\Institution;

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

    // Retrieve Institution Data by Username
    public static function SelectInstitutionByUsername($username){
      return self::where('username',$username)->first();
    }
    // Retrieve Institutions Data by Term Id
    public static function SelectInstitutionByTermID($term_id){
      return self::select('institutions.id as institution_id',
                          'terms.term as term',
                          'educational_stages.educational_stage as educational_stage',
                          'institutions.team_name as team_name',
                          'institutions.institution_name as institution_name',
                          'institutions.institution_address as institution_address',
                          'institutions.points as points',
                          'institutions.created_at as created_at',
                          'institutions.updated_at as updated_at')
        ->join('terms', 'institutions.term_id', '=', 'terms.id')
        ->join('educational_stages', 'institutions.educational_stage_id', '=', 'educational_stages.id')
        ->where('term_id',$term_id)
        ->where('institutions.deleted', 0)
        ->orderBy('created_at', 'desc')->get();
    }
    // Retrieve Institution Data by Id
    public static function SelectInstitutionByID($institution_id){
      return self::where('id',$institution_id)->first();
    }
    // Retrieve SMA/SMK Institutions Data by Term Id
    public static function SelectSMAInstitutionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 1)->where('institutions.deleted', 0)->get();
    }
    // Retrieve Universitas Institutions Data by Term Id
    public static function SelectUniversitasInstitutionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 2)->where('institutions.deleted', 0)->get();
    }
    // Retrieve SMA/SMK Institutions Counter Data by Term Id
    public static function SelectCountSMAInstitutionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 1)->where('institutions.deleted', 0)->count();
    }
    // Retrieve Universitas Institutions Counter Data by Term Id
    public static function SelectCountUniversitasInstitutionByTermID($term_id){
      return self::where('term_id',$term_id)->where('educational_stage_id', 2)->where('institutions.deleted', 0)->count();
    }
    // Create New Institution Data
    public static function InsertInstitution($term_id, $educational_stage_id, $username, $password, $team_name, $institution_name, $institution_address, $points){
      return self::create([
        'term_id'               => $term_id,
        'educational_stage_id'  => $educational_stage_id,
        'username'              => $username,
        'password'              => $password,
        'team_name'             => $team_name,
        'institution_name'      => $institution_name,
        'institution_address'   => $institution_address,
        'points'                => $points
      ]);
    }
    // Update Current Institution Data
    public static function UpdateInstitution($term_id, $educational_stage_id, $username, $password, $team_name, $institution_name, $institution_address, $points, $institution_id){
      return self::where('id', $institution_id)->update([
        'term_id'               => $term_id,
        'educational_stage_id'  => $educational_stage_id,
        'username'              => $username,
        'password'              => $password,
        'team_name'             => $team_name,
        'institution_name'      => $institution_name,
        'institution_address'   => $institution_address,
        'points'                => $points
      ]);
    }
    // Update Institution's Deleted Flag Data
    public static function UpdateDeletedInstitution($institution_id){
      return self::where('id', $institution_id)->update([
        'deleted' => 1
      ]);
    }
}
