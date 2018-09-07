<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
        $user = DB::select('SELECT `id`,`username`,`password` FROM `institutions` WHERE `username` = ?', [$request->username]);
        //Check Whether Data is Available
        if($user){
            //Process When Data is Available
            //Retrieve Current Time
            $current_time = Carbon::now();
            /* TERM LOGIN TIME */
            $term = DB::select('SELECT terms.login_datetime FROM `institutions` INNER JOIN `terms` ON institutions.term_id = terms.id WHERE institutions.id = ?', [$user[0]->id]);
            $login_datetime = Carbon::parse($term[0]->login_datetime);
            //Count Different Time from Current Time to Last Active
            $different_time = $login_datetime->addMinutes(1)->diffInMinutes($current_time, false);
            if($different_time >= 0){
                /* RESTRICTION LOGIN REGION */
                //Retrieve Login Session Data 
                $login_session = DB::select('SELECT `id`, `active_at`, `active_device` FROM `login_sessions` WHERE `institution_id` = ?', [$user[0]->id]);
                //Parsing Active At into Carbon Type Data
                $active_at = Carbon::parse($login_session[0]->active_at);
                //Count Different Time from Current Time to Last Active
                $remaining_time = $active_at->diffInMinutes($current_time, false);
                //Check Whether User Already Login or Not
                if($remaining_time >= 10){
                    //Check Whether The Password is Correct
                    if(Hash::check($request->password, $user[0]->password)){
                        //Process When The Password Matches
                        //Update to Login Session
                        $success = DB::table('login_sessions')->where('institution_id', $user[0]->id)->update([
                            'active_at'     => $current_time,
                            'active_device' => $request->ip(),
                        ]);
                        //Check Wheter Inserting Data is Success
                        if($success){
                            //Process When Success
                            //Create Admin Session
                            session(['user' => [
                                'id'    => $user[0]->id,
                            ]]);
                            return redirect()->route('user_random_process');
                        }
                        else{
                            //Process When Unsuccess
                            $request->session()->flash('password', 'Something Went Wrong');
                            return back()->withInput();
                        }
                    }
                    else{
                        //Process When The Password doesn't Matches
                        $request->session()->flash('password', 'The password is invalid');
                        return back()->withInput();
                    }
                }
                else{
                    //Process When Unsuccess
                    $request->session()->flash('password', 'You Cannot Login, Please Logout First or Please Contact Us');
                    return back()->withInput();
                }
            }
            else{
                //Process When Unsuccess
                $request->session()->flash('password', 'You Cannot Login, Please Wait until Test Time Begins');
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
