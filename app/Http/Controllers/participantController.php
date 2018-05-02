<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class participantController extends Controller
{
    //
    public function viewLogin(){
      return view('participant.login');
    }
}
