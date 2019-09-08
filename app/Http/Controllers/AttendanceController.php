<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\AttendanceRelation;
use App\SchoolClass;
use App\SchoolSection;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools_id = Auth::user()->schools_id;
        $users_id = Auth::user()->id;

        $class = AttendanceRelation::where('schools_id',$schools_id)
                                    ->where('teachers_id',$users_id)
                                    ->groupBy('school_classes_id')
                                    ->pluck('school_classes_id');
        
       // dd($class);
                                   
        $section = AttendanceRelation::where('schools_id',$schools_id)
                                        ->where('teachers_id',$users_id)
                                        ->groupBy('school_sections_id')
                                        ->pluck('school_sections_id');

        

       

        $students_list = AttendanceRelation::where('schools_id',$schools_id)
                                            ->where('teachers_id',$users_id)
                                            ->pluck('students_id')->toArray();

        if($class == NULL){
            $class_info = SchoolClass::where('id',$class[0])->first();                 
            $section_info = SchoolSection::where('id',$class[0])->first();
            return view('backend.attendance.create')->with(compact('class_info','section_info','students_list'));
        }else{
            $message = "NO attendance relation found. Please ask admin create one.";
            $class_info ='';
            $section_info = '';
            $students_list ='';
            return view('backend.attendance.create')->with(compact('message','class_info','section_info','students_list'));
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }


    public function machine(Request $request){
        $schools_id = $request->schools_id;
        $username = $request->username;
        $password = $request->password;

        $user_id = User::where('schools_id',$schools_id)->where('username',$username)->first();
        if($user_id){
            $user = User::find($user_id->id);
            if(Hash::check($password, $user->password)){
                $check_attendance = Attendance::where('attendance_date',date('Y-m-d'))->where('students_id',$request->students_id)->get();
                if($check_attendance !=NULL){
                    return response()->json(['message'=>'Attendance exist','status'=>'404']);
                }else{
                    $insert = new Attendance;
                    $insert->attendance_date = date("Y-m-d");
                    $insert->schools_id = $request->schools_id;
                    $insert->school_classes_id= $request->school_classes_id;
                    $insert->school_sections_id = $request->school_sections_id;
                    $insert->students_id = $request->students_id;
                    $insert->taken_by = $request->taken_by;
                    $save = $insert->save();
        
                    if($save){
                        return response()->json(['message'=>'Attendance Updated','status'=>'200']);
                    }
                    else{
                        return response()->json(['message'=>'Something went wrong. Try again','status'=>'402']);
                    }
                }



    
            }else{
                return response()->json(['message'=>'Authentication Error','status'=>'401']);
            }
        }else{
            return response()->json(['message'=>'Authentication Error','status'=>'401']);
        }
        




        //return $user_password;
    }
}
