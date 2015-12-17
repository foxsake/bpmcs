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
        //set default values..
        $ledger->account_id = $request->id;
        $ledger->curDate = date('Y-m-d');
        $ledger->particulars = $request->particulars;
        $ledger->reference = $request->reference;
        $ledger->penaltyDue = 0.0;
        $ledger->interestPayed = 0.0;
        $ledger->penaltyPayed = 0.0;


        /*
            removed this part for accepting just payment in updating the ledger.
            can be restored back to accepting loaning by uncommenting this code
            and the corresponting code on it's view.
        */
        // if($request->actn=='true'){
        //     $ledger->avaiment = $request->cash;
        //     $ledger->principal = 0;
        //     $acc->balance += $request->cash;
        //     $ledger->balance = $acc->balance;
        // }
        // else{
            $interest = 0;
            //check if due if due give penalty
            $diff = \Carbon\Carbon::now()->diffInDays($acc->dueDate->copy(),false);

            if($diff<0){
                $ledger->penaltyDue = ($acc->amountGranted * $acc->loan->penalty * abs($diff))/360;
                $ledger->penaltyPayed = $ledger->penaltyDue;
            }

            //compute normal interest
            if(count($acc->ledgers)==1){
                // $interest = ($acc->amountGranted * $acc->loan->intRate * $acc->terms)/360;         
                // $interestDue = $interest*($acc->dateGranted->diffInDays(\Carbon\Carbon::now()));
                //dd($acc->dateGranted->diffInDays(\Carbon\Carbon::now()));
                //ditoo
                $ledger->interestDue = ($acc->amountGranted * $acc->loan->intRate * $acc->dateGranted->diffInDays(\Carbon\Carbon::now()))/360;
                //dd($ledger->interestDue);
                //dd($interestDue);
            }

            //interest if past due and with partial..
            if($diff<0 && count($acc->ledgers)>1){
                $ledger->interestDue = ($acc->amountGranted * $acc->loan->intRate * $acc->dateGranted->diffInDays(\Carbon\Carbon::now()))/360;
                // $interest = ($acc->amountGranted * $acc->loan->intRate * $acc->terms)/360;         
                // $interestDue = $interest*($acc->dueDate->diffInDays(\Carbon\Carbon::now()));
            }

            //loan specific actions..
            switch($acc->loan_id-1){
                case 0:
                    if(count($acc->ledgers)==1){
                        $ledger->interestDue = ($acc->amountGranted * $acc->loan->intRate * $acc->terms)/360;
                        $ledger->interestPayed = $ledger->interestDue;
                    }
                    break;
                case 1:
                    //by default is already working how it should
                    break;
                case 2:
                case 3:
                case 4:
                case 5:
                    $half = \Carbon\Carbon::now()->diffInDays($acc->dateGranted->copy()->addDays($acc->terms/2),false);

                    $ledger->interestDue = 0;
                    if($half == 0 || $half<0){
                        $ledger->interestDue = ($acc->amountGranted * $acc->loan->intRate * abs($half))/360;         
                    }
                    break;
                case 6:
                    $penaltyDue = 0;
                    $penaltyPayed = 0;

                    if($diff<0){
                        $ledger->interestDue = ($acc->amountGranted * $acc->loan->intRate * abs($diff))/360;
                        $ledger->interestPayed = $ledger->interestDue;
                    }
                break;
            }

            $ledger->principal = $request->cash - ($ledger->penaltyDue + $ledger->interestDue);
            $ledger->avaiment = 0;   

            $acc->balance -= $ledger->principal;
            $ledger->balance = $acc->balance;

            $ledger->amountPayed = $request->cash;
        //}

        $ledger->save();
        $acc->save();

        flash()->success('Updated Ledger');

        return redirect('admin/accounts/'.$request->id);
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
