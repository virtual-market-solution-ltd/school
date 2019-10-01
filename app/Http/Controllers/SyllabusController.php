<?php

namespace App\Http\Controllers;

use App\Syllabus;
use Illuminate\Http\Request;
use Auth;
use App\Student;
use App\SchoolClass;
use App\SchoolSubject;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id    = Auth::user()->id;
        $roles_id   = Auth::user()->roles_id;
        $schools_id = Auth::user()->schools_id;

        if($roles_id == 2){
            $syllabus = Syllabus::where('schools_id',$schools_id)
                                ->with('schools')
                                ->with('exams')
                                ->with('school_classes')
                                ->with('school_subjects')
                                ->get();
            return view('backend.syllabus.index')->with(compact('syllabus'));

        }
        if($roles_id == 4){
            $class_id = Student::where('users_id',$user_id)->first();
            $syllabus = Syllabus::where('schools_id',$schools_id)->where('classes_id',$class_id->school_classes_id)
                                                ->with('schools')
                                                ->with('exams')
                                                ->with('school_classes')
                                                ->with('school_subjects')
                                                ->get();
            return view('backend.syllabus.index')->with(compact('syllabus'));
        }

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
        $insert = new Syllabus;
        $insert->schools_id = $schools_id;
        $insert->classes_id = $request->classes_id;
        $insert->exams_id = $request->exams_id;
        $insert->subjects_id = $request->subjects_id;
        $insert->description = $request->description;
        $insert->save();
        return redirect()->route('syllabus.index')->with('success','Syllabus added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function show(Syllabus $syllabus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(Syllabus $syllabus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Syllabus $syllabus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllabus $syllabus)
    {
        //
    }
}
