<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lName');
            $table->string('fName');
            $table->string('mName');
            $table->enum('gender',['m','f']);
            $table->date('memDate');
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
            $table->decimal('initShare',14,2);
            $table->decimal('amntShare',14,2);
            $table->string('initCBU');//check yung mga datatypes
            $table->string('landArea');
            $table->string('credLine');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('ownType');
            $table->string('termination');
            $table->enum('status',['associate','regular']);
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
        Schema::drop('members');
    }
}
