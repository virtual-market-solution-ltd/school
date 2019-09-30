<?php

namespace App\Http\Controllers;

use App\AcademicCalendar;
use Illuminate\Http\Request;
use Auth;

class AcademicCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools_id = Auth::user()->schools_id;
        $calendars = AcademicCalendar::where('schools_id',$schools_id)->get();
        return view('backend.calendar.index')->with(compact('calendars'));
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
        $schools_id = Auth::user()->schools_id;
        $date = $request->date;
        $day = $request->day;
        $event = $request->event;

        $insert = new AcademicCalendar;
        $insert->schools_id = $schools_id;
        $insert->date = $date;
        $insert->day = $day;
        $insert->event = $event;
        $insert->save();


        return redirect()->route('academic-calendar.index')
                                    ->with('success','Calendar updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcademicCalendar  $academicCalendar
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicCalendar $academicCalendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcademicCalendar  $academicCalendar
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicCalendar $academicCalendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcademicCalendar  $academicCalendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicCalendar $academicCalendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicCalendar  $academicCalendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicCalendar $academicCalendar)
    {
        //
    }
}
