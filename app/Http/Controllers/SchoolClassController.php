<?php

namespace App\Http\Controllers;

use App\SchoolClass;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class SchoolClassController extends Controller
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
            $classes = SchoolClass::where('schools_id',$schools_id)->get();
            return view('backend.schoolclasses.index')->with(compact('classes'));

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
            return view('backend.schoolclasses.create')->with(compact('schools_id','school'));

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
            'schools_id'      => 'required|',
            'name'      => 'required|max:15',
        ]);

        $insert = new SchoolClass();
        $insert->schools_id = $request->schools_id;
        $insert->name = $request->name;
        $insert->save();

        return redirect('/class');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolClass $schoolClass)
    {
        //
    }
}
