<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->date('curDate');
            $table->string('particulars');
            $table->string('reference');
            $table->decimal('avaiment');
            $table->decimal('amountPayed');
            $table->decimal('interestDue');
            $table->decimal('penaltyDue');
            $table->decimal('principal');
            $table->decimal('interestPayed');
            $table->decimal('penaltyPayed');
            $table->decimal('balance');
            $table->timestamps();

            $table->foreign('account_id')
                ->references('id')
                ->on('accounts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ledgers');
    }
}
