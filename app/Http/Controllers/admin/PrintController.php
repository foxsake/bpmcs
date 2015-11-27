<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Account;
use App\Ledger;

class PrintController extends Controller
{
    public function printLedger(Request $request){
    	//
    	//$pdf = \PDF::make('snappy.pdf.wrapper');
    	//$pdf->loadHTML('<h1>Test</h1>');

    	$acc = Account::find($request->id);
        $ledgers = Ledger::where('account_id',$acc->id)->get();
        //dd($ledgers);

    	return \PDF::loadHTML(view('admin.loan.show',compact('ledgers'),compact('acc')))->stream('ledger.pdf'); 
    	//return \PDF::loadHTML('<h1>Test</h1>')->stream();
    }
}
