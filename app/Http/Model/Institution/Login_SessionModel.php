<?php

namespace App\Http\Model\Institution;

use Illuminate\Database\Eloquent\Model;

class Login_SessionModel extends Model
{
    protected $table = 'login_sessions';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    
    // Create New Login Session Data
    public static function InsertLoginSession($institution_id, $active_at, $active_device){
        return self::create([
          'institution_id'  => $institution_id,
          'active_at'       => $active_at,
          'active_device'   => $active_device
        ]);
    }
    // Retrieve Login Session Data by Id
    public static function SelectLoginSessionByIntitutionID($institution_id){
        return self::where('id',$institution_id)->first();
    }
    // Update Current Login Session Data by Institution Id
    public static function UpdateLoginSessionByInstitutionID($institution_id, $active_device){
        return self::where('id', $institution_id)->update([
          'active_device'   => $active_device
        ]);
    }
}
