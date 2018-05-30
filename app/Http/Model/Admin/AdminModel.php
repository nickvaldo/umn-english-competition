<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    //Retrieve Certain Data Based on Username Field from Admin Table
    public static function SelectAdminByUsername($username){
      return self::where('username',$username)->first();
    }
}
