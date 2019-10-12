<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ChartClass;
use App\ChartType;
use App\ChartMaster;
use App\BankAccounts;
use App\GLTranscation;
use App\BankTransaction;
use App\Comments;
use App\AuditTrail;
use App\Dimensions;
use App\FiscalYear;
use App\BudgetTransaction;
use App\HR\HRAccountSalarySheet;
use App\HR\HRExtraSalary;
use App\HR\HRExtraSalaryDeduct;

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



/**
 * 
 * Payments
 * 
 */

    public function accounts_payments_view(){
        $schools_id = Auth::user()->schools_id;
        $bank_account_list  = BankAccounts::where('schools_id',$schools_id)->get();
        $accounts_list = ChartMaster::where('schools_id',$schools_id)->get();
        $dimensions = Dimensions::where('schools_id',$schools_id)->get();
        return view('backend.accounts.accounts_payment_view')->with(compact('bank_account_list','accounts_list','dimensions'));
    }

    public function accounts_payments_store(Request $request){
        $schools_id = Auth::user()->schools_id;
        $type = 1;
        $trans_no = BankTransaction::where('schools_id',$schools_id)->where('type',$type)->orderBy('id','desc')->first();
        $bank_act = $request->bank_act;
        $bank_account  = BankAccounts::where('id',$bank_act)->first();
        $ref = '';
        $trans_date = $request->trans_date;
        $amount = $request->amount;
        $dimension_id = $request->dimension_id;
        $dimension2_id = 0;
        $person_type_id = $request->person_type_id;
        $person_id = $request->person_id;
        $account = $request->account;
        $memo = $request->memo_;

        /**INSERTING INTO BANK TRANSFER */
        $insert_bank_trans = new BankTransaction;
        $insert_bank_trans->schools_id = $schools_id;
        $insert_bank_trans->type = $type;
        $insert_bank_trans->trans_no = $trans_no->trans_no+1 ;
        $insert_bank_trans->bank_act = $bank_act ;
        $insert_bank_trans->ref = $ref ;
        $insert_bank_trans->trans_date = $trans_date ;
        $insert_bank_trans->amount = '-'.$amount ;
        $insert_bank_trans->dimension_id = $dimension_id ;
        $insert_bank_trans->dimension2_id = $dimension2_id ;
        $insert_bank_trans->person_type_id = $person_type_id ;
        $insert_bank_trans->person_id = $person_id ;
        $insert_bank_trans->save();

        /**INSERTING INTO GL TRANSACTION */

        $insert_gl_trans = new GLTranscation;
        $insert_gl_trans->schools_id = $schools_id;
        $insert_gl_trans->type = $type;
        $insert_gl_trans->type_no = $trans_no->trans_no+1 ;
        $insert_gl_trans->tran_date = $trans_date ;
        $insert_gl_trans->amount = $amount ;
        $insert_gl_trans->dimension_id = $dimension_id ;
        $insert_gl_trans->dimension2_id = $dimension2_id ;
        $insert_gl_trans->person_type_id = $person_type_id ;
        $insert_gl_trans->person_id = $person_id ;
        $insert_gl_trans->account = $account ;
        $insert_gl_trans->memo_ = $memo ;
        $insert_gl_trans->save();

        $insert_gl_trans2 = new GLTranscation;
        $insert_gl_trans2->schools_id = $schools_id;
        $insert_gl_trans2->type = $type;
        $insert_gl_trans2->type_no = $trans_no->trans_no+1 ;
        $insert_gl_trans2->tran_date = $trans_date ;
        $insert_gl_trans2->account = $bank_account->account_code;
        $insert_gl_trans2->amount = "-".$amount ;
        $insert_gl_trans2->dimension_id = $dimension_id ;
        $insert_gl_trans2->dimension2_id = $dimension2_id ;
        $insert_gl_trans2->person_type_id = $person_type_id ;
        $insert_gl_trans2->person_id = $person_id ;
        $insert_gl_trans2->memo_ = $memo ;
        $insert_gl_trans2->save();



        return redirect()->route('accounts.accounts_payments_view')
                            ->with('success','Payment added successfully.');



    }



