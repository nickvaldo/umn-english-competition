<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class RuleModel extends Model
{
    protected $table = 'rules';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve Rule Data by Id
    public static function SelectRule(){
      return self::where('deleted', 0)->first();
    }
    // Retrieve Rule Data by Id
    public static function SelectRuleByID($rule_id){
      return self::where('id',$rule_id)->where('deleted', 0)->first();
    }
    // Update Current Student Data
    public static function UpdateRule($title, $description, $rule_id){
      return self::where('id', $rule_id)->update([
        'title'       => $title,
        'description' => $description
      ]);
    }
}
