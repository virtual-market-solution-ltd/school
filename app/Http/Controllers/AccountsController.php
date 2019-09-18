<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ChartClass;
use App\ChartType;
use App\ChartMaster;
use App\BankAccounts;
use App\GLTranscation;

class AccountsController extends Controller
{
    /**
     * GL CLASSES
     */

    public function gl_account_classes_view(){
        $schools_id = Auth::user()->schools_id;
        $gl_classes = ChartClass::where('schools_id',$schools_id)->get();

        //dd($gl_classes);
        

        return view('backend.accounts.gl_account_classes_view')->with(compact('gl_classes'));
    }

    public function gl_account_classes_store(Request $request){
        $schools_id = $request->schools_id;
        $class_name = $request->class_name;
        $class_type = $request->class_type;
        $inactive = 0;


        $insert = new ChartClass;
        $insert->schools_id = $schools_id;
        $insert->class_name = $class_name;
        $insert->class_type = $class_type;

        $insert->save();

        return redirect()->route('accounts.gl_account_classes_view');
    }

    public function gl_account_classes_edit(Request $request){
        $schools_id = Auth::user()->schools_id;
        $id = $request->id;
        $data = ChartClass::where('schools_id',$schools_id)->where('cid',$id)->first();

        return view('backend.accounts.gl_account_classes_edit')->with(compact('data'));
    }

    public function gl_account_classes_update(Request $request){
        $id = $request->cid;
        $schools_id = $request->schools_id;
        $class_name = $request->class_name;
        $class_type=$request->class_type;
        $inactive = $request->inactive;


        $insert = ChartClass::find($id);

        $insert->class_name = $class_name;
        $insert->class_type = $class_type;
        $insert->inactive= $inactive;
        $insert->save();

        return redirect()->route('accounts.gl_account_classes_view')
                        ->with('success','Product created successfully.');
    }


    /**
     * 
     * GL GROUPS
     * 
     */

    public function gl_account_groups_view(){
        $schools_id = Auth::user()->schools_id;
        $gl_groups = ChartType::where('schools_id',$schools_id)->get();
        $classes = ChartClass::where('schools_id',$schools_id)->get();
        //dd($gl_classes);
        return view('backend.accounts.gl_account_groups_view')->with(compact('gl_groups','classes'));
    }

    public function gl_account_groups_store(Request $request){


        $schools_id = $request->schools_id;
        $name = $request->name;
        $parent = $request->parent;
        $class_id = $request->class_id;
        $inactive = 0;


        $insert = new ChartType;
        $insert->schools_id = $schools_id;
        $insert->name = $name;
        $insert->parent = $parent;
        $insert->class_id = $class_id;
        $insert->inactive = $inactive;

        $insert->save();

        return redirect()->route('accounts.gl_account_groups_view');
    }

    public function gl_account_groups_edit(Request $request){
        $schools_id = Auth::user()->schools_id;
        $id = $request->id;
        $data = ChartType::where('schools_id',$schools_id)->where('id',$id)->first();
        $gl_groups = ChartType::where('schools_id',$schools_id)->get();
        $classes = ChartClass::where('schools_id',$schools_id)->get();

        return view('backend.accounts.gl_account_groups_edit')->with(compact('data','gl_groups','classes'));
    }

    public function gl_account_groups_update(Request $request){



        $id = $request->id;
        $schools_id = $request->schools_id;
        $name = $request->name;
        $class_id=$request->class_id;
        $parent=$request->parent;
        $inactive = $request->inactive;


        $insert = ChartType::find($id);
        $insert->name = $name;
        $insert->class_id = $class_id;
        $insert->parent = $parent;
        $insert->inactive= $inactive;
        $insert->save();

        return redirect()->route('accounts.gl_account_groups_view')
                        ->with('success','Product created successfully.');
    }

    /**
     * 
     * GL Accounts
     * 
     */

    public function gl_accounts_view(){
        $schools_id = Auth::user()->schools_id;
        $gl_accounts = ChartMaster::where('schools_id',$schools_id)->get();
        $account_types = ChartType::where('schools_id',$schools_id)->get();
        //dd($gl_accounts);
        return view('backend.accounts.gl_accounts_view')->with(compact('gl_accounts','account_types'));
    }

