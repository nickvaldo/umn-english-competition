<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class DonePageModel extends Model
{
    protected $table = 'done_pages';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve Rule Data by Id
    public static function SelectDone(){
      return self::where('deleted', 0)->first();
    }
    // Retrieve Rule Data by Id
    public static function SelectDoneByID($done_id){
      return self::where('id',$done_id)->where('deleted', 0)->first();
    }
    // Update Current Student Data
    public static function UpdateDone($title, $description, $done_id){
      return self::where('id', $done_id)->update([
        'title'       => $title,
        'description' => $description
      ]);
    }
}
