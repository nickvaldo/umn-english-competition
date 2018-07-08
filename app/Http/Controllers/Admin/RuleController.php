<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Model\Admin\RuleModel as Rule;

class RuleController extends Controller
{
    // Display Rule Page
    public function RuleView(Request $request){
      // Retrieve All Data For Rule View Page
      $rule = Rule::SelectRule();
      // Show Rule Data on View Page
      return view('admin.rule.view',[
        'rule' => $rule,
      ]);
    }
    // Display Rule Edit Page
    public function RuleEditView(Request $request, $rule_id){
      $rule = Rule::SelectRuleByID($rule_id);
      // Show Add & Edit Rule Page
      return view('admin.rule.edit',[
        'rule'  => $rule
      ]);
    }
    // Process of Editing Rule Data
    public function RuleEditProcess(Request $request, $rule_id){
      // Check Whether This Function is Accessed Through the Add & Edit Term Page
      if($request->has('edit_rule_admin')){
        // Validate Data
        $request->validate([
          'title'       => 'required|max:250',
          'description' => 'required'
        ]);

        // Update Current Rule Data
        $rule = Rule::UpdateRule($request->title, $request->description, $rule_id);

        // Check Whether Rule is Null or Not
        if($rule != NULL)
          // Redirect to Dashboard Page when Rule is not NULL
          return redirect('admin/rule/');
        else
          // Redirect Back when Rule is NUll
          return redirect()->back()->withErrors(['insert-data-error' => 'Something Wrong. Try Again']);
      }else{
        // Redirect Back When This Function is Not Accessed Through the Add & Edit Term Page
        return back();
      }
    }
}
