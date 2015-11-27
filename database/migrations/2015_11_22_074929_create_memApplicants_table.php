<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memApplicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lName');
            $table->string('fName');
            $table->string('mName');
            $table->enum('gender',['m','f']);
            //$table->date('memDate');
            $table->text('addr');
            $table->date('bDay');
            $table->string('religion');
            $table->string('civilStatus');
            $table->string('spouce');
            $table->string('highestEd');
            $table->string('occupation');

            $table->string('beneficiary');
            $table->string('relToMem');
            $table->string('contact');
            
            $table->string('initShare');
            $table->string('amntShare');

            $table->string('initCBU');//check yung mga datatypes
            $table->string('landArea');
            $table->string('credLine');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('ownType');
            
            $table->string('email')->unique();
            //$table->string('termination');
            //$table->enum('status',['associate','regular']);
            $table->boolean('accepted');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('memApplicants');
    }
}
