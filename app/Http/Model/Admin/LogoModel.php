<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class LogoModel extends Model
{
    protected $table = 'logos';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve Logo Data by Id
    public static function SelectLogo(){
      return self::where('deleted', 0)->get();
    }
    // Retrieve Logo Data by Id
    public static function SelectLogoByID($logo_id){
      return self::where('id',$logo_id)->where('deleted', 0)->first();
    }
    // Create New Logo Data
    public static function InsertLogo($image, $alternative_description){
      return self::create([
        'image'                   => $image,
        'alternative_description' => $alternative_description
      ]);
    }
    // Update Current Student Data
    public static function UpdateLogo($image, $alternative_description, $logo_id){
      return self::where('id', $logo_id)->update([
        'image'                   => $image,
        'alternative_description' => $alternative_description
      ]);
    }
    // Update Current Student Data
    public static function UpdateLogoDescription($alternative_description, $logo_id){
      return self::where('id', $logo_id)->update([
        'alternative_description' => $alternative_description
      ]);
    }
    // Update Logo's Deleted Flag Data
    public static function UpdateDeletedLogo($logo_id){
      return self::where('id', $logo_id)->update([
        'deleted' => 1
      ]);
    }
}
