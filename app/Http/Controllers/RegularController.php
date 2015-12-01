<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Account;
use App\Loan;
use App\Http\Requests\LoanApplicationRequest;
use App\LoanApplication;
use App\Ledger;

class RegularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accs = Auth::user()->member->accounts;
        //dd($accs);
        return view('regular.index',compact('accs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ltypes = [];
        foreach (Loan::all() as $loan) {
            $ltypes += [$loan->id => $loan->name];
        }
        return view('regular.create', compact('ltypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoanApplicationRequest $request)
    {
        $lrq = new LoanApplication();
        $lrq->loan_id = $request->loan_id;
        $lrq->member_id = Auth::user()->member->id;
        $lrq->terms = $request->terms;
        $lrq->amountGranted = $request->amount;
        $lrq->comaker = $request->comaker;
        $lrq->save();
        flash()->success("We have received your loan application. Please wait for it's appoval");
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acc = Account::find($id);
        $ledgers = Ledger::where('account_id',$acc->id)->get();
        //dd($ledgers);
        return view('regular.show',compact('ledgers'),compact('acc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //TODO
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
        //TODO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO
    }
}
