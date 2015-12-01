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
        // return view('reports.ledger',compact('acc','ledgers'));
    	return \PDF::loadHTML(view('reports.ledger',compact('acc','ledgers')))->stream('ledger.pdf');
    }

    public function test(){
        return \PDF::loadHTML()->stream('test.pdf'); 
        //return view('reports.report1');
    }
}
