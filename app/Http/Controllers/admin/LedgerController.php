<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LedgerRequest;
use App\Ledger;
use App\Account;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.ledger.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LedgerRequest $request)
    {
        $acc = Account::find($request->id);
        $ledger = new Ledger();
        $ledger->account_id = $request->id;
        $ledger->curDate = date('Y-m-d');
        $ledger->particulars = $request->particulars;
        $ledger->reference = $request->reference;
        if($request->actn=='true'){
            $ledger->avaiment = $request->cash;
            $ledger->principal = 0;
            $acc->balance += $request->cash;
            $ledger->balance = $acc->balance;
        }
        else{
            $ledger->principal = $request->cash;
            $ledger->avaiment = 0;   
            $acc->balance -= $request->cash;
            $ledger->balance = $acc->balance;
            $ledger->amountPayed = $request->cash;
        }
        //daya
        $ledger->amountPayed = 0;
        $loan = Loan::find($acc->loan_id);
        if ($loan->advinterest == true) {
            $interest = ($acc->amountGranted*$loan->intRate*$acc->terms)/360;
            $ledger->interestDue = $interest;
        }else{
            $ledger->interestDue = 0.0;
        }
        
        $ledger->penaltyDue = 0.0;
        
        $ledger->interestPayed = 0.0;
        $ledger->penaltyPayed = 0.0;

        $ledger->save();
        $acc->save();

        flash()->success('Updated Ledger');

        return redirect('admin/loans/'.$request->id);
        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.ledger.create',compact('id'));
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
