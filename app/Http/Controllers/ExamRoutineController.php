<?php

namespace App\Http\Controllers;

use App\ExamRoutine;
use App\School;
use App\SchoolClass;
use App\SchoolSection;
use App\SchoolSubject;
use Auth;
use Illuminate\Http\Request;

class ExamRoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools_id = Auth::user()->schools_id;
        $roles_id = Auth::user()->roles_id;
        
        $exams = ExamRoutine::where('schools_id',$schools_id)->with('school_classes')->with('school_sections')->with('school_subjects')->get();
        return view('backend.examroutine.index')->with(compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools_id = Auth::user()->schools_id;
        $roles_id = Auth::user()->roles_id;
        
        if($roles_id == 2 ){
            $schools_id = Auth::user()->schools_id;
            $school = School::where('id',$schools_id)->first();
            $classes = SchoolClass::where('schools_id',$schools_id)->get();
            $sections = SchoolSection::where('schools_id',$schools_id)->get();
            $subjects = SchoolSubject::where('schools_id',$schools_id)->get();
            return view('backend.examroutine.create')->with(compact('schools_id','school','classes','sections','subjects'));

        }else{
            return redirect('/dashboard');
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
        $validatedData = $request->validate([
            'schools_id'            => 'required',
            'school_classes_id'     => 'required',
            'school_sections_id'    => 'required',
            'school_subjects_id'    => 'required',
            'exam_name'             => 'required|max:50',
            'date'                  => 'required',
            'time'                  => 'required',
        ]);

        $insert = new ExamRoutine();
        $insert->schools_id = $request->schools_id;
        $insert->school_classes_id = $request->school_classes_id;
        $insert->school_sections_id = $request->school_sections_id;
        $insert->school_subjects_id = $request->school_subjects_id;
        $insert->exam_name = $request->exam_name;
        $insert->date = $request->date;
        $insert->time = $request->time;
        $insert->save();

        return redirect('/examroutine');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExamRoutine  $examRoutine
     * @return \Illuminate\Http\Response
     */
    public function show(ExamRoutine $examRoutine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExamRoutine  $examRoutine
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamRoutine $examRoutine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExamRoutine  $examRoutine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamRoutine $examRoutine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExamRoutine  $examRoutine
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamRoutine $examRoutine)
    {
        //
    }
}
