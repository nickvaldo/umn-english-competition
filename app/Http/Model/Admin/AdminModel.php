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

    //Retrieve Certain Data Based on ID Field from Admin Table
    public static function SelectAdminById($id){
      return self::where('id',$id)->first();
    }

    public static function UpdateAdminByUsername($username, $first_name, $middle_name, $last_name, $email, $admin_id){
      return self::where('id', $admin_id)->update([
        'username'    => $username,
        'first_name'  => $first_name,
        'middle_name' => $middle_name,
        'last_name'   => $last_name,
        'email'       => $email
      ]);
    }

    public static function UpdateAdminPasswordByUsername($password, $admin_id){
      return self::where('id', $admin_id)->update([
        'password'   => $password
      ]);
    }
}
