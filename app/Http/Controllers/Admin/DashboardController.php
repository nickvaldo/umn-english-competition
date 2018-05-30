<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // Display Dashboard Page
    public function DashboardView(Request $request){
      return view('admin.login');
    }
}
