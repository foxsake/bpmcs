<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Account;

class AdminController extends Controller
{
    public function index(){
    	$days = 31; //# of days compared
        $accstbp = Account::whereRaw('datediff(accounts.dueDate,curdate()) <= '.$days.' and datediff(accounts.dueDate,curdate()) >= 0')
        ->orderByRaw('datediff(accounts.dueDate,curdate()) ASC')->get();
        $accspd = Account::whereRaw('datediff(accounts.dueDate,curdate()) < 0')
        ->orderByRaw('datediff(accounts.dueDate,curdate()) ASC')->get();

    	return view('admin.home',['accstbp'=>$accstbp,'accspd'=>$accspd]);
    }
}