/**
 * 
 * Deposit
 * 
 */

    public function accounts_deposit_view(){
        $schools_id = Auth::user()->schools_id;
        $bank_account_list  = BankAccounts::where('schools_id',$schools_id)->get();
        $accounts_list = ChartMaster::where('schools_id',$schools_id)->get();
        $dimensions = Dimensions::where('schools_id',$schools_id)->get();
        return view('backend.accounts.accounts_deposit_view')->with(compact('bank_account_list','accounts_list','dimensions'));
    }

    public function accounts_deposit_store(Request $request){
 

        $schools_id = Auth::user()->schools_id;
        $type = 2;
        $trans_no = BankTransaction::where('schools_id',$schools_id)->where('type',$type)->orderBy('id','desc')->first();
        $bank_act = $request->bank_act;
        $bank_account  = BankAccounts::where('id',$bank_act)->first();
        $ref = '';
        $trans_date = $request->trans_date;
        $amount = $request->amount;
        $dimension_id = $request->dimension_id;
        $dimension2_id = 0;
        $person_type_id = $request->person_type_id;
        $person_id = $request->person_id;
        $account = $request->account;
        $memo = $request->memo_;

        /**INSERTING INTO BANK TRANSFER */
        $insert_bank_trans = new BankTransaction;
        $insert_bank_trans->schools_id = $schools_id;
        $insert_bank_trans->type = $type;
        $insert_bank_trans->trans_no = $trans_no->trans_no+1 ;
        $insert_bank_trans->bank_act = $bank_act;
        $insert_bank_trans->ref = $ref ;
        $insert_bank_trans->trans_date = $trans_date ;
        $insert_bank_trans->amount = $amount ;
        $insert_bank_trans->dimension_id = $dimension_id ;
        $insert_bank_trans->dimension2_id = $dimension2_id ;
        $insert_bank_trans->person_type_id = $person_type_id ;
        $insert_bank_trans->person_id = $person_id ;
        $insert_bank_trans->save();

        /**INSERTING INTO GL TRANSACTION */

        $insert_gl_trans = new GLTranscation;
        $insert_gl_trans->schools_id = $schools_id;
        $insert_gl_trans->type = $type;
        $insert_gl_trans->type_no = $trans_no->trans_no+1 ;
        $insert_gl_trans->tran_date = $trans_date ;
        $insert_gl_trans->amount = "-".$amount ;
        $insert_gl_trans->dimension_id = $dimension_id ;
        $insert_gl_trans->dimension2_id = $dimension2_id ;
        $insert_gl_trans->person_type_id = $person_type_id ;
        $insert_gl_trans->person_id = $person_id ;
        $insert_gl_trans->account = $account ;
        $insert_gl_trans->memo_ = $memo ;
        $insert_gl_trans->save();

        $insert_gl_trans2 = new GLTranscation;
        $insert_gl_trans2->schools_id = $schools_id;
        $insert_gl_trans2->type = $type;
        $insert_gl_trans2->type_no = $trans_no->trans_no+1 ;
        $insert_gl_trans2->tran_date = $trans_date ;
        $insert_gl_trans2->account = $bank_account->account_code;
        $insert_gl_trans2->amount = $amount ;
        $insert_gl_trans2->dimension_id = $dimension_id ;
        $insert_gl_trans2->dimension2_id = $dimension2_id ;
        $insert_gl_trans2->person_type_id = $person_type_id ;
        $insert_gl_trans2->person_id = $person_id ;
        $insert_gl_trans2->memo_ = $memo ;
        $insert_gl_trans2->save();



        return redirect()->route('accounts.accounts_deposit_view')
                            ->with('success','Deposit added successfully.');
    }

