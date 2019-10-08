<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ChartType;
use App\HR\HRIncomeTaxSetup;
use App\HR\HRAreas;
use App\HR\HRNationality;
use App\HR\HRReligion;
use App\HR\HRMaritalStatus;
use App\HR\HRDepartment;
use App\HR\HRSite;
use App\HR\HRDesignationGroup;
use App\HR\HRDesignation;
use App\HR\HRGrade;


class HRController extends Controller
{




/**
 * 
 * 
 *  HRM MAINTENANCE
 *  
 */    

 /*------------------Income Tax Setup------------------------*/
 public function income_tax_setup(){
    $schools_id = Auth::user()->schools_id;    
    $setups = HRIncomeTaxSetup::where('schools_id',$schools_id)->get();
    return view('backend.hr.incometaxsetup')->with(compact('setups'));
 }
 public function income_tax_setup_store(Request $request){
    $schools_id = Auth::user()->schools_id; 

    $insert = new HRIncomeTaxSetup;
    $insert->schools_id = $schools_id;
    $insert->st_amount = $request->st_amount;
    $insert->end_amount = $request->end_amount;
    $insert->rate = $request->rate;
    $insert->save();

    return redirect()->route('hr.income_tax_setup')->with('success','New method added successfully');

 }

 public function income_tax_setup_update(Request $request){

    $id = $request->id;
    $schools_id = Auth::user()->schools_id;

    $update = HRIncomeTaxSetup::where('schools_id',$schools_id)->where('id',$id)->update([
        'st_amount' => $request->st_amount,
        'end_amount' => $request->end_amount,
        'rate'=> $request->rate
    ]);

    return redirect()->route('hr.income_tax_setup')->with('success','Method updated successfully');
 }

/*------------------Area Setup------------------------*/

public function areas(){
    $schools_id = Auth::user()->schools_id;    
    $setups = HRAreas::where('schools_id',$schools_id)->get();
    return view('backend.hr.areas')->with(compact('setups'));
}

public function areas_store(Request $request){
    $schools_id = Auth::user()->schools_id; 

    $insert = new HRAreas;
    $insert->schools_id = $schools_id;
    $insert->description = $request->description;
    $insert->inactive = 0;
    $insert->save();

    return redirect()->route('hr.areas')->with('success','New area added successfully');

}

public function areas_update(Request $request){

    $id = $request->id;
    $schools_id = Auth::user()->schools_id;

    $update = HRAreas::where('schools_id',$schools_id)->where('id',$id)->update([
        'description' => $request->description,
        'inactive'=> $request->inactive
    ]);

    return redirect()->route('hr.areas')->with('success','Area info updated successfully');
}

/*------------------Nationality Setup------------------------*/
public function nationality(){
    $schools_id = Auth::user()->schools_id;    
    $setups = HRNationality::where('schools_id',$schools_id)->get();
    return view('backend.hr.nationality')->with(compact('setups'));
}

public function nationality_store(Request $request){
    $schools_id = Auth::user()->schools_id; 

    $insert = new HRNationality;
    $insert->schools_id = $schools_id;
    $insert->nationality = $request->nationality;
    $insert->inactive = 0;
    $insert->save();

    return redirect()->route('hr.nationality')->with('success','New nationality added successfully');
}

public function nationality_update(Request $request){

    $id = $request->id;
    $schools_id = Auth::user()->schools_id;

    $update = HRNationality::where('schools_id',$schools_id)->where('id',$id)->update([
        'nationality' => $request->nationality,
        'inactive'=> $request->inactive
    ]);

    return redirect()->route('hr.nationality')->with('success','Nationality info updated successfully');
}

/*------------------Religion Setup------------------------*/

public function religion(){
    $schools_id = Auth::user()->schools_id;    
    $setups = HRReligion::where('schools_id',$schools_id)->get();
    return view('backend.hr.religion')->with(compact('setups'));
}

public function religion_store(Request $request){
    $schools_id = Auth::user()->schools_id; 

    $insert = new HRReligion;
    $insert->schools_id = $schools_id;
    $insert->description = $request->description;
    $insert->inactive = 0;
    $insert->save();

    return redirect()->route('hr.religion')->with('success','New religion added successfully');
}

public function religion_update(Request $request){

    $id = $request->id;
    $schools_id = Auth::user()->schools_id;

    $update = HRReligion::where('schools_id',$schools_id)->where('id',$id)->update([
        'description' => $request->description,
        'inactive'=> $request->inactive
    ]);

    return redirect()->route('hr.religion')->with('success','Religion info updated successfully');
}


/*------------------Marital Status Setup------------------------*/

public function maritalstatus(){
    $schools_id = Auth::user()->schools_id;    
    $setups = HRMaritalStatus::where('schools_id',$schools_id)->get();
    return view('backend.hr.maritalstatus')->with(compact('setups'));
}

public function maritalstatus_store(Request $request){
    $schools_id = Auth::user()->schools_id; 

    $insert = new HRMaritalStatus;
    $insert->schools_id = $schools_id;
    $insert->status = $request->status;
    $insert->inactive = 0;
    $insert->save();

    return redirect()->route('hr.maritalstatus')->with('success','New marital status added successfully');
}

public function maritalstatus_update(Request $request){

    $id = $request->id;
    $schools_id = Auth::user()->schools_id;

    $update = HRMaritalStatus::where('schools_id',$schools_id)->where('id',$id)->update([
        'status' => $request->status,
        'inactive'=> $request->inactive
    ]);

    return redirect()->route('hr.maritalstatus')->with('success','Marital Status info updated successfully');
}

/*------------------Department Setup------------------------*/

public function department(){
    $schools_id = Auth::user()->schools_id;    
    $setups = HRDepartment::where('schools_id',$schools_id)->get();
    $chart_types = ChartType::where('schools_id',$schools_id)->get();
    return view('backend.hr.department')->with(compact('setups','chart_types'));
}

public function department_store(Request $request){
    $schools_id = Auth::user()->schools_id; 

    $insert = new HRDepartment;
    $insert->schools_id = $schools_id;
    $insert->deptname = $request->deptname;
    $insert->account_type = $request->account_type;
    $insert->dept_position = 0;
    $insert->inactive = 0;
    $insert->save();

    return redirect()->route('hr.department')->with('success','New department added successfully');
}

public function department_update(Request $request){

    $id = $request->id;
    $schools_id = Auth::user()->schools_id;

    $update = HRDepartment::where('schools_id',$schools_id)->where('id',$id)->update([
        'deptname' => $request->deptname,
        'account_type' => $request->account_type,
        'inactive'=> $request->inactive
    ]);

    return redirect()->route('hr.department')->with('success','Department info updated successfully');
}

/*------------------Site/Office Setup------------------------*/
public function site(){
    $schools_id = Auth::user()->schools_id;    
    $setups = HRSite::where('schools_id',$schools_id)->get();
    return view('backend.hr.site')->with(compact('setups'));
}

public function site_store(Request $request){
    $schools_id = Auth::user()->schools_id; 

    $insert = new HRSite;
    $insert->schools_id = $schools_id;
    $insert->description = $request->description;
    $insert->inactive = 0;
    $insert->save();

    return redirect()->route('hr.site')->with('success','New site added successfully');
}

public function site_update(Request $request){

    $id = $request->id;
    $schools_id = Auth::user()->schools_id;

    $update = HRSite::where('schools_id',$schools_id)->where('id',$id)->update([
        'description' => $request->description,
        'inactive'=> $request->inactive
    ]);

    return redirect()->route('hr.site')->with('success','Site info updated successfully');
}

/*------------------Desgination Group Setup------------------------*/

public function designationgroup(){
    $schools_id = Auth::user()->schools_id;    
    $setups = HRDesignationGroup::where('schools_id',$schools_id)->get();
    return view('backend.hr.designationgroup')->with(compact('setups'));
}

public function designationgroup_store(Request $request){
    $schools_id = Auth::user()->schools_id; 

    $insert = new HRDesignationGroup;
    $insert->schools_id = $schools_id;
    $insert->description = $request->description;
    $insert->inactive = 0;
    $insert->save();

    return redirect()->route('hr.designationgroup')->with('success','New designation group added successfully');
}

public function designationgroup_update(Request $request){

    $id = $request->id;
    $schools_id = Auth::user()->schools_id;

    $update = HRDesignationGroup::where('schools_id',$schools_id)->where('id',$id)->update([
        'description' => $request->description,
        'inactive'=> $request->inactive
    ]);

    return redirect()->route('hr.designationgroup')->with('success','Designation info updated successfully');
}


/*------------------Desgination  Setup------------------------*/

public function designation(){
    $schools_id = Auth::user()->schools_id;    
    $setups = HRDesignation::where('schools_id',$schools_id)->get();
    return view('backend.hr.designation')->with(compact('setups'));
}

public function designation_store(Request $request){
    $schools_id = Auth::user()->schools_id; 

    $insert = new HRDesignation;
    $insert->schools_id = $schools_id;
    $insert->designation = $request->designation;
    $insert->d_position = 0;
    $insert->inactive = 0;
    $insert->save();

    return redirect()->route('hr.designation')->with('success','New designation  added successfully');
}

public function designation_update(Request $request){

    $id = $request->id;
    $schools_id = Auth::user()->schools_id;

    $update = HRDesignation::where('schools_id',$schools_id)->where('id',$id)->update([
        'designation' => $request->designation,
        'inactive'=> $request->inactive
    ]);

    return redirect()->route('hr.designation')->with('success','Designation info updated successfully');
}


/*------------------Grade Setup------------------------*/

public function grade(){
    $schools_id = Auth::user()->schools_id;    
    $setups = HRGrade::where('schools_id',$schools_id)->get();
    return view('backend.hr.grade')->with(compact('setups'));
}

public function grade_store(Request $request){
    $schools_id = Auth::user()->schools_id; 

    $insert = new HRDesignation;
    $insert->schools_id = $schools_id;
    $insert->designation = $request->designation;
    $insert->d_position = 0;
    $insert->inactive = 0;
    $insert->save();

    return redirect()->route('hr.grade')->with('success','New designation  added successfully');
}

public function grade_update(Request $request){

    $id = $request->id;
    $schools_id = Auth::user()->schools_id;

    $update = HRDesignation::where('schools_id',$schools_id)->where('id',$id)->update([
        'designation' => $request->designation,
        'inactive'=> $request->inactive
    ]);

    return redirect()->route('hr.grade')->with('success','Designation info updated successfully');
}



}
