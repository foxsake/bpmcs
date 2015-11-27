<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         //$this->call(UserTableSeeder::class);
        //$this->call(AdminTableSeeder::class);
        $adm = new App\User();
        $adm->username = 'admin';
        $adm->password = bcrypt('admin');
        $adm->admin = true;
        $adm->save();

        App\Loan::create(array('name' => 'CPL','intRate' => 0.08, 'sFee' => 0.02, 'penalty' => 0.36));
        App\Loan::create(array('name' => 'Capital Share','intRate' => 0.15, 'sFee' => 0.02, 'penalty' => 0.24));
        App\Loan::create(array('name' => 'Character','intRate' => 0.2, 'sFee' => 0.02, 'penalty' => 0.24));
        App\Loan::create(array('name' => 'CPL-MSO','intRate' => 0.18, 'sFee' => 0.02, 'penalty' => 0.24));
        App\Loan::create(array('name' => 'Providential','intRate' => 0.2, 'sFee' => 0.02, 'penalty' => 0.24));
        App\Loan::create(array('name' => 'Salary','intRate' => 0.2, 'sFee' => 0.02, 'penalty' => 0.24));
        App\Loan::create(array('name' => 'Emergency','intRate' => 0, 'sFee' => 0.02, 'penalty' => 0.24));
        App\Loan::create(array('name' => 'Microfinance','intRate' => 0.26, 'sFee' => 0.02, 'penalty' => 0.24));
        App\Loan::create(array('name' => 'A/R-Trade-Rice','intRate' => 0, 'sFee' => 0, 'penalty' => 0.36));
        App\Loan::create(array('name' => 'A/R-Trade-Input','intRate' => 0.1, 'sFee' => 0, 'penalty' => 0.36));
        App\Loan::create(array('name' => 'A/R-Trade-Seeds','intRate' => 0, 'sFee' => 0, 'penalty' => 0.36));


        factory('App\MemApplicant',10)->create();

        Model::reguard();
    }
}
