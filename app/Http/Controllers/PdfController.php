<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
	//test
    public function github (){
 		return \PDF::loadFile('http://www.github.com')->stream('github.pdf'); 
 	}
}
