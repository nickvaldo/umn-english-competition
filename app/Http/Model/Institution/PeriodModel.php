<?php

namespace App\Http\Model\Institution;

use Illuminate\Database\Eloquent\Model;

class PeriodModel extends Model
{
    protected $table = 'periods';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve All Periods Data
    public static function SelectAllPeriods(){
      return self::all();
    }
    // Retrieve Current Period Data by Year
    public static function SelectPeriodByYear($year){
      return self::where('year',$year)->first();
    }
    // Insert New Period
    public static function InsertPeriod($year){
      return self::create([
        'year'  => $year,
      ]);
    }
}
