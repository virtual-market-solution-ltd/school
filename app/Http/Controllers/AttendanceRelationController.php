<?php

namespace App\Http\Controllers;

use App\AttendanceRelation;
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
        $data = AttendanceRelation::where('schools_id',$schools_id)->with('schools')->with('teacher')->with('student')->with('school_classes')->with('school_sections')->get();
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
        //
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
