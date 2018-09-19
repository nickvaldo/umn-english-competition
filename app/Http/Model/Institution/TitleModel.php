<?php

namespace App\Http\Model\Institution;

use Illuminate\Database\Eloquent\Model;

class TitleModel extends Model
{
    protected $table = 'titles';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve Title Data by Id
    public static function SelectTitle(){
      return self::where('deleted', 0)->first();
    }
    // Retrieve Title Data by Id
    public static function SelectTitleByID($title_id){
      return self::where('id',$title_id)->where('deleted', 0)->first();
    }
    // Update Current Student Data
    public static function UpdateTitle($title, $title_id){
      return self::where('id', $title_id)->update([
        'title'       => $title
      ]);
    }
}
