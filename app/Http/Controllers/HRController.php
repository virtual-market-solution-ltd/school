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
use App\HR\HREmployee;
use App\HR\HRExtraSalary;
use App\HR\HRExtraSalaryDeduct;
use App\HR\HRSalaryProcessInfo;
use App\HR\HRAccountSalarySheet;
use App\HR\HRAttendance;
use App\HR\HRAttendanceDetails;


class HRController extends Controller
{
/**
 * 
 * 
 * HRM Transaction
 * 
 */

/**Employee*/ 
public function employee(){
    $schools_id = Auth::user()->schools_id; 
    $all = HREmployee::where('schools_id',$schools_id)->get();
    return view('backend.hr.employee')->with(compact('all'));
}
public function employee_create(){
    return view('backend.hr.employee_create');
}

public function employee_store(Request $request){
    $schools_id = Auth::user()->schools_id; 
    $insert = new HREmployee;
    $insert->schools_id = $schools_id ;
    $insert->name = $request->name ;
    $insert->f_name = $request->f_name ;
    $insert->f_add = $request->f_add ;
    $insert->f_occupation = $request->f_occupation ;
    $insert->m_name = $request->m_add ;
    $insert->m_add = $request->m_name ;
    $insert->m_occupation = $request->m_occupation ;
    $insert->present_add = $request->present_add ;
    $insert->dob = $request->dob ;
    $insert->pob = $request->pob ;
    $insert->national_id = $request->national_id ;
    $insert->bc_no = $request->bc_no ;
    $insert->marital_status = $request->marital_status ;
    $insert->nationality = $request->nationality ;
    $insert->religion = $request->religion ;
    $insert->blood_group = $request->blood_group ;
    $insert->marriage_date = $request->marriage_date ;
    $insert->spouse_name = $request->spouse_name ;
    $insert->spouse_add = $request->spouse_add ;
    $insert->spouse_occupation = $request->spouse_occupation ;
    $insert->no_of_child = $request->no_of_child ;
    $insert->save();

    return redirect()
        ->route('hr.employee.create')
        ->with('success','New employee added');
}

public function employee_edit(Request $request){
    $id = $request->id;
    $data = HREmployee::where('emp_code',$id)->first();
    return view('backend.hr.employee_edit')->with(compact('data'));
}

public function employee_update(Request $request){
    $id = $request->id;

    $update = HREmployee::where('emp_code',$id)
        ->update([
            'chip_no' => $request->chip_no,
            'holyday_status' => $request->holiday_status,
            'dimension' => $request->dimension,
            'line_manager' => $request->line_manager,
            'grade' => $request->grade,
            'site' => $request->site,
            'department' => $request->department,
            'emp_type' => $request->emp_type,
            'designation' => $request->designation,
            'designation_group' => $request->designation_group,
            //'shift' => $request->shift,
            'grosssalary' => $request->gross_salary,
            'is_so' => $request->is_so,
            'location' => $request->location,
            'date_of_confirmation' => $request->date_of_confirmation,
            'doj' => $request->doj,
            'tin' => $request->tin,
            'set_pf' => $request->set_pf,
            'email' => $request->email,
            'set_gf' => $request->set_gf,
            'set_tax' => $request->set_tax,
            'tax_amount' => $request->tax_amount,
            'emergency_add' => $request->emergency_add,
            'cp_add' => $request->cp_add,
            'contact_person' => $request->contact_person,
            'cp_phone' => $request->cp_phone,
            'date_of_activation' => $request->date_of_activation,
            'account_code' => $request->account_code
        ]);
        return redirect()
            ->route('hr.employee')
            ->with('success','Employee Information updated successfully');
}

/**Extra Salary */

public function extra_salary(){

    return view('backend.hr.extra_salary');
}

public function extra_salary_store(Request $request){
    
    $insert = new HRExtraSalary;
    $insert->schools_id = $request->schools_id;
    $insert->emp_code = $request->emp_code ;
    $insert->head_code = $request->head_code ;
    $insert->amount = $request->amount ;
    $insert->month = $request->month ;
    $insert->year = $request->year ;
    $insert->entry_date = $request->entry_date;
    $insert->entry_user = $request->entry_user;
    $insert->status = 0 ;
    $insert->save();

    return redirect()
        ->route('hr.extra_salary')
        ->with('success','Extra Salary Added Successfully');
}

public function extra_salary_deduct(){

    return view('backend.hr.extra_salary_deduct');
}

public function extra_salary_deduct_store(Request $request){
    
    $insert = new HRExtraSalaryDeduct;
    $insert->schools_id = $request->schools_id;
    $insert->emp_code = $request->emp_code ;
    $insert->head_code = $request->head_code ;
    $insert->amount = $request->amount ;
    $insert->month = $request->month ;
    $insert->year = $request->year ;
    $insert->entry_date = $request->entry_date;
    $insert->entry_user = $request->entry_user;
    $insert->status = 0 ;
    $insert->save();

    return redirect()
        ->route('hr.extra_salary_deduct')
        ->with('success','Extra Salary deduct added Successfully');
}

/**Salary Process Info */


public function salary_process_info(){
    $schools_id = Auth::user()->schools_id;
    $salary_processed = HRSalaryProcessInfo::where('schools_id',$schools_id)
                            ->get();
    return view('backend.hr.salary_process_info')
                ->with(compact('salary_processed'));
}
public function salary_process_info_store(Request $request){

/*
    $insert = new HRSalaryProcessInfo;
    $insert->schools_id = $request->schools_id;
    $insert->year = $request->year;
    $insert->month_id = $request->month_id;
    $insert->processed_date = $request->processed_date;
    $insert->steps = 0;
    $insert->twd = 0;
    $insert->com_id=0;
    $insert->jl_status = 0;
    $insert->save();
*/
    $schools_id = Auth::user()->schools_id;
    $emp_codes = HREmployee::where('schools_id',$schools_id)->get();
    foreach($emp_codes as $row){
        $amount = $row->grosssalary;

        $insert = new HRAccountSalarySheet;
        $insert->emp_code = $row->emp_code;
        $insert->account = $row->account_code;
        $insert->amount = $amount; 
        $insert->status = 0;
        $insert->processed_by = Auth::user()->fullname;
        $insert->schools_id = $schools_id;
        $insert->year = $request->year;
        $insert->month_id = $request->month_id;
        $insert->processed_date = $request->processed_date;
        $insert->save();
    }

    return redirect()
        ->route('hr.salary_process_info')
        ->with('success','Salary Month Processed');
}

/**Salary Sheet */

public function hr_account_salary_sheet(Request $request){

    if(isset($request->year) && isset($request->month_id)){
        $schools_id = Auth::user()->schools_id;
        $year = $request->year;
        $month_id =  $request->month_id;
        $salary_sheet = HRAccountSalarySheet::where('schools_id',$schools_id)
                                                    ->where('year',$year)
                                                    ->where('month_id',$month_id)
                                                    ->get();
        return view('backend.hr.hr_account_salary_sheet')
                        ->with(compact('salary_sheet'));
    }else{
        return view('backend.hr.hr_account_salary_sheet');
    }
 
}


/** HR ATTENDANCE CSV UPLOAD */


public function hr_attendance(){
    $schools_id = Auth::user()->schools_id;
    $hr_attendance = HRAttendance::where('schools_id',$schools_id)->OrderBy('id','desc')->get(); 
    return view('backend.hr.hr_attendance')->with(compact('hr_attendance'));
}

public function hr_attendance_store(Request $request){
    $file = $request->file('attendance_csv');

      // File Details 
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $tempPath = $file->getRealPath();
      $fileSize = $file->getSize();
      $mimeType = $file->getMimeType();

      // Valid File Extensions
      $valid_extension = array("csv");

      // 2MB in Bytes
      $maxFileSize = 2097152; 

      // Check file extension
      if(in_array(strtolower($extension),$valid_extension)){

            // Check file size
            if($fileSize <= $maxFileSize){

            // File upload location
            $location = 'uploads';

            // Upload file
            $file->move($location,$filename);

            // Import CSV to Database
            $filepath = public_path($location."/".$filename);

            // Reading file
            $file = fopen($filepath,"r");

            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );
                if($i == 0){
                    $i++;
                    continue; 
                }
                for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);

            // Insert to MySQL database
            foreach($importData_arr as $importData){

                $insert = new HRAttendance;
                $insert->schools_id = Auth::user()->schools_id;
                $insert->csv_id = 1;
                $insert->emp_code = $importData[2];
                $insert->login_date = $importData[3];
                $insert->login_time = $importData[4];
                $insert->lunch_time = $importData[5];
                $insert->logout_date = $importData[6];
                $insert->actual_logout_time = $importData[7];
                $insert->total_time = $importData[8];
                $insert->total_office_time = $importData[9];
                $insert->ot = $importData[10];
                $insert->extra_ot = $importData[11];
                $insert->night_ot = $importData[12];
                $insert->status = $importData[13];
                $insert->abs_status = $importData[14];
                $insert->late_status = $importData[15];
                $insert->tiffin_bill = $importData[16];
                $insert->is_logged_in = $importData[17];
                $insert->is_edited = $importData[18];
                $insert->att_year = $importData[19];
                $insert->save();

            }

            return redirect()
                ->route('hr.hr_attendance')
                ->with('success','Attendance Uploaded Successfully');
        }
    }
}

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

    return redirect()
        ->route('hr.designation')
        ->with('success','Designation info updated successfully');
}


