<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
	protected $fillable = [
		'account_id',
		'curDate',
		'particulars',
		'reference',
		'avaiment',
		'amountPayed',
		'interestDue',
		'penaltyDue',
		'principal',
		'interestPayed',
		'penaltyPayed',
		'balance'
	];

	protected $dates = ['curDate'];

    public function account(){
    	return $this->belongsTo('App\Account');
    }
}
