<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

//Load Model
use App\Http\Model\Admin\AdminModel as Admin;

class AuthController extends Controller
{
    // Display Login Page
    public function LoginView(){
      return view('admin.login');
    }
    // Administrator Login Process
    public function LoginProcess(Request $request){
      //Login Form Validation from Login Page
      $this->validate($request, [
        'username'  => 'bail|required|exists:admin,username',
        'password'  => 'bail|required|min:7',
      ]);
      //Retrieve Certain Data from Admin Table
      $admin = Admin::SelectAdminByUsername($request->username);
      //Check Whether Data is Available
      if($admin){
        //Process When Data is Available
        //Check Whether The Password is Correct
        if(Hash::check($request->password, $admin->password)){
          //Process When The Password Matches
          //Create Admin Session
          session(['admin' => [
            'admin_id'    => $admin->id,
            'username'    => $admin->username,
            'first_name'  => $admin->first_name,
            'middle_name' => $admin->middle_name,
            'last_name'   => $admin->last_name,
            'email'       => $admin->email
            ]]);
          return redirect()->route('admin_dashboard');
        }
        else{
          //Process When The Password doesn't Matches
          $request->session()->flash('password', 'The password is invalid');
          return back()->withInput();
        }
      }
      else{
        //Process When Data isn't Available
        $request->session()->flash('username', 'The selected username is invalid');
        return back()->withInput();
      }
    }
}
