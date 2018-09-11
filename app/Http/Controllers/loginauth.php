<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Hash;

class loginauth extends Controller
{
    // Display Login Page
    public function LoginView(){
        return view('admin.login');
    }
    // Administrator Login Process
    public function LoginProcess(Request $request){
        //Login Form Validation from Login Page
        $this->validate($request, [
            'username'  => 'bail|required|exists:institutions,username',
            'password'  => 'bail|required|min:4',
        ]);
        //Retrieve Certain Data from Admin Table
        $user = DB::select('SELECT id,username,password,team_name,term_id,educational_stage_id FROM `institutions` WHERE `username` = ?', [$request->username]);
        //Check Whether Data is Available
        if($user){
            //Process When Data is Available
            //Check Whether The Password is Correct
            if(Hash::check($request->password, $user[0]->password)){
                //Process When The Password Matches
                //Create Admin Session
                session(['user' => [
                    'id'    => $user[0]->id,
					'username' => $user[0]->username,
					'team_name' => $user[0]->team_name,
					'term_id' => $user[0]->term_id,
					'stage_id'=> $user[0]->educational_stage_id,
                    ]]);
                return redirect()->route('user_random_process');
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
