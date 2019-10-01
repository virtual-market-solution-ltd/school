<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Student;
use App\School;
use App\SchoolClass;
use App\SchoolSection;

class StudentsController extends Controller
{
    public function index(){
        $schools_id = Auth::user()->schools_id;
        $students  = User::where('schools_id',$schools_id)->where('roles_id',4)->get();

        return view('backend.students.index')->with(compact('students'));
    }

    public function edit(Request $request){
        $schools_id = Auth::user()->schools_id;
        $id = $request->id;
        $check  = Student::where('users_id',$id)->get();

        if(count($check) == 0 ){
            $insert = new Student;
            $insert->users_id = $id;
            $insert->save();
        }

        $student = Student::where('users_id',$id)
                        ->with('users')
                        ->with('schools')
                        ->with('school_classes')
                        ->with('school_sections')
                        ->first();
        $classes = SchoolClass::where('schools_id',$schools_id)->get();
        $sections = SchoolSection::where('schools_id',$schools_id)->get();
        return view('backend.students.edit')->with(compact('student','classes','sections'));
        //return $student;
    }

    public function update(Request $request){
        $users_id = $request->users_id;
        $fullname = $request->fullname;
        $phone = $request->phone;
        $email = $request->email;

        $user_update = User::where('id',$users_id)->update([
            'fullname' => $fullname,
            'phone'     => $phone,
            'email'     => $email
        ]);
        $school_classes_id = $request->school_classes_id;
        $school_sections_id = $request->school_sections_id;
        $roll_number = $request->roll_number;
        $phone_number = $request->phone_number;
        $blood_group = $request->blood_group;
        $applicant_id = $request->applicant_id;
        $present_address = $request->present_address;
        $permanent_address = $request->permanent_address;

        $student_update = Student::where('users_id',$users_id)->update([
            'school_classes_id' => $request->school_classes_id,
            'school_sections_id' => $request->school_sections_id,
            'roll_number' => $request->roll_number,
            'phone_number' => $request->phone_number,
            'blood_group' => $request->blood_group,
            'applicant_id' => $request->applicant_id,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name
        ]);

        return redirect()->route('students.index');
    }
}
