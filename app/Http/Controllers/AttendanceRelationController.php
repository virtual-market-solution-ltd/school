<?php

namespace App\Http\Controllers;

use App\AttendanceRelation;
use App\SchoolClass;
use App\SchoolSection;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AttendanceRelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools_id = Auth::user()->schools_id;
        $data = AttendanceRelation::where('schools_id',$schools_id)
                ->with('schools')
                ->with('teacher')
                ->with('student')
                ->with('school_classes')
                ->with('school_sections')
                ->get();
        //dd($data);
        return view('backend.attendancerelation.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        $schools_id = Auth::user()->schools_id;
        $classes_list = SchoolClass::where('schools_id',$schools_id)->get();
        $sections_list =SchoolSection::where('schools_id',$schools_id)->with('school_classes')->get(); 
        $teachers_list = User::where('schools_id',$schools_id)
                                ->where('roles_id',3)
                                ->get();
        $students_list_0 = AttendanceRelation::where('schools_id',$schools_id)
                            ->pluck('students_id')->toArray();
                            //dd($students_list_0);                             
        $students_list_1 = User::where('schools_id',$schools_id)
                            ->where('roles_id',4)
                            ->pluck('id')->toArray();

        
                            
        $students_list  = array_values(array_diff ($students_list_1, $students_list_0));

        return view('backend.attendancerelation.create')
                    ->with(compact(
                        'classes_list',
                        'sections_list',
                        'teachers_list',
                        'students_list'
                    ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'schools_id'      => 'required',
            'school_classes_id' => 'required',
            'school_sections_id' => 'required',
            'teachers_id' => 'required',
            'students_id' => 'required',
        ]);

        $today = date('Y-01-01'); 




        
        for($i=0;$i<count($request->students_id);$i++){

            for($j=1; $j<=365; $j++)
            {
                $repeat = strtotime("+1 day",strtotime($today));
                $today = date('Y-m-d',$repeat);

                $insert = new AttendanceRelation();
                $insert->schools_id = $request->schools_id;
                $insert->school_classes_id = $request->school_classes_id;
                $insert->school_sections_id = $request->school_sections_id;
                $insert->teachers_id = $request->teachers_id;
                $insert->students_id = $request->students_id[$i];
                $insert->dates = $today;
                $insert->save();
    
            }


        }
        


        return redirect('/attendancerelation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AttendanceRelation  $attendanceRelation
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceRelation $attendanceRelation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AttendanceRelation  $attendanceRelation
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceRelation $attendanceRelation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AttendanceRelation  $attendanceRelation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendanceRelation $attendanceRelation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AttendanceRelation  $attendanceRelation
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceRelation $attendanceRelation)
    {
        //
    }
}
