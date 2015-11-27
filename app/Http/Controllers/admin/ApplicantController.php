<?php

namespace App\Http\Controllers\admin;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MemApplicant;
use App\Member;
use App\User;
use Carbon\Carbon;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appli = MemApplicant::all();
        return view('admin.application.member',compact('appli'));
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
        $appli = MemApplicant::findOrFail($request::get('id'));
        $appli->accepted = $request::get('accept');
        //dd($appli->accepted);
        $appli->save();
        if($appli->accepted=='true'){
            $mem = new Member();
            $mem->lName = $appli->lName;
            $mem->fName = $appli->fName;
            $mem->mName = $appli->mName;
            $mem->gender = $appli->gender;
            $mem->memDate = Carbon::now();
            $mem->addr = $appli->addr;
            $mem->bDay = $appli->bDay;
            $mem->religion = $appli->religion;
            $mem->civilStatus = $appli->civilStatus;
            $mem->spouce = $appli->spouce;
            $mem->highestEd = $appli->highestEd;
            $mem->occupation= $appli->occupation;
            $mem->beneficiary= $appli->beneficiary;
            $mem->relToMem= $appli->relToMem;
            $mem->contact= $appli->contact;
            $mem->initShare= $appli->initShare;
            $mem->amntShare= $appli->amntShare;
            $mem->initCBU= $appli->initCBU;
            $mem->landArea= $appli->landArea;
            $mem->credLine= $appli->credLine;
            $mem->municipality= $appli->municipality;
            $mem->barangay= $appli->barangay;
            $mem->ownType= $appli->ownType;
            //$mem->termination= $appli->termination;
            $mem->status= $request::get('status');;
            $mem->save();
            $us = new User();
            $us->email= $appli->email;
            $us->member_id = $mem->id;
            $us->password = bcrypt('regular');//to randomize
            $us->save();
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
        $appli = MemApplicant::findOrFail($id);
        return view('admin.application.applicant',compact('appli'));
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
