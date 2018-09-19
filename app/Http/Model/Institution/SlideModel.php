<?php

namespace App\Http\Model\Institution;

use Illuminate\Database\Eloquent\Model;

class SlideModel extends Model
{
    protected $table = 'slides';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve Slide Data by Id
    public static function SelectSlide(){
      return self::where('deleted', 0)->get();
    }
    // Retrieve Slide Data by Id
    public static function SelectSlideByID($slide_id){
      return self::where('id',$slide_id)->where('deleted', 0)->first();
    }
    // Create New Slide Data
    public static function InsertSlide($image, $title, $description){
      return self::create([
        'image'       => $image,
        'title'       => $title,
        'description' => $description
      ]);
    }
    // Update Current Student Data
    public static function UpdateSlide($image, $title, $description, $slide_id){
      return self::where('id', $slide_id)->update([
        'image'       => $image,
        'title'       => $title,
        'description' => $description
      ]);
    }
    // Update Current Student Data
    public static function UpdateSlideDescription($title, $description, $slide_id){
      return self::where('id', $slide_id)->update([
        'title'       => $title,
        'description' => $description
      ]);
    }
    // Update Slide's Deleted Flag Data
    public static function UpdateDeletedSlide($slide_id){
      return self::where('id', $slide_id)->update([
        'deleted' => 1
      ]);
    }
}