/**
 * 
 * Bank Account Transfers
 * 
 */

    public function bank_account_transfer_view(){
        $schools_id = Auth::user()->schools_id;
        $bank_account_list  = BankAccounts::where('schools_id',$schools_id)->get();
        return view('backend.accounts.bank_account_transfer')->with(compact('bank_account_list'));
    }

    public function bank_account_transfer_store(Request $request){
        
        $schools_id = Auth::user()->schools_id;
        $bank_act_from = $request->bank_act_from;
        $bank_act_from_details = BankAccounts::where('id',$bank_act_from)->first();
        $bank_act_to = $request->bank_act_to;
        $bank_act_to_details = BankAccounts::where('id',$bank_act_to)->first();
        $date = $request->trans_date;
        $amount = $request->amount;
        $bank_charge = $request->bank_charge;
        $memo =  $request->memo;

        /**Bank trans 1 */
        $insert = new BankTransaction;
        $insert->type = 4;
        $insert->trans_no = 10;
        $insert->ref = 1;
        $insert->bank_act = $bank_act_from;
        $insert->trans_date = $date;
        $insert->amount = '-'.($amount+$bank_charge);
        $insert->dimension_id = 0;
        $insert->dimension2_id = 0;
        $insert->person_type_id = '0';
        $insert->person_id = 'From '.$bank_act_from_details->bank_account_name.' To '.$bank_act_to_details->bank_account_name;
        $insert->schools_id = $schools_id;
        $insert->save();

        /**Bank trans 2 */
        $insert = new BankTransaction;
        $insert->type = 4;
        $insert->trans_no = 10;
        $insert->ref = 1;
        $insert->bank_act = $bank_act_to;
        $insert->trans_date = $date;
        $insert->amount = $amount;
        $insert->dimension_id = 0;
        $insert->dimension2_id = 0;
        $insert->person_type_id = 0;
        $insert->person_id = $insert->person_id = 'From '.$bank_act_from_details->bank_account_name.' To '.$bank_act_to_details->bank_account_name;

        $insert->schools_id = $schools_id;
        $insert->save();

        
        /**GL trans 1 */
        
        $insert = new GLTranscation;
        $insert->type = 4;
        $insert->type_no = 10;
        $insert->tran_date = $date;
        $insert->account = $bank_act_from_details->account_code;
        $insert->memo_ = 'From '.$bank_act_from_details->bank_account_name.' To '.$bank_act_to_details->bank_account_name;
        $insert->amount ='-'.($amount+$bank_charge);
        $insert->dimension_id = 0;
        $insert->dimension2_id = 0;
        $insert->person_type_id = 0;
        $insert->person_id = 0;
        $insert->schools_id = $schools_id;
        $insert->save();
        


        /**GL trans 2 */
        
        $insert = new GLTranscation;
        $insert->type = 4;
        $insert->type_no = 10;
        $insert->tran_date = $date;
        $insert->account = 5690;//$bank_act_from_details->account_code;
        $insert->memo_ = 'From '.$bank_act_from_details->bank_account_name.' To '.$bank_act_to_details->bank_account_name;
        $insert->amount = $bank_charge;
        $insert->dimension_id = 0;
        $insert->dimension2_id = 0;
        $insert->person_type_id = 0;
        $insert->person_id = 0;
        $insert->schools_id = $schools_id;
        $insert->save();


        /**GL trans 3 */

        $insert = new GLTranscation;
        $insert->type = 4;
        $insert->type_no = 10;
        $insert->tran_date = $date;
        $insert->account = $bank_act_to_details->account_code;
        $insert->memo_ = 'From '.$bank_act_from_details->bank_account_name.' To '.$bank_act_to_details->bank_account_name;
        $insert->amount = $amount;
        $insert->dimension_id = 0;
        $insert->dimension2_id = 0;
        $insert->person_type_id = 0;
        $insert->person_id = 0;
        $insert->schools_id = $schools_id;
        $insert->save();
        

        return redirect()->route('accounts.bank_account_transfer_view')
                            ->with('success','Deposit added successfully.');



    }




