<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemApplicant extends Model
{
    protected $table = 'memApplicants';
    protected $fillable = [
    	'lName',
        'fName',
        'mName',
        'gender',
        'addr',
        'bDay',
        'religion',
        'civilStatus',
        'spouse',
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
        'ownType'
    ];

    public function name(){
        return $this->lName . ", " . $this->fName . " " . $this->mName[0] . ".";
    }

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
