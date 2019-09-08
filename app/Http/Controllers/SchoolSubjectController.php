<?php

namespace App\Http\Controllers;

use App\School;
use App\SchoolClass;
use App\SchoolSection;
use App\SchoolSubject;
use Auth;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
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
        
        if($roles_id == 2 ){
            $subjects = SchoolSubject::where('schools_id',$schools_id)->with('school_classes')->with('school_sections')->get();
            //dd($sections);
            return view('backend.schoolsubjects.index')->with(compact('subjects'));

        }else{
            return redirect('/dashboard');
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
        $roles_id = Auth::user()->roles_id;
        
        if($roles_id == 2 ){
            $schools_id = Auth::user()->schools_id;
            $school = School::where('id',$schools_id)->first();
            $classes = SchoolClass::where('schools_id',$schools_id)->get();
            $sections = SchoolSection::where('schools_id',$schools_id)->get();
            return view('backend.schoolsubjects.create')->with(compact('schools_id','school','classes','sections'));

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
            'schools_id'      => 'required',
            'school_classes_id' => 'required',
            'school_sections_id' => 'required',
            'name'      => 'required|max:50',
        ]);

        $insert = new SchoolSubject();
        $insert->schools_id = $request->schools_id;
        $insert->school_classes_id = $request->school_classes_id;
        $insert->school_sections_id = $request->school_sections_id;
        $insert->name = $request->name;
        $insert->save();

        return redirect('/subject');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SchoolSubject  $schoolSubject
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolSubject $schoolSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SchoolSubject  $schoolSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolSubject $schoolSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SchoolSubject  $schoolSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolSubject $schoolSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SchoolSubject  $schoolSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolSubject $schoolSubject)
    {
        //
    }
}
