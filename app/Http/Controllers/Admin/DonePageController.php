<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Model\Admin\DonePageModel as Done;

class DonePageController extends Controller
{
    // Display DOnePage
    public function DoneView(Request $request){
      // Retrieve All Data For done View Page
      $done = Done::SelectDone();
     
      // Show done Data on View Page
      return view('admin.done.view',[
        'done' => $done,
      ]);
    }
    // Display Done Edit Page
    public function DoneEditView(Request $request, $done_id){
      $done = Done::SelectDoneByID($done_id);
      // Show Add & Edit done Page
      return view('admin.done.edit',[
        'done'  => $done
      ]);
    }
    // Process of Editing done Data
    public function DoneEditProcess(Request $request, $done_id){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('edit_done_admin')){
        // Validate Data
        $request->validate([
          'title'       => 'required|max:250',
          'description' => 'required'
        ]);

        // Update Current done Data
        $done = Done::UpdateDone($request->title, $request->description, $done_id);

        // Check Whether done is Null or Not
        if($done != NULL)
          // Redirect to Dashboard Page when done is not NULL
          return redirect('admin/done/');
        else
          // Redirect Back when done is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
}
