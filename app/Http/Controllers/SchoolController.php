<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        //dd($schools);
        return view('superadmin.school')->with(compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.add_school');
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
            'school_id' => 'required|unique:schools',
            'school_name' => 'required',
            'description' => 'required'
        ]);

        $insert = new School();
        $insert->school_id = $request->school_id;
        $insert->school_name = $request->school_name;
        $insert->school_description = $request->description;
        $insert->save();

        return redirect('/schools');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        $id = $school->id;
        $data = School::find($id);
        //return $data;
        return view('superadmin.edit_school')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $validatedData = $request->validate([
            'school_name' => 'required',
            'description' => 'required'
        ]);

        $school = School::find($request->id);
        $school->school_name = $request->school_name;
        $school->school_description = $request->description;
        $school->save();

        return redirect('/schools');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }
}
