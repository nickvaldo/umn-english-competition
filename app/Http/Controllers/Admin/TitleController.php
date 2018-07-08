<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Model\Admin\TitleModel as Title;

class TitleController extends Controller
{
    // Display Title Page
    public function TitleView(Request $request){
      // Retrieve All Data For Title View Page
      $title = Title::SelectTitle();
      // Show Title Data on View Page
      return view('admin.title.view',[
        'title' => $title,
      ]);
    }
    // Display Title Edit Page
    public function TitleEditView(Request $request, $title_id){
      $title = Title::SelectTitleByID($title_id);
      // Show Add & Edit Title Page
      return view('admin.title.edit',[
        'title'  => $title
      ]);
    }
    // Process of Editing Title Data
    public function TitleEditProcess(Request $request, $title_id){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('edit_title_admin')){
        // Validate Data
        $request->validate([
          'title' => 'required|max:250'
        ]);

        // Update Current Title Data
        $title = Title::UpdateTitle($request->title, $title_id);

        // Check Whether Title is Null or Not
        if($title != NULL)
          // Redirect to Dashboard Page when Title is not NULL
          return redirect('admin/title/');
        else
          // Redirect Back when Title is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
}
