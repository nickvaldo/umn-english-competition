<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

/* Load Model */
use App\Http\Model\Admin\Educational_StageModel as Educational_Stage;
use App\Http\Model\Admin\InstitutionModel as Institution;
use App\Http\Model\Admin\TermModel as Term;

class InstitutionController extends Controller
{
    // Display Institution Page
    public function InstitutionView(Request $request, $term_id){
      // Retrieve All Data For Institution View Page
      $institutions = Institution::SelectInstitutionByTermID($term_id);
      $term         = Term::SelectTermByTermID($term_id);
      // Show Institution Data on View Page
      return view('admin.institution.view',[
        'term_id'       => $term_id,
        'institutions'  => $institutions,
        'term'          => $term,
      ]);
    }
    // Display Institution Add Page
    public function InstitutionAddView(Request $request, $term_id){
      $term               = Term::SelectTermByTermID($term_id);
      $educational_stage  = Educational_Stage::SelectEducationalStagesByEducationalSTageID($term->educational_stage_id);
      // Show Add & Edit Institution Page
      return view('admin.institution.add-edit',[
        'term_id'           => $term_id,
        'term'              => $term,
        'educational_stage' => $educational_stage,
        'institution'       => (object)[], //Create NULL Object
      ]);
    }
    // Process of Adding Institution Data
    public function InstitutionAddProcess(Request $request, $term_id){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('add_institution_admin')){
        // Validate Data
        $request->validate([
          'term'                => 'required|exists:terms,id',
          'educational_stage'   => 'required|exists:educational_stages,id',
          'username'            => 'required|unique:institutions,username|max:90',
          'password'            => 'required',
          'team_name'           => 'required|max:250',
          'institution_name'    => 'required|max:250',
          'institution_address' => 'required',
          'points'              => 'required'
        ]);
        // Insert New Institution Data
        $institution = Institution::InsertInstitution($request->term, $request->educational_stage, $request->username, Hash::make($request->password), $request->team_name, $request->institution_name, $request->institution_address, $request->points);

        // Check Whether Institution is Null or Not
        if($institution != NULL)
          // Redirect to Dashboard Page when Institution is not NULL
          return redirect('admin/participants/institutions/'.$term_id);
        else
          // Redirect Back when Institution is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
    // Display Institution Edit Page
    public function InstitutionEditView(Request $request, $term_id, $institution_id){
      $term               = Term::SelectTermByTermID($term_id);
      $educational_stage  = Educational_Stage::SelectEducationalStagesByEducationalSTageID($term->educational_stage_id);
      $institution        = Institution::SelectInstitutionByID($institution_id);
      // Show Add & Edit Institution Page
      return view('admin.institution.add-edit',[
        'term_id'           => $term_id,
        'term'              => $term,
        'educational_stage' => $educational_stage,
        'institution'       => $institution,
      ]);
    }
    // Process of Editing Institution Data
    public function InstitutionEditProcess(Request $request, $term_id, $institution_id){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('edit_institution_admin')){
        // Validate Data
        $request->validate([
          'term'                => 'required|exists:terms,id',
          'educational_stage'   => 'required|exists:educational_stages,id',
          'username'            => 'required|max:90',
          'password'            => 'required',
          'team_name'           => 'required|max:250',
          'institution_name'    => 'required|max:250',
          'institution_address' => 'required',
          'points'              => 'required'
        ]);
        // Insert New Institution Data
        $institution = Institution::UpdateInstitution($request->term, $request->educational_stage, $request->username, Hash::make($request->password), $request->team_name, $request->institution_name, $request->institution_address, $request->points, $institution_id);

        // Check Whether Institution is Null or Not
        if($institution != NULL)
          // Redirect to Dashboard Page when Institution is not NULL
          return redirect('admin/participants/institutions/'.$term_id);
        else
          // Redirect Back when Institution is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
    // Process of Deleting Institution Data
    public function InstitutionDeleteProcess(Request $request, $term_id, $institution_id){
      // Delete Current Institution Data
      $institution = Institution::UpdateDeletedInstitution($institution_id);

      // Check Whether Institution is Null or Not
      if($institution != NULL)
        // Redirect to Dashboard Page when Institution is not NULL
        return redirect('admin/participants/institutions/'.$term_id);
      else
        // Redirect Back when Question is NUll
        return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
    }
}
