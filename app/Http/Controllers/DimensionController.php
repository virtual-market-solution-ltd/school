<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dimensions;
use Auth;

class DimensionController extends Controller
{
    public function getdimensionentry(){
        $schools_id = Auth::user()->schools_id;
        $last_dimension = Dimensions::where('schools_id',$schools_id)->orderBy('id','desc')->first();

        return view('backend.dimension.dimensionentry')->with(compact('last_dimension'));
    }

    public function postdimensionentry(Request $request){
        $schools_id = Auth::user()->schools_id;
        $references  = $request->references;
        $name = $request->name;
        $type = $request->type;
        $closed = 0;
        $date = $request->date;
        $due_date = $request->due_date;


        $insert = new Dimensions;
        $insert->schools_id = $schools_id;
        $insert->reference = $references;
        $insert->name = $name;
        $insert->type_ = $type;
        $insert->closed = $closed;
        $insert->date_ = $date;
        $insert->due_date = $due_date;
        $insert->save();



        $schools_id = Auth::user()->schools_id;
        $last_dimension = Dimensions::where('schools_id',$schools_id)->orderBy('id','desc')->first();

        return view('backend.dimension.dimensionentry')->with(compact('last_dimension'));
    }
}
