<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\AttendanceRelation;
use App\SchoolClass;
use App\SchoolSection;
use App\Student;
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
    public function index(Request  $request)
    {


        if(empty( $request->except('_token') )){
            $schools_id = Auth::user()->schools_id;
            $class_list = SchoolClass::where('schools_id',$schools_id)->get();
            $section_list = SchoolSection::where('schools_id',$schools_id)->with('school_classes')->get();
            $students_list = "";
            return view('backend.attendance.index')->with(compact('class_list','section_list','students_list'));
        }else{
            //return $request->all();
            $schools_id = Auth::user()->schools_id;
            $class_list = SchoolClass::where('schools_id',$schools_id)->get();
            $section_list = SchoolSection::where('schools_id',$schools_id)->with('school_classes')->get();
            $school_classes_id = $request->school_classes_id;
            $school_sections_id = $request->school_sections_id;
            $students_list = Student::where('schools_id',$schools_id)->where('school_classes_id',$school_classes_id)->where('school_sections_id',$school_sections_id)->get();

            return view('backend.attendance.index')->with(compact('class_list','section_list','students_list','schools_id','school_classes_id','school_sections_id'));
        }


        

        
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
        $date = date('Y-m-d');
        $schools_id = $request->schools_id;
        $school_classes_id = $request->school_classes_id;
        $school_sections_id = $request->school_sections_id;
        $students_list_id = $request->students_list_id ;
        $students_list_id_all = $request->students_list_id_all;

        $attendance_0 = array_values(array_diff($request->students_list_id_all,$request->students_list_id));
        $attendance_1 = array_values($students_list_id);


        $check = Attendance::where('attendance_date',$date)
                                ->where('schools_id',$schools_id)
                                ->where('school_classes_id',$school_classes_id)
                                ->where('school_sections_id',$school_sections_id)
                                ->get();
        if(count($check) > 0){
            $message = "Attendance data already exists";
            $schools_id = Auth::user()->schools_id;
            $class_list = SchoolClass::where('schools_id',$schools_id)->get();
            $section_list = SchoolSection::where('schools_id',$schools_id)->with('school_classes')->get();
            $students_list = "";
            return view('backend.attendance.index')->with(compact('class_list','section_list','students_list','message'));
        }else{
            for($i=0;$i<count($attendance_0);$i++){
            
                $insert = new Attendance();
                $insert->attendance_date = $date;
                $insert->schools_id = $schools_id;
                $insert->school_classes_id = $school_classes_id;
                $insert->school_sections_id = $school_sections_id;
                $students_id = Student::where('id',$attendance_0[$i])->first();
                $insert->students_id = $students_id->users_id;
                $insert->taken_by = Auth::user()->id;
                $insert->attendance_status = 0;
                $insert->save();
                
            }
    
            for($i=0;$i<count($attendance_1);$i++){
                
                $insert = new Attendance();
                $insert->attendance_date = $date;
                $insert->schools_id = $schools_id;
                $insert->school_classes_id = $school_classes_id;
                $insert->school_sections_id = $school_sections_id;
                $students_id = Student::where('id',$attendance_1[$i])->first();
                $insert->students_id = $students_id->users_id;
                $insert->taken_by = Auth::user()->id;
                $insert->attendance_status = 1;
                $insert->save();
                
            }
            return redirect('/attendance');
        }


 
        
        
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
                //dd($check_attendance);
                if(count($check_attendance) > 0){
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
