<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

//Load Model
use App\Http\Model\Admin\AdminModel as Admin;

class AdminController extends Controller
{
    // Display Account Setting Page
    public function AccountSettingView(Request $request){
      // Retrieve Data For Account Setting View Page
      $admin = Admin::SelectAdminById(session('admin')['admin_id']);
      // Show Admin Data on View Page
      return view('admin.account_setting',[
        'admin' => $admin
      ]);
    }

    // Process of Adding Admin Data
    public function AccountSettingProcess(Request $request){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('update_user_admin')){
        // Validate Data
        $request->validate([
          'username'    => 'required|max:225',
          'email'       => 'required|max:225',
          'first_name'  => 'required|max:225',
          'middle_name' => 'max:225',
          'last_name'   => 'required|max:250',
        ]);
        // Insert New Admin Data
        $admin = Admin::UpdateAdminByUsername($request->username, $request->first_name, $request->middle_name, $request->last_name, $request->email, session('admin')['admin_id']);

        // Check Whether Admin is Null or Not
        if($admin != NULL){
          return redirect('admin/account_setting');
        }
        else
          // Redirect Back when Admin is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }elseif($request->has('update_password_admin')){
        // Validate Data
        $request->validate([
          'current_password'  => 'required|min:7',
          'new_password'      => 'required|min:7|confirmed',
        ]);
        
        //Retrieve Certain Data from Admin Table
        $admin_data = Admin::SelectAdminById(session('admin')['admin_id']);
        //Check Whether The Password is Correct
        if(Hash::check($request->current_password, $admin_data->password)){
          // Insert New Admin Data
          $admin = Admin::UpdateAdminPasswordByUsername(Hash::make($request->new_password), session('admin')['admin_id']);

          // Check Whether Admin is Null or Not
          if($admin != NULL){
            return redirect('admin/account_setting');
          }
          else
            // Redirect Back when Admin is NUll
            return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
        }else{
          //Process When The Password doesn't Matches
          $request->session()->flash('current_password', 'The password is invalid');
          return back()->withInput();
        }
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
}
