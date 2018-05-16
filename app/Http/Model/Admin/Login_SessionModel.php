<?php

namespace App\Http\Model\Admin;

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
}
