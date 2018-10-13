<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class SponsorModel extends Model
{
    protected $table = 'sponsors';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve Sponsor Data by Id
    public static function SelectSponsor(){
        return self::where('deleted', 0)->get();
      }
      // Retrieve Sponsor Data by Id
      public static function SelectSponsorByID($sponsor_id){
        return self::where('id',$sponsor_id)->where('deleted', 0)->first();
      }
      // Create New Sponsor Data
      public static function InsertSponsor($image, $alternative_description){
        return self::create([
          'image'                   => $image,
          'alternative_description' => $alternative_description
        ]);
      }
      // Update Current Student Data
      public static function UpdateSponsor($image, $alternative_description, $sponsor_id){
        return self::where('id', $sponsor_id)->update([
          'image'                   => $image,
          'alternative_description' => $alternative_description
        ]);
      }
      // Update Current Student Data
      public static function UpdateSponsorDescription($alternative_description, $sponsor_id){
        return self::where('id', $sponsor_id)->update([
          'alternative_description' => $alternative_description
        ]);
      }
      // Update Sponsor's Deleted Flag Data
      public static function UpdateDeletedSponsor($sponsor_id){
        return self::where('id', $sponsor_id)->update([
          'deleted' => 1
        ]);
      }
}