/*------------------Grade Setup------------------------*/

public function grade(){
    $schools_id = Auth::user()->schools_id;    
    $setups = HRGrade::where('schools_id',$schools_id)->get();
    return view('backend.hr.grade')->with(compact('setups'));
}

public function grade_store(Request $request){
    $schools_id = Auth::user()->schools_id; 

    $insert = new HRGrade;
    $insert->schools_id = $schools_id;
    $insert->grade = $request->grade;
    $insert->ot = $request->ot;
    $insert->ot_count_after = $request->ot_count_after;
    $insert->epdp = $request->epdp;
    $insert->att_bonus = $request->att_bonus;
    $insert->nt_bonus = $request->nt_bonus;
    $insert->nt_amount = $request->nt_amount;
    $insert->weekend_starts_after = $request->weekend_starts_after;
    $insert->h_to_a = $request->h_to_a;
    $insert->inactive = 0;
    $insert->save();

    return redirect()
        ->route('hr.grade')
        ->with('success','New grade  added successfully');
}

public function grade_edit(Request $request){
    $id = $request->id;
    $schools_id = Auth::user()->schools_id;    
    $row = HRGrade::where('schools_id',$schools_id)->where('id',$id)->first();
    return view('backend.hr.grade_edit')
        ->with(compact('row'));
}

public function grade_update(Request $request){

    $id = $request->id;
    $schools_id = Auth::user()->schools_id;

    $update = HRDesignation::where('schools_id',$schools_id)->where('id',$id)
        ->update([
            'designation' => $request->designation,
            'inactive'=> $request->inactive
        ]);

    return redirect()
        ->route('hr.grade') 
        ->with('success','Grade info updated successfully');
}



}
