<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member')->unsigned();
            $table->integer('loan')->unsigned();
            $table->string('terms');
            $table->integer('comaker');
            $table->date('dateGranted');
            $table->date('dueDate');
            $table->double('amountGranted');
            $table->double('balance');
            $table->timestamps();

            $table->foreign('member')
                ->references('id')
                ->on('members')
                ->onDelete('cascade');

            $table->foreign('loan')
                ->references('id')
                ->on('loans')
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
        Schema::drop('accounts');
    }
}
