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

        //CREATE ADMIN USER
        $adm = new App\User();
        $adm->username = 'admin';
        $adm->password = bcrypt('admin');
        $adm->admin = true;
        $adm->save();

        //LOANS
        App\Loan::create(array('name' => 'CPL','intRate' => 0.08, 'sFee' => 0.02, 'penalty' => 0.36));
        App\Loan::create(array('name' => 'Capital Share','intRate' => 0.15, 'sFee' => 0.02, 'penalty' => 0));
        App\Loan::create(array('name' => 'Character','intRate' => 0.2, 'sFee' => 0.02, 'penalty' => 0.24, 'advinterest' => true));
        App\Loan::create(array('name' => 'CPL-MSO','intRate' => 0.18, 'sFee' => 0.02, 'penalty' => 0.24, 'advinterest' => true));
        App\Loan::create(array('name' => 'Providential','intRate' => 0.2, 'sFee' => 0.02, 'penalty' => 0.24,'advinterest' => true));
        App\Loan::create(array('name' => 'Salary','intRate' => 0.2, 'sFee' => 0.02, 'penalty' => 0.24,'advinterest' => true,'amortization' => true));
        App\Loan::create(array('name' => 'Emergency','intRate' => 0.2, 'sFee' => 0.02, 'penalty' => 0));
        // App\Loan::create(array('name' => 'Microfinance','intRate' => 0.26, 'sFee' => 0.02, 'penalty' => 0.24,'amortization' => true));
        // App\Loan::create(array('name' => 'A/R-Trade-Rice','intRate' => 0, 'sFee' => 0, 'penalty' => 0.36));
        // App\Loan::create(array('name' => 'A/R-Trade-Input','intRate' => 0.1, 'sFee' => 0, 'penalty' => 0.36));
        // App\Loan::create(array('name' => 'A/R-Trade-Seeds','intRate' => 0, 'sFee' => 0, 'penalty' => 0.36));
        // App\Loan::create(array('name' => 'A/R-Trade-Supplement','intRate' => 0.1, 'sFee' => 0, 'penalty' => 0));
        // App\Loan::create(array('name' => 'A/R-Trade-Palay','intRate' => 0.1, 'sFee' => 0, 'penalty' => 0));
        // App\Loan::create(array('name' => 'A/R-Trade-Others','intRate' => 0.1, 'sFee' => 0, 'penalty' => 0));
        // App\Loan::create(array('name' => 'OC/R-GOJO','intRate' => 0, 'sFee' => 0, 'penalty' => 0));
        // App\Loan::create(array('name' => 'LPG','intRate' => 0, 'sFee' => 0, 'penalty' => 0));
        // App\Loan::create(array('name' => 'A/R Trade Kopia','intRate' => 0, 'sFee' => 0, 'penalty' => 0));


        factory('App\MemApplicant',10)->create();

        Model::reguard();
    }
}
