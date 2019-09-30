<?php

namespace App\Http\Controllers;

use App\ExamResult;
use Illuminate\Http\Request;
use App\User;
use App\Exams;
use App\Student;
use App\SchoolSubject;
use Auth;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $schools_id = Auth::user()->schools_id;
        $students_list = User::where('schools_id',$schools_id)->where('roles_id',4)->get();
        $exams = Exams::where('schools_id',$schools_id)->get();
        return view('backend.result.index')->with(compact('students_list','exams'));
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
        $student_id = $request->student_id;
        $student_info = User::where('schools_id',$schools_id)->where('username',$student_id)->first();
        $classes_id= $request->school_classes_id;
        $sections_id = $request->school_sections_id;
        $subjects_id = $request->school_subjects_id;
        $exams_id = $request->exams_id;
        $obtained_mark = $request->obtained_mark;


        $insert = new ExamResult;
        $insert->students_id = $student_info->id;
        $insert->schools_id = $schools_id;
        $insert->classes_id = $classes_id;
        $insert->sections_id =$sections_id;
        $insert->subjects_id =$subjects_id;
        $insert->exams_id =$exams_id;
        $insert->obtained_mark =$obtained_mark;
        $insert ->save();

        return redirect()->route('result.index')
                            ->with('success','Result added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExamResult  $examResult
     * @return \Illuminate\Http\Response
     */
    public function show(ExamResult $examResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExamResult  $examResult
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamResult $examResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExamResult  $examResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamResult $examResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExamResult  $examResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamResult $examResult)
    {
        //
    }


    public function ajax(Request $request){
        if($request->students_id && $request->schools_id){
            $student_id = $request->students_id;
            $schools_id = $request->schools_id;

            $user_info = User::where('schools_id',$schools_id)->where('username',$student_id)->first();

            $student_full_info = Student::where('users_id',$user_info->id)
                                    ->with('users')
                                    ->with('school_classes')
                                    ->with('school_sections')
                                    ->first();

            $subjects = SchoolSubject::where('schools_id',$student_full_info->schools_id)
                                    ->where('school_classes_id',$student_full_info->school_classes_id)
                                    ->where('school_sections_id',$student_full_info->school_sections_id)
                                    ->get();
            $data = array($student_full_info,$subjects);    

            return $data;
        }
    }


    public function result_view(Request $request){

        $users_id = Auth::user()->id;
        $results = ExamResult::where('students_id',$users_id)
                                ->with('schools')
                                ->with('users')
                                ->with('classes')
                                ->with('sections')
                                ->with('subjects')
                                ->with('exams')
                                ->get();


        return view('backend.result.show');
    }
}
