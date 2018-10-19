<?php

namespace App\Http\Model\Institution;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id'; //DEFAULT : id
    protected $incremental = true; //DEFAULT : true
    protected $guarded = array();
    public $timestamps = true; //DEFAULT : true (created_at & updated_at)
    const CREATED_AT = 'created_at'; //DEFAULT : created_at
    const UPDATED_AT = 'updated_at'; //DEFAULT : updated_at

    // Retrieve Student Data by Term Id
    public static function SelectStudentByTermID($term_id){
      return self::select('students.id as student_id',
                          'terms.term as term',
                          'institutions.institution_name as institution_name',
                          'institutions.team_name as team_name',
                          'students.identity_number as identity_number',
                          'students.identity_type as identity_type',
                          'students.first_name as first_name',
                          'students.middle_name as middle_name',
                          'students.last_name as last_name',
                          'students.gender as gender',
                          'students.birth_place as birth_place',
                          'students.birth_date as birth_date',
                          'students.address as address',
                          'students.created_at as created_at',
                          'students.updated_at as updated_at')
        ->join('institutions', 'students.institution_id', '=', 'institutions.id')
        ->join('terms', 'institutions.term_id', '=', 'terms.id')
        ->where('institutions.term_id',$term_id)
        ->where('students.deleted', 0)
        ->orderBy('created_at', 'desc')->get();
    }

    
    // Retrieve Student Data by Id
    public static function SelectStudentByID($student_id){
      return self::where('id',$student_id)->first();
    }

    public static function SelectStudentByInstID($institution_id){
      return self::where('institution_id', $institution_id)->get();
    }
    // Create New Student Data
    public static function InsertStudent($institution_id, $identity_type, $identity_number, $first_name, $middle_name, $last_name, $gender, $birth_place, $birth_date, $address){
      return self::create([
        'institution_id'  => $institution_id,
        'identity_type'   => $identity_type,
        'identity_number' => $identity_number,
        'first_name'      => $first_name,
        'middle_name'     => $middle_name,
        'last_name'       => $last_name,
        'gender'          => $gender,
        'birth_place'     => $birth_place,
        'birth_date'      => $birth_date,
        'address'         => $address
      ]);
    }
    // Update Current Student Data
    public static function UpdateStudent($institution_id, $identity_type, $identity_number, $first_name, $middle_name, $last_name, $gender, $birth_place, $birth_date, $address, $student_id){
      return self::where('id', $student_id)->update([
        'institution_id'  => $institution_id,
        'identity_type'   => $identity_type,
        'identity_number' => $identity_number,
        'first_name'      => $first_name,
        'middle_name'     => $middle_name,
        'last_name'       => $last_name,
        'gender'          => $gender,
        'birth_place'     => $birth_place,
        'birth_date'      => $birth_date,
        'address'         => $address
      ]);
    }
    // Update Student's Deleted Flag Data
    public static function UpdateDeletedStudent($student_id){
      return self::where('id', $student_id)->update([
        'deleted' => 1
      ]);
    }
}
