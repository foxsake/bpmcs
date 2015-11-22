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
}
