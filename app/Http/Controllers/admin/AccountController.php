<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Account;
use App\Ledger;
use App\Loan;
use App\Member;
use App\Http\Requests\CreateLoanRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accs = Account::all();
        return view('admin.account.index',compact('accs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $members = [];
        foreach (Member::all() as $member) {
            $members += [$member->id => $member->name()];
        }
        $loans = Loan::all();
        $ltypes = [];
        foreach ($loans as $loan) {
            $ltypes += [$loan->id => $loan->name];
        }
        return view('admin.account.create', compact('ltypes','members','loans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLoanRequest $request)
    {
        //dd($request->loan_id);
        $acc = new Account();
        $acc->loan_id = $request->loan_id;
        $acc->member_id = $request->member_id;
        $acc->terms = $request->terms;
        $acc->amountGranted = $request->amount;
        $acc->comaker = $request->comaker;
        $acc->dateGranted = $request->dateGranted;

        $acc->dueDate = $acc->dateGranted;
        $acc->dueDate->addDays($acc->terms+1);//tama ba to?
        $acc->balance = $acc->amountGranted;
        $acc->save();
        $insurance = 0.0;
        $cbu = 0.0;
        $sfee = 0.0;
        $advint = 0.0;
        switch($acc->loan_id-1){
            case 0:
                $today = \Carbon\Carbon::now();
                $mm = $today->month;
                if($mm==12||$mm==1){
                    $insurance = 0;//todo
                }
                else if($mm>=6&&$mm<=8){
                    $insurance = $acc->amountGranted*0.15;
                }
                $cbu = 500 * $acc->member->landArea;
                break;
            case 1:
                $cbu = 500;
                break;
            case 2:
            case 3:
            case 4:
            case 5:
                $advint = (($acc->amountGranted * $acc->loan->intRate * $acc->terms)/360)/2;
                break;
            case 6:
                //wala
            break;
        }

        $sfee = $acc->amountGranted * $acc->loan->sFee;
        //$total = $advint+$pcic+$insurance+$sfee+$sdeposit+$mortuary+$cbu+$balance+$penalty;
        $total = $advint+$insurance+$sfee+$cbu;
        $net = $acc->amountGranted-$total;

        $ledger = new Ledger();
        $ledger->account_id = $acc->id;
        $ledger->curDate = date('Y-m-d');
        $ledger->particulars = 'LOAN';
        $ledger->reference = $acc->id;
        $ledger->avaiment = $acc->amountGranted;
        $ledger->amountPayed = 0;
        $ledger->interestDue = 0.0;
        $ledger->penaltyDue = 0.0;
        $ledger->principal = 0.0;
        $ledger->interestPayed = 0.0;
        $ledger->penaltyPayed = 0.0;
        $ledger->balance = $acc->amountGranted;
        $acc->balance = $acc->amountGranted;//toodo

        
        $ledger->save();

        return \PDF::loadHTML(view('reports.report1',compact('insurance','cbu','sfee','advint','total','net','acc')))
        ->stream('test.pdf'); 
        //flash()->success("Success!");
        //return redirect('/admin');
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
        return view('admin.account.show',compact('ledgers'),compact('acc'));
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
