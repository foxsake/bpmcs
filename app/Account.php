<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
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
