<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Http\Model\Admin\SponsorModel as Sponsor;

class SponsorController extends Controller
{
  // Display Sponsor Page
  public function SponsorView(Request $request){
    // Retrieve All Data For Sponsor View Page
    $sponsors = Sponsor::SelectSponsor();
    // Show Sponsor Data on View Page
    return view('admin.sponsor.view',[
      'sponsors' => $sponsors,
    ]);
  }
  // Display Sponsor Add Page
  public function SponsorAddView(Request $request){
    // Show Add & Edit Sponsor Page
    return view('admin.sponsor.add-edit',[
      'sponsor'  => (object)[], //Create NULL Object
    ]);
  }
  // Process of Adding Sponsor Data
  public function SponsorAddProcess(Request $request){
    // Check Whether This Function is Accessed Through the Add & Edit Term Page
    if($request->has('add_sponsor_admin')){
      // Validate Data
      $request->validate([
        'image'                   => 'required',
        'alternative_description' => 'required|max:250'
      ]);
      // Upload Sponsor
      $image = $request->file('image')->hashName();
      $request->file('image')->move('assets/upload/sponsor/',$image);
      // Insert New Sponsor Data
      $sponsor = Sponsor::InsertSponsor('assets/upload/sponsor/'.$image, $request->alternative_description);

      // Check Whether Sponsor is Null or Not
      if($sponsor != NULL)
        // Redirect to Dashboard Page when Sponsor is not NULL
        return redirect('admin/sponsors/');
      else
        // Redirect Back when Sponsor is NUll
        return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
    }else{
      // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
      return back();
    }
  }
  // Display Sponsor Edit Page
  public function SponsorEditView(Request $request, $sponsor_id){
    $sponsor = Sponsor::SelectSponsorByID($sponsor_id);
    // Show Add & Edit Sponsor Page
    return view('admin.sponsor.add-edit',[
      'sponsor'  => $sponsor
    ]);
  }
  // Process of Editing Sponsor Data
  public function SponsorEditProcess(Request $request, $sponsor_id){
    // Check Whether This Function is Accessed Through the Add & Edit Term Page
    if($request->has('edit_sponsor_admin')){
      // Validate Data
      $request->validate([
        'alternative_description' => 'required|max:250'
      ]);
      $sponsor = NULL;
      if(!is_null($request->file('image'))){
        // Upload Sponsor
        $image = $request->file('image')->hashName();
        $request->file('image')->move('assets/upload/sponsor/',$image);
        // Insert New Sponsor Data
        $sponsor = Sponsor::UpdateSponsor('assets/upload/sponsor/'.$image, $request->alternative_description, $sponsor_id);
      }
      else{
        // Insert New Sponsor Data
        $sponsor = Sponsor::UpdateSponsorDescription($request->alternative_description, $sponsor_id);
      }

      // Check Whether Sponsor is Null or Not
      if($sponsor != NULL)
        // Redirect to Dashboard Page when Sponsor is not NULL
        return redirect('admin/sponsors/');
      else
        // Redirect Back when Sponsor is NUll
        return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
    }else{
      // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
      return back();
    }
  }
  // Process of Deleting Sponsor Data
  public function SponsorDeleteProcess(Request $request, $sponsor_id){
    // Delete Current Sponsor Data
    $sponsor = Sponsor::UpdateDeletedSponsor($sponsor_id);

    // Check Whether Sponsor is Null or Not
    if($sponsor != NULL)
      // Redirect to Dashboard Page when Sponsor is not NULL
      return redirect('admin/sponsors/');
    else
      // Redirect Back when Question is NUll
      return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
  }
}
