<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/* Load Model */
use App\Http\Model\Admin\Educational_StageModel as Educational_Stage;
use App\Http\Model\Admin\InstitutionModel as Institution;
use App\Http\Model\Admin\StudentModel as Student;
use App\Http\Model\Admin\TermModel as Term;

class StudentController extends Controller
{
    // Display Student Page
    public function StudentView(Request $request, $term_id){
      // Retrieve All Data For Student View Page
      $students = Student::SelectStudentByTermID($term_id);
      $term     = Term::SelectTermByTermID($term_id);
      // Show Student Data on View Page
      return view('admin.student.view',[
        'term_id'   => $term_id,
        'students'  => $students,
        'term'      => $term,
      ]);
    }
    // Display Student Add Page
    public function StudentAddView(Request $request, $term_id){
      $students           = Student::SelectStudentByTermID($term_id);
      $institutions       = Institution::SelectInstitutionByTermID($term_id);
      $term               = Term::SelectTermByTermID($term_id);
      $educational_stage  = Educational_Stage::SelectEducationalStagesByEducationalSTageID($term->educational_stage_id);
      $identity_type_enum = $this->getEnumValues('students','identity_type');
      $gender_enum        = $this->getEnumValues('students','gender');
      // Show Add & Edit Student Page
      return view('admin.student.add-edit',[
        'term_id'             => $term_id,
        'term'                => $term,
        'institutions'        => $institutions,
        'educational_stage'   => $educational_stage,
        'students'            => $students,
        'identity_type_enum'  => $identity_type_enum,
        'gender_enum'         => $gender_enum,
        'student'             => (object)[], //Create NULL Object
      ]);
    }
    // Process of Adding Student Data
    public function StudentAddProcess(Request $request, $term_id){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('add_student_admin')){
        // Validate Data
        $request->validate([
          'institution_id'  => 'required|exists:institutions,id',
          'identity_type'   => 'required',
          'identity_number' => 'required|max:25',
          'first_name'      => 'required|max:250',
          'middle_name'     => 'max:250',
          'last_name'       => 'required|max:250',
          'gender'          => 'required',
          'birth_place'     => 'required|max:250',
          'birth_date'      => 'required',
          'address'         => 'required'
        ]);
        // Insert New Student Data
        $student = Student::InsertStudent($request->institution_id, $request->identity_type, $request->identity_number, $request->first_name, $request->middle_name, $request->last_name, $request->gender, $request->birth_place, $request->birth_date, $request->address);

        // Check Whether Student is Null or Not
        if($student != NULL)
          // Redirect to Dashboard Page when Student is not NULL
          return redirect('admin/participants/students/'.$term_id);
        else
          // Redirect Back when Student is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
    // Display Student Edit Page
    public function StudentEditView(Request $request, $term_id, $student_id){
      $students           = Student::SelectStudentByTermID($term_id);
      $institutions       = Institution::SelectInstitutionByTermID($term_id);
      $term               = Term::SelectTermByTermID($term_id);
      $educational_stage  = Educational_Stage::SelectEducationalStagesByEducationalSTageID($term->educational_stage_id);
      $identity_type_enum = $this->getEnumValues('students','identity_type');
      $gender_enum        = $this->getEnumValues('students','gender');
      $students           = Student::SelectStudentByID($student_id);
      // Show Add & Edit Student Page
      return view('admin.student.add-edit',[
        'term_id'             => $term_id,
        'term'                => $term,
        'institutions'        => $institutions,
        'educational_stage'   => $educational_stage,
        'students'            => $students,
        'identity_type_enum'  => $identity_type_enum,
        'gender_enum'         => $gender_enum,
        'student'             => $students,
      ]);
    }
    // Process of Editing Student Data
    public function StudentEditProcess(Request $request, $term_id, $student_id){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('edit_student_admin')){
        // Validate Data
        $request->validate([
          'institution_id'  => 'required|exists:institutions,id',
          'identity_type'   => 'required',
          'identity_number' => 'required|max:25',
          'first_name'      => 'required|max:250',
          'middle_name'     => 'max:250',
          'last_name'       => 'required|max:250',
          'gender'          => 'required',
          'birth_place'     => 'required|max:250',
          'birth_date'      => 'required',
          'address'         => 'required'
        ]);
        // Update Current Student Data
        $student = Student::UpdateStudent($request->institution_id, $request->identity_type, $request->identity_number, $request->first_name, $request->middle_name, $request->last_name, $request->gender, $request->birth_place, $request->birth_date, $request->address, $student_id);

        // Check Whether Student is Null or Not
        if($student != NULL)
          // Redirect to Dashboard Page when Student is not NULL
          return redirect('admin/participants/students/'.$term_id);
        else
          // Redirect Back when Student is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
    // Process of Deleting Student Data
    public function StudentDeleteProcess(Request $request, $term_id, $student_id){
      // Delete Current Student Data
      $student = Student::UpdateDeletedStudent($student_id);

      // Check Whether Student is Null or Not
      if($student != NULL)
        // Redirect to Dashboard Page when Student is not NULL
        return redirect('admin/participants/students/'.$term_id);
      else
        // Redirect Back when Question is NUll
        return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
    }
    // Select ENUM Value from Current Column in Table
    public function getEnumValues($table, $column){
        $type = DB::select( DB::raw("SHOW COLUMNS FROM $table WHERE Field = '$column'") )[0]->Type;

        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach( explode(',', $matches[1]) as $value ){
            $v = trim( $value, "'" );
            $enum = array_add($enum, $v, $v);
        }
        return $enum;
    }
}
