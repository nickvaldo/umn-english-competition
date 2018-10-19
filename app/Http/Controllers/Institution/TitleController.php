<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Model\Admin\TitleModel as Title;

class TitleController extends Controller
{
    public function TitleView(){
        $title = Title::SelectTitle();
        return view('login_page',
        ['title' => $title
      ]);
    }
}



?>