<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Roles;
use App\School;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->roles_id;
        $school_id = Auth::user()->schools_id;

        if($role == 1 || $role == 2){
            if($role == 1){
                $users = User::with('schools')->with('roles')->get();
                //dd($users);
                return view('backend.users.index')->with(compact('users'));
    
            }else{
                $users = User::with('schools')->with('roles')->where('schools_id',$school_id)->where('roles_id','!=',1)->get();
                //dd($users);
                return view('backend.users.index')->with(compact('users'));
                
            }
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

        $role = Auth::user()->roles_id;
        if( $role == 1){
            $roles = Roles::all();
            $schools = School::all();
            return view('backend.users.create')->with(compact('roles','schools'));
        }else{
            $users_school_id = Auth::user()->schools_id;
            $school_id = School::where('id',$users_school_id)->first();
            $roles = Roles::where('id','!=',1)->get();
            return view('backend.users.create')->with(compact('roles','school_id'));
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
            'username'      => 'required|unique:users',
            'password'      => 'required', 
            'fullname'      => 'required',
            'phone'         => 'required',
            'email'         => 'required',
            'schools_id'    => 'required',
            'roles_id'      => 'required'
        ]);

        $insert = new User();
        $insert->username = $request->username;
        $insert->password = bcrypt($request->password);
        $insert->fullname = $request->fullname;
        $insert->phone = $request->phone;
        $insert->email = Str::random(5).$request->email;
        $insert->schools_id = $request->schools_id;
        $insert->roles_id = $request->roles_id;

        $insert->save();

        return redirect('/users');
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