/**
* 
* Journal Entry
* 
*/
 public function journal_entry_view(){
    $schools_id = Auth::user()->schools_id;
    $bank_account_list  = BankAccounts::where('schools_id',$schools_id)->get();
    $accounts_list = ChartMaster::where('schools_id',$schools_id)->get();
    $dimensions = Dimensions::where('schools_id',$schools_id)->get();
    return view('backend.accounts.journal_entry_view')->with(compact('bank_account_list','accounts_list','dimensions'));
 }

 public function journal_entry_store(Request $request){

    $schools_id = Auth::user()->schools_id;
    $date = $request->trans_date;
    $bank_act = $request->bank_act;
    $bank_account  = BankAccounts::where('id',$bank_act)->first();
    $dimension_id = $request->dimension_id;
    $dimension2_id = '';
    $debit_credit = $request->debit_credit;
    $amount = $request->amount;
    $memo = $request->memo;

    /**If entry is a debit */
    if($debit_credit == 0){        
        /**Bank trans 2 */
        $insert = new BankTransaction;
        $insert->type = 0;
        $insert->trans_no = 10;
        $insert->ref = 1;
        $insert->bank_act = $bank_act;
        $insert->trans_date = $date;
        $insert->amount = $amount;
        $insert->dimension_id = 0;
        $insert->dimension2_id = 0;
        $insert->person_type_id = 0;
        $insert->person_id = 0;
        $insert->schools_id = $schools_id;
        $insert->save();

        /**GL trans 3 */
        $insert = new GLTranscation;
        $insert->type = 4;
        $insert->type_no = 10;
        $insert->tran_date = $date;
        $insert->account = $bank_account->account_code;
        $insert->memo_ = $memo;
        $insert->amount = $amount;
        $insert->dimension_id = 0;
        $insert->dimension2_id = 0;
        $insert->person_type_id = 0;
        $insert->person_id = 0;
        $insert->schools_id = $schools_id;
        $insert->save();
    }
    /**If entry is a credit */
    if($debit_credit == 1){
        /**Bank trans 2 */
        $insert = new BankTransaction;
        $insert->type = 0;
        $insert->trans_no = 10;
        $insert->ref = 1;
        $insert->bank_act = $bank_act;
        $insert->trans_date = $date;
        $insert->amount = '-'.$amount;
        $insert->dimension_id = 0;
        $insert->dimension2_id = 0;
        $insert->person_type_id = 0;
        $insert->person_id = 0;
        $insert->schools_id = $schools_id;
        $insert->save();

        /**GL trans 3 */
        $insert = new GLTranscation;
        $insert->type = 4;
        $insert->type_no = 10;
        $insert->tran_date = $date;
        $insert->account = $bank_account->account_code;
        $insert->memo_ = $memo;
        $insert->amount = '-'.$amount;
        $insert->dimension_id = 0;
        $insert->dimension2_id = 0;
        $insert->person_type_id = 0;
        $insert->person_id = 0;
        $insert->schools_id = $schools_id;
        $insert->save();
    }


    return redirect()->route('accounts.journal_entry_view')
                                ->with('success','Journal entry added successfully.');


}


/**
 * 
 * Budget Entry
 * 
 */

public function budget_entry_view(Request $request){
    $schools_id = Auth::user()->schools_id;
    $fiscal_years = FiscalYear::where('schools_id',$schools_id)->get();
    $chart_types = ChartType::where('schools_id',$schools_id)->get();;
    $dimensions = Dimensions::where('schools_id',$schools_id)->get();;

    $fiscal_year_id = $request->fiscal_year;    
    $account = $request->account;
    $dimension_id = $request->dimension_id;

    if($fiscal_year_id && $account){

        $fiscal_year_info= FiscalYear::where('id',$fiscal_year_id)->first();
        $fiscal_year_begin = date('Y-m-d',strtotime($fiscal_year_info->begin));
        $fiscal_year_end = date('Y-m-d',strtotime($fiscal_year_info->end));
        $fiscal_year = date('Y',strtotime($fiscal_year_info->begin));
        $month_begin = date('m',strtotime($fiscal_year_info->begin));
        $month_end = date('m',strtotime($fiscal_year_info->end));

        $trans_date = array();

        for($i= $month_begin; $i <= $month_end; $i++){
            if(strlen($i) <= 1){
                $trans_date[] = date($fiscal_year.'-0'.$i.'-01');
            }else{
                $trans_date[] = date($fiscal_year.'-'.$i.'-01');
            }
        }


        return view('backend.accounts.budget_entry_view')->with(compact('fiscal_years','chart_types','dimensions','trans_date','dimension_id','account'));
    }else{
        return view('backend.accounts.budget_entry_view')->with(compact('fiscal_years','chart_types','dimensions'));
    }

    
}

