<?php

namespace App\Http\Controllers;

use App\School;
use App\SchoolClass;
use App\SchoolSection;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class SchoolSectionController extends Controller
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
            $sections = SchoolSection::where('schools_id',$schools_id)->with('school_classes')->get();
            //dd($sections);
            return view('backend.schoolsections.index')->with(compact('sections'));

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
            return view('backend.schoolsections.create')->with(compact('schools_id','school','classes'));

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
            'name'      => 'required|max:50',
        ]);

        $insert = new SchoolSection();
        $insert->schools_id = $request->schools_id;
        $insert->school_classes_id = $request->school_classes_id;
        $insert->name = $request->name;
        $insert->save();

        return redirect('/section');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SchoolSection  $schoolSection
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolSection $schoolSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SchoolSection  $schoolSection
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolSection $schoolSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SchoolSection  $schoolSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolSection $schoolSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SchoolSection  $schoolSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolSection $schoolSection)
    {
        //
    }
}
