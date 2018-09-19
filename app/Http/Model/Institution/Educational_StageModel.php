<?php

namespace App\Http\Model\Institution;

use Illuminate\Database\Eloquent\Model;

class Educational_StageModel extends Model
{
    protected $table = 'educational_stages';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve All Education Stages Data
    public static function SelectAllEducationalStages(){
      return self::all();
    }
    // Retrieve Current Education Stages Data by Educational Stage Id
    public static function SelectEducationalStagesByEducationalSTageID($educational_stage_id){
      return self::where('id',$educational_stage_id)->first();
    }
}
