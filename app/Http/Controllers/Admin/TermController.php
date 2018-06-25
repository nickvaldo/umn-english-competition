<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Load Model */
use App\Http\Model\Admin\TermModel as Term;

class TermController extends Controller
{
    // Display Term Dashboard Page
    public function TermDashboardView(Request $request, $period_id){
      // Retrieve Current Term Data
      $term         = Term::SelectTermByPeriodID($period_id);
      $sma          = Term::SelectSMATermByPeriodID($period_id);
      $universitas  = Term::SelectUniversitasTermByPeriodID($period_id);
      //Create or Update Selected Term Session
      session(['selected_term' => [
        'period_id'   => $period_id,
        'term'        => $term,
        'sma'         => $sma,
        'universitas' => $universitas
      ]]);
      // Show All Terms Data on Dashboard
      return view('admin.term-dashboard',[
        'term'                => $term,
        'sma'                 => $sma,
        'universitas'         => $universitas,
      ]);
    }
}
