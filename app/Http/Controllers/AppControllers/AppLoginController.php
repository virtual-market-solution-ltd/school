<?php

namespace App\Http\Controllers\AppControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\School;
use Hash;
class AppLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return "";
        $school_id = $request->school_id;
        $username = $request->username;
        $password = $request->password;

        $schools_id = School::where('school_id',$school_id)->first();
 
        $user = User::where('schools_id',$schools_id->id)->where('username',$username)->first();
        if(Hash::check($password, $user->password)) {
            return response()->json(['status'=>'true','message'=>'login successfull']);
        } else {
            return response()->json(['status'=>'false', 'message'=>'password is wrong']);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
