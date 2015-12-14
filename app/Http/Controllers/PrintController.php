<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Account;
use App\Ledger;
use App\Member;

class PrintController extends Controller
{

    public function printLedger(Request $request){
        $acc = Account::find($request->id);        
        $ledgers = Ledger::where('account_id',$acc->id)->get();
    	return \PDF::loadHTML(view('reports.ledger',compact('acc','ledgers')))->stream('ledger.pdf');
    }

    /**
    *Prints the accounts to be past due with the given # of days.
    */
    public function accToBePastDue(){
        $days = 31; //# of days compared
        $accs = Account::whereRaw('datediff(accounts.dueDate,curdate()) <= '.$days.' and datediff(accounts.dueDate,curdate()) >= 0')
        ->orderByRaw('datediff(accounts.dueDate,curdate()) ASC')->get();
        $title = "ACCOUNT TO BE PAST DUE IN ".$days." DAYS OR LESS";
        return \PDF::loadHTML(view('reports.account_template',compact('accs','title')))->stream('report.pdf');
    }

    /**
    *Prints the accounts past due with the given # of days.
    */
    public function accPastDue(){
        $accs = Account::whereRaw('datediff(accounts.dueDate,curdate()) < 0')
        ->orderByRaw('datediff(accounts.dueDate,curdate()) ASC')->get();
        $title = "ACCOUNTS PAST DUE";
        return \PDF::loadHTML(view('reports.account_template',compact('accs','title')))->stream('report.pdf');
    }

    public function schedule(){
        $mems = Member::orderBy('lname')->get();
        $totals = array(0,0,0,0,0,0,0);

        foreach($mems as $mem){
            $bal = 0.0;
            //dd($bal = $mem->accounts->where('loan_id',1)->first()->balance);
            $totals[0] += !empty($mem->accounts->where('loan_id',1)->first()->balance) ? $mem->accounts->where('loan_id',1)->first()->balance : 0.0;
            $totals[1] += !empty($mem->accounts->where('loan_id',2)->first()->balance) ? $mem->accounts->where('loan_id',2)->first()->balance : 0.0;
            $totals[2] += !empty($mem->accounts->where('loan_id',3)->first()->balance) ? $mem->accounts->where('loan_id',3)->first()->balance : 0.0;
            $totals[3] += !empty($mem->accounts->where('loan_id',4)->first()->balance) ? $mem->accounts->where('loan_id',4)->first()->balance : 0.0;
            $totals[4] += !empty($mem->accounts->where('loan_id',5)->first()->balance) ? $mem->accounts->where('loan_id',5)->first()->balance : 0.0;
            $totals[5] += !empty($mem->accounts->where('loan_id',6)->first()->balance) ? $mem->accounts->where('loan_id',6)->first()->balance : 0.0;
            $totals[6] += !empty($mem->accounts->where('loan_id',7)->first()->balance) ? $mem->accounts->where('loan_id',7)->first()->balance : 0.0;
        }
        
        /*foreach($mem->accounts as $acc){
            $acc->balance
        }*/
                    
        return \PDF::loadHTML(view('reports.report2',compact('mems','totals')))->setOrientation('landscape')->stream('test.pdf'); 
        //return view('reports.report1');
    }

    public function accounts(){
        $accs = Account::all();
        $title = "ACCOUNTS";
        return \PDF::loadHTML(view('reports.account_template',compact('accs','title')))->stream('report.pdf');
    }
}
