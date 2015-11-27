<?php

namespace App\Http\Controllers\admin;

//use Illuminate\Http\Request;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LoanApplication;
use App\Account;

class LoanApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appli = LoanApplication::all();
        return view('admin.application.loan',compact('appli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appli = LoanApplication::findOrFail($request::get('id'));
        //$appli->accepted = $request::get('accept');
        //$appli->save();
        //if($appli->accepted=='true'){
        if($request::get('accept')=='true'){
            $acc = new Account();
            $acc->loan_id = $appli->loan_id;
            $acc->member_id = $appli->member_id;
            $acc->terms = $appli->terms;
            $acc->amountGranted = $appli->amountGranted;
            $acc->comaker = $appli->comaker;
            $acc->dateGranted = $request::get('date');
            $acc->dueDate = $acc->dateGranted;
            $acc->dueDate->addDays($acc->terms);
            $acc->balance = $acc->amountGranted;
            $acc->save();
        }
        $appli->delete();
        flash()->success("Success!");
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
