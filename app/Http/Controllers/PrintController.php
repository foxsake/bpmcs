<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Account;
use App\Ledger;

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
        $days = 200; //# of days compared
        $accs = Account::whereRaw('datediff(accounts.dueDate,curdate()) <= '.$days)
        ->orderByRaw('datediff(accounts.dueDate,curdate()) ASC')->get();
        $title = "ACCOUNT TO BE PAST DUE IN ".$days." DAYS OR LESS";
        return \PDF::loadHTML(view('reports.account_template',compact('accs','title')))->stream('report.pdf');
    }

    public function test(){
        return \PDF::loadHTML()->stream('test.pdf'); 
        //return view('reports.report1');
    }
}
