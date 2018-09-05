<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Http\Model\Admin\SlideModel as Slide;

class SponsorController extends Controller
{
  // Display Slide Page
  public function SlideView(Request $request){
    // Retrieve All Data For Slide View Page
    $slides = Slide::SelectSlide();
    // Show Slide Data on View Page
    return view('admin.sponsor.view',[
      'slides' => $slides,
    ]);
  }
  // Display Slide Add Page
  public function SlideAddView(Request $request){
    // Show Add & Edit Slide Page
    return view('admin.sponsor.add-edit',[
      'slide'  => (object)[], //Create NULL Object
    ]);
  }
  // Process of Adding Slide Data
  public function SlideAddProcess(Request $request){
    // Check Whether This Function is Accessed Through the Add & Edit Term Page
    if($request->has('add_sponsor_admin')){
      // Validate Data
      $request->validate([
        'image'       => 'required',
        'title'       => 'required|max:250',
        'description' => 'required|max:250',
      ]);
      // Upload Slide
      $image = $request->file('image')->hashName();
      $request->file('image')->move('assets/upload/slide/',$image);
      // Insert New Slide Data
      $slide = Slide::InsertSlide('assets/upload/slide/'.$image, $request->title, $request->description);

      // Check Whether Slide is Null or Not
        if($slide != NULL)
          // Redirect to Dashboard Page when Slide is not NULL
          return redirect('admin/sponsors/');
        else
          // Redirect Back when Slide is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
    // Display Slide Edit Page
    public function SlideEditView(Request $request, $slide_id){
      $slide = Slide::SelectSlideByID($slide_id);
      // Show Add & Edit Slide Page
      return view('admin.sponsor.add-edit',[
        'slide'  => $slide
      ]);
    }
    // Process of Editing Slide Data
    public function SlideEditProcess(Request $request, $slide_id){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('edit_sponsor_admin')){
        // Validate Data
        $request->validate([
          'title'       => 'required|max:250',
          'description' => 'required|max:250'
        ]);
        $slide = NULL;
        if(!is_null($request->file('image'))){
          // Upload Slide
          $image = $request->file('image')->hashName();
          $request->file('image')->move('assets/upload/slide/',$image);
          // Insert New Slide Data
          $slide = Slide::UpdateSlide('assets/upload/slide/'.$image, $request->title, $request->description, $slide_id);
        }
        else{
          // Insert New Slide Data
          $slide = Slide::UpdateSlideDescription($request->title, $request->description, $slide_id);
        }

        // Check Whether Slide is Null or Not
        if($slide != NULL)
          // Redirect to Dashboard Page when Slide is not NULL
          return redirect('admin/sponsors/');
        else
          // Redirect Back when Slide is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
    // Process of Deleting Slide Data
    public function SlideDeleteProcess(Request $request, $slide_id){
      // Delete Current Slide Data
      $slide = Slide::UpdateDeletedSlide($slide_id);

      // Check Whether Slide is Null or Not
      if($slide != NULL)
        // Redirect to Dashboard Page when Slide is not NULL
        return redirect('admin/sponsors/');
      else
        // Redirect Back when Question is NUll
        return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
    }
}
