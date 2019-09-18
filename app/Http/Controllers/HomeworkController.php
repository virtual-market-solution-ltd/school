<?php

namespace App\Http\Controllers;

use App\Homework;
use App\HomeworkRelation;
use App\SchoolClass;
use App\SchoolSection;
use App\SchoolSubject;
use App\Student;
use Auth;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $schools_id = Auth::user()->schools_id;
        $teachers_id = Auth::user()->id;

        $role = Auth::user()->roles_id;

        if($role == 3){
            $homeworks = Homework::where('schools_id',$schools_id )
            ->where('teachers_id',$teachers_id)
            ->orderBy('id','desc')
            ->with('schools')
            ->with('school_classes')
            ->with('school_sections')
            ->with('school_subjects')
            ->with('teacher')
            ->with('student')
            ->get();
            return view('backend.homework.index')->with(compact('homeworks'));
        }

        if($role == 4){
            $users_id = Auth::user()->id;
            $students_info = Student::where('users_id',$users_id)->first();

            $homeworks = Homework::where('schools_id',$schools_id )
            ->where('school_sections_id',$students_info->school_sections_id)
            ->orderBy('id','desc')
            ->with('schools')
            ->with('school_classes')
            ->with('school_sections')
            ->with('school_subjects')
            ->with('teacher')
            ->with('student')
            ->get();
            return view('backend.homework.index')->with(compact('homeworks'));
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
        $users_id = Auth::user()->id;



 

        $class = HomeworkRelation::where('schools_id',$schools_id)
                                    ->where('teachers_id',$users_id)
                                    ->groupBy('school_classes_id')
                                    ->pluck('school_classes_id');

        //dd($class);                            



        if($class != NULL){
                                               
            $section = HomeworkRelation::where('schools_id',$schools_id)
                ->where('teachers_id',$users_id)
                ->groupBy('school_sections_id')
                ->pluck('school_sections_id');

            $students_list = HomeworkRelation::where('schools_id',$schools_id)
                ->where('teachers_id',$users_id)
                ->pluck('students_id')->toArray();

            $subjects = HomeworkRelation::with('school_subjects')->where('schools_id',$schools_id)
                ->where('teachers_id',$users_id)
                ->get();

            $class_info = SchoolClass::where('id',$class[0])->first();                 
            $section_info = SchoolSection::where('id',$class[0])->first();
            
            return view('backend.homework.create')->with(compact('class_info','section_info','students_list','subjects'));
        }else{
            $message = "NO homework relation found. Please ask admin create one.";
            $class_info ='';
            $section_info = '';
            $students_list ='';
            $subjects = '';
            return view('backend.homework.create')->with(compact('message','class_info','section_info','students_list'));
        }
        

        return view('backend.homework.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $schools_id = $request->schools_id;
        $teachers_id = $request->teachers_id;
        $school_classes_id = $request->school_classes_id;
        $school_sections_id = $request->school_sections_id;
        $school_subjects_id = $request->school_subjects_id;
        $name = $request->name;
        $deadline = $request->deadline;
        $description = $request->description;

        $insert = new Homework;
        $insert->schools_id = $schools_id;
        $insert->teachers_id = $teachers_id;
        $insert->school_classes_id = $school_classes_id;
        $insert->school_sections_id = $school_sections_id;
        $insert->school_subjects_id = $school_subjects_id;
        $insert->name = $name;
        $insert->deadline = $deadline;
        $insert->description = $description;
        $insert->students_id = 11;
        $insert->file_location = '/storage/vmsl';
        $insert->save();

        //return view('backend.homework.index');
        return $this->index();



        /*

       $this->validate($request, [
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8096'
        ]);
        
        $files = $request->photos;
        if(!empty($files)):
            foreach($files as $row):
               // Storage::disk('public')
               //             ->put($row->getClientOriginalName(),'Contents');
                Storage::disk('public')->put($row->getClientOriginalName(), file_get_contents($row));
            endforeach;
            
            foreach($files as $row):
                Media::create([
                    'image_name' => $row->getClientOriginalName(),
                    'image_url'  => '/storage/'.$row->getClientOriginalName()   
                ]);
            endforeach;
            
        endif;
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homework $homework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homework $homework)
    {
        //
    }
}
