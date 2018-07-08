<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Http\Model\Admin\LogoModel as Logo;

class LogoController extends Controller
{
    // Display Logo Page
    public function LogoView(Request $request){
      // Retrieve All Data For Logo View Page
      $logos = Logo::SelectLogo();
      // Show Logo Data on View Page
      return view('admin.logo.view',[
        'logos' => $logos,
      ]);
    }
    // Display Logo Add Page
    public function LogoAddView(Request $request){
      // Show Add & Edit Logo Page
      return view('admin.logo.add-edit',[
        'logo'  => (object)[], //Create NULL Object
      ]);
    }
    // Process of Adding Logo Data
    public function LogoAddProcess(Request $request){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('add_logo_admin')){
        // Validate Data
        $request->validate([
          'image'                   => 'required',
          'alternative_description' => 'required|max:250'
        ]);
        // Upload Logo
        $image = $request->file('image')->hashName();
        $request->file('image')->move('assets/upload/logo/',$image);
        // Insert New Logo Data
        $logo = Logo::InsertLogo('assets/upload/logo/'.$image, $request->alternative_description);

        // Check Whether Logo is Null or Not
        if($logo != NULL)
          // Redirect to Dashboard Page when Logo is not NULL
          return redirect('admin/logos/');
        else
          // Redirect Back when Logo is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
    // Display Logo Edit Page
    public function LogoEditView(Request $request, $logo_id){
      $logo = Logo::SelectLogoByID($logo_id);
      // Show Add & Edit Logo Page
      return view('admin.logo.add-edit',[
        'logo'  => $logo
      ]);
    }
    // Process of Editing Logo Data
    public function LogoEditProcess(Request $request, $logo_id){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('edit_logo_admin')){
        // Validate Data
        $request->validate([
          'alternative_description' => 'required|max:250'
        ]);
        $logo = NULL;
        if(!is_null($request->file('image'))){
          // Upload Logo
          $image = $request->file('image')->hashName();
          $request->file('image')->move('assets/upload/logo/',$image);
          // Insert New Logo Data
          $logo = Logo::UpdateLogo('assets/upload/logo/'.$image, $request->alternative_description, $logo_id);
        }
        else{
          // Insert New Logo Data
          $logo = Logo::UpdateLogoDescription($request->alternative_description, $logo_id);
        }

        // Check Whether Logo is Null or Not
        if($logo != NULL)
          // Redirect to Dashboard Page when Logo is not NULL
          return redirect('admin/logos/');
        else
          // Redirect Back when Logo is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
    // Process of Deleting Logo Data
    public function LogoDeleteProcess(Request $request, $logo_id){
      // Delete Current Logo Data
      $logo = Logo::UpdateDeletedLogo($logo_id);

      // Check Whether Logo is Null or Not
      if($logo != NULL)
        // Redirect to Dashboard Page when Logo is not NULL
        return redirect('admin/logos/');
      else
        // Redirect Back when Question is NUll
        return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
    }
}