    public function gl_accounts_store(Request $request){
        

        $schools_id = $request->schools_id;
        $account_code = $request->account_code;
        $account_code2 = $request->account_code2;
        $account_name = $request->account_name;
        $account_type = $request->account_type;
        $inactive = $request->inactive;    


        $insert = new ChartMaster;
        $insert ->schools_id = $schools_id;
        $insert ->account_code      = $account_code;
        $insert ->account_code2     = $account_code2 ;
        $insert ->account_name      = $account_name ;
        $insert ->account_type      = $account_type ; 
        $insert ->inactive          = $inactive ;
        $insert->save();

        return redirect()->route('accounts.gl_accounts_view');
    }

    public function gl_accounts_edit(Request $request){

        $schools_id = Auth::user()->schools_id;
        $id = $request->id;
        $data = ChartMaster::where('schools_id',$schools_id)->where('id',$id)->first();
        $account_types = ChartType::where('schools_id',$schools_id)->get();

        return view('backend.accounts.gl_accounts_edit')->with(compact('data','account_types','classes'));
    }

    public function gl_accounts_update(Request $request){

   

        $id = $request->id;
        $schools_id = $request->schools_id;
        $account_code = $request->account_code;
        $account_code2 = $request->account_code2;
        $account_name = $request->account_name;
        $account_type = $request->account_type;
        $inactive = $request->inactive; 


        $insert = ChartMaster::where('id',$id)->first();
        $insert ->account_code      = $account_code;
        $insert ->account_code2     = $account_code2 ;
        $insert ->account_name      = $account_name ;
        $insert ->account_type      = $account_type ; 
        $insert ->inactive          = $inactive ;
        $insert->save();

        return redirect()->route('accounts.gl_accounts_view')
                        ->with('success','Product created successfully.');
    }

    /**
     * 
     * Bank Accounts
     * 
     */
    public function bank_accounts_view(){

        $schools_id = Auth::user()->schools_id;
        $bank_accounts = BankAccounts::where('schools_id',$schools_id)->get();
        $chart_types = ChartType::where('schools_id',$schools_id)->get();

        return view('backend.accounts.bank_accounts_view')->with(compact('bank_accounts','chart_types'));

    }

    public function bank_accounts_store(Request $request){
        

        $schools_id = $request->schools_id;
        $account_code = $request->account_code;
        $account_type = $request->account_type;
        $bank_account_name = $request->bank_account_name;
        $bank_account_number = $request->bank_account_number;
        $bank_name = $request->bank_name;
        $bank_address = $request->bank_address;
        $bank_curr_code = $request->bank_curr_code;
        $dflt_curr_act = $request->dflt_curr_act;
        $inactive = 0;    

        $count = GLTranscation::where('schools_id',$schools_id)->where('account',$account_code)->count();
        if($count > 0){
            return redirect()->route('accounts.bank_accounts_view')->with('error','GL Account is already in use');
        }else{
            
            $insert = new BankAccounts;
            $insert ->schools_id            = $schools_id;
            $insert ->account_code          = $account_code;
            $insert->account_type           = $account_type;
            $insert->bank_account_name      = $bank_account_name;
            $insert->bank_account_number    = $bank_account_number;
            $insert->bank_name              = $bank_name;
            $insert->bank_address           = $bank_address;
            $insert->bank_curr_code         = $bank_curr_code; 
            $insert->dflt_curr_act          = $dflt_curr_act;
            $insert ->inactive              = $inactive ;
            $insert->save();
            
            return redirect()->route('accounts.bank_accounts_view')->with('success','Bank account added successfully');
        }




        
    }

    public function bank_accounts_edit(Request $request){

        $schools_id = Auth::user()->schools_id;
        $id = $request->id;
        $data = ChartMaster::where('schools_id',$schools_id)->where('id',$id)->first();
        $account_types = ChartType::where('schools_id',$schools_id)->get();

        return view('backend.accounts.bank_accounts_edit')->with(compact('data','account_types','classes'));
    }

    public function bank_accounts_update(Request $request){

   

        $id = $request->id;
        $schools_id = $request->schools_id;
        $account_code = $request->account_code;
        $account_code2 = $request->account_code2;
        $account_name = $request->account_name;
        $account_type = $request->account_type;
        $inactive = $request->inactive; 


        $insert = ChartMaster::where('id',$id)->first();
        $insert ->account_code      = $account_code;
        $insert ->account_code2     = $account_code2 ;
        $insert ->account_name      = $account_name ;
        $insert ->account_type      = $account_type ; 
        $insert ->inactive          = $inactive ;
        $insert->save();

        return redirect()->route('accounts.bank_accounts_view')
                        ->with('success','Product created successfully.');
    }


}
