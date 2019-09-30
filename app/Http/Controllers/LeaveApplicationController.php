<?php

namespace App\Http\Controllers;

use App\LeaveApplication;
use Illuminate\Http\Request;
use Auth;
use App\User;
class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_id = Auth::user()->id;
        $roles_id = Auth::user()->roles_id;
        $schools_id = Auth::user()->schools_id;

        if($roles_id == 3  ){ // teacher
            $leave = LeaveApplication::where('schools_id',$schools_id)->where('teachers_id',$users_id)->get();
            return view('backend.leave.index')->with(compact('leave'));
            
            
        }elseif($roles_id == 4){
            $leave = LeaveApplication::where('schools_id',$schools_id)->where('students_id',$users_id)->get();
            return view('backend.leave.index')->with(compact('leave'));
        }
        else{
            $leave = LeaveApplication::where('schools_id',$schools_id)->get();
            return view('backend.leave.index')->with(compact('leave'));
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
        $teacher_list = User::where('schools_id',$schools_id)->where('roles_id',3)->get();
        return view('backend.leave.create')->with(compact('teacher_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schools_id = Auth::user()->schools_id;
        $teachers_id = $request->teachers_id;
        $students_id = Auth::user()->id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $reason = $request->reason;
        $subject = $request->subject;
        $description = $request->description;

        $insert = new LeaveApplication;
        $insert->schools_id = $schools_id;
        $insert->teachers_id = $teachers_id;
        $insert->students_id = $students_id;
        $insert->start_date = $start_date;
        $insert->end_date = $end_date;
        $insert->reason = $reason;
        $insert->subject = $request->subject;
        $insert->description = $description;
        $insert->status = 0;
        $insert->save();


        return redirect()->route('leave-application.index')->with('success','Leave Application submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveApplication $leaveApplication,Request $request)
    {   
        $id = $leaveApplication->id;
        $update = LeaveApplication::where('id',$id)->update([
            'status' => 1
        ]);
        return redirect()->route('leave-application.index')->with('success','Leave application approved');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveApplication $leaveApplication)
    {
        return $request->all();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveApplication $leaveApplication)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveApplication $leaveApplication)
    {
        //
    }
}
