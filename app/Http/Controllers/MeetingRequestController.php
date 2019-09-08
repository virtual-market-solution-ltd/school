<?php

namespace App\Http\Controllers;

use App\MeetingRequest;
use Auth;
use Illuminate\Http\Request;

class MeetingRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $schools_id = Auth::user()->schools_id;
        $roles_id = Auth::user()->roles_id;

        if($roles_id == 3){
            $data = MeetingRequest::with('student')->where('schools_id',$schools_id)->where('teachers_id',$user_id)->get();
        }

        if($roles_id == 4){
            $data = MeetingRequest::with('teacher')->where('schools_id',$schools_id)->where('students_id',$user_id)->get();
        }
        
        return view('backend.meeting.index')->with(compact('data'));
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
     * @param  \App\MeetingRequest  $meetingRequest
     * @return \Illuminate\Http\Response
     */
    public function show(MeetingRequest $meetingRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MeetingRequest  $meetingRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetingRequest $meetingRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MeetingRequest  $meetingRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MeetingRequest $meetingRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MeetingRequest  $meetingRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MeetingRequest $meetingRequest)
    {
        //
    }
}
