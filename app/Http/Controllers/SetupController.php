<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\FiscalYear;

class SetupController extends Controller
{

    /***
     * FISCAL YEAR SETUP
     */
    public function fiscalyear_view(){
        $schools_id = Auth::user()->schools_id;
        $fiscalyears = FiscalYear::where('schools_id',$schools_id)->get();

        return view('backend.setup.fiscalyear')->with(compact('fiscalyears'));
    }
    public function fiscalyear_store(Request $request){
        $schools_id = $schools_id = Auth::user()->schools_id;
        $begin = $request->begin;
        $end = $request->end;
        $closed = $request->closed;

        $insert = new FiscalYear;
        $insert->begin = $begin;
        $insert->end = $end;
        $insert->closed = $closed;
        $insert->schools_id = $schools_id;
        $insert->save();

        return redirect()->route('setup.fiscalyear_view')
                            ->with('success','Fiscal year added successfully.');
    }
    public function fiscalyear_edit(){

    }

    public function fiscalyear_update(Request $request){


        $id = $request->id;
        $update = FiscalYear::find($id);
        $update->begin = $request->begin; 
        $update->end = $request->end; 
        $update->closed = $request->closed;
        $update->save(); 

        return redirect()->route('setup.fiscalyear_view')
                         ->with('success-update','Fiscal year updated successfully.');
    }
}
