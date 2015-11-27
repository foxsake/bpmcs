<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * member has many accounts
     */
    public function accounts()
    {
    	return $this->hasMany('App\Account');
    }

    public function name(){
        return $this->lName . ", " . $this->fName . " " . $this->mName[0] . ".";
    }

    protected $fillable = [
    	'lName',
        'fName',
        'mName',
        'gender',
        'memDate',
        'addr',
        'bDay',
        'religion',
        'civilStatus',
        'spouce',
        'highestEd',
        'occupation',
        'beneficiary',
        'relToMem',
        'contact',
        'initShare',
        'amntShare',
        'initCBU',
        'landArea',
        'credLine',
        'municipality',
        'barangay',
        'ownType',
        'termination',
        'status'
    ];

    public function user(){
        return $this->hasOne('App\User');
    }
}
