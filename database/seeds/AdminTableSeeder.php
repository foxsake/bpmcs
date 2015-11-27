<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class {{class}} extends Seeder
{
    public function run()
    {
    	$adm = new App\User();
    	$adm->username = 'admin';
    	$adm->password = bcrypt('admin');
        $adm->admin = true;
    	$adm->save();
        //$adm->email = 'admin@test.com';
        //$adm->name = 'admin';
        // TestDummy::times(20)->create('App\Post');
    }
}
