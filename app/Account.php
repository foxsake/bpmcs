<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Account extends Model
{

    protected $dates = ['dateGranted','dueDate'];

    public function setdateGrantedAttribute($date){
        $this->attributes['dateGranted'] = Carbon::parse($date);
    }

    public function setdueDateAttribute($date){
        $this->attributes['dueDate'] = Carbon::parse($date);
    }

    

    public function member()
    {
    	return $this->belongsTo('App\Member');
    }

    public function loan()
    {
    	return $this->belongsTo('App\Loan');
    }

    public function ledger()
    {
    	return $this->hasMany('App\Ledger');
    }


}