public function budget_entry_update(Request $request){
    
    $schools_id = Auth::user()->schools_id;
    $tran_date = (array)$request->tran_date;
    $amount = (array)$request->amount;
    $account = $request->account;

    for($i=0;$i<count($tran_date);$i++){
        $check = BudgetTransaction::where('schools_id',$schools_id)->where('tran_date',$tran_date[$i])->first();


        if(count($check) == 0){
            $insert = new BudgetTransaction;
            $insert->tran_date = $tran_date[$i];
            $insert->amount = $amount[$i];
            $insert->schools_id = $schools_id;
            $insert->account = $account;
            $insert->memo_ = 0;
            $insert->save();
        }else{
            //return "hello";
            $update = BudgetTransaction::where('counter',$check->counter)->update([
                'tran_date' => $tran_date[$i],
                'amount' => $amount[$i],
                'schools_id' => $schools_id,
                'memo_' => 0,
            ]);
            

        }
    }

    return redirect()->route('accounts.budget_entry_view')
                                ->with('success','budget entry added successfully.');

}


 /**
 * 
 * Reconcile Bank Account
 * 
 */

public function reconcile_bank_account_view(){
     
}

/**
 * 
 * Journal Inquiry
 * 
 */

public function journal_inquiry_view(){
     
}


/**
 * 
 * GL Inquiry
 * 
 */ 

public function gl_inquiry_view(){
     
}


/**
 * 
 * Bank Account Inquiry
 * 
 */

public function bank_account_inquiry_view(){
     
}


/**
 * 
 * Tax Inquiry
 * 
 */
public function tax_inquiry_view(){
     
}


 /**
 * 
 * Trial Balance
 * 
 */
public function trial_balance_view(){
     
}


 /**
 * 
 * Balance Sheet Drilldown
 * 
 */
public function balance_sheet_drilldown_view(){
     
}

/**
 * 
 * Profit and Loss Drilldown
 * 
 */

public function profit_loss_drilldown_view(){
     
}

/**
 * 
 * Banking Reports
 * 
 */
public function banking_reports_view(){
     
}


/**
 * 
 * General Ledger Reports
 * 
 */

public function gl_reports_view(){
     
}



/**Salary Sheet */

public function hr_account_salary_sheet(Request $request){
    $schools_id = Auth::user()->schools_id;
    $chart_master = ChartMaster::where('schools_id',$schools_id)->get();

    if(isset($request->year) && isset($request->month_id)){
        $year = $request->year;
        $month_id =  $request->month_id;
        $salary_sheet = HRAccountSalarySheet::where('schools_id',$schools_id)
                                                    ->where('year',$year)
                                                    ->where('month_id',$month_id)
                                                    ->where('status',0)
                                                    ->get();
        return view('backend.accounts.hr_account_salary_sheet')
                        ->with(compact('salary_sheet','chart_master'));
    }else{
        return view('backend.accounts.hr_account_salary_sheet')
                            ->with(compact('chart_master'));
    }
 
}

public function hr_account_salary_sheet_update(Request $request){

    //return $request->all();
    $schools_id = Auth::user()->schools_id;

    for($i=0;$i<count($request->id);$i++){
        $gross_salary = $request->amount[$i];
        $extra_salary = HRExtraSalary::where('emp_code',$request->emp_code[$i])->sum('amount');
        $extra_salary_deduct = HRExtraSalaryDeduct::where('emp_code',$request->emp_code[$i])->sum('amount');
        $amount = ($gross_salary+$extra_salary)-$extra_salary_deduct;
        $status = 1;
        $account_code = $request->account_code;
        $emp_account_code = $request->emp_account_code[$i]; 

        $insert = new GLTranscation;
        $insert->schools_id = $schools_id;
        $insert->account = $emp_account_code;
        $insert->amount = $amount;
        $insert->type = 4;
        $insert->type_no = 10;
        $insert->memo_ = 'Salary disbursement';
        $insert->save();

        $insert_1 = new GLTranscation;
        $insert_1->schools_id = $schools_id;
        $insert_1->account = $account_code;
        $insert_1->amount = -$amount;
        $insert_1->type = 4;
        $insert_1->type_no = 10;
        $insert_1->memo_ = 'Salary disbursement';
        $insert_1->save();


        $update = HRAccountSalarySheet::where('schools_id',$schools_id)
            ->where('id',$request->id[$i])->update([
                'status' => $status,
                'processed_by' => Auth::user()->fullname
            ]);
    }

    return redirect()->route('accounts.hr_account_salary_sheet')->with('success','Salary disbursed');
 
}




}
