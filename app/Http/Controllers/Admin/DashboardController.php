<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Load Model */
use App\Http\Model\Admin\TermModel as Term;

class DashboardController extends Controller
{
    // Display Dashboard Page
    public function DashboardView(Request $request){
      $terms = Term::SelectAllTerms();

      return view('admin.dashboard',['terms' => $terms]);
    }
}
