<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectionVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('memberId')->comment("รหัสสมาชิก");
            $table->string('electionId')->comment("รหัสการเลือกตั้ง");
            $table->string('voteTo')->comment("โหวตให้กับรหัสสมาชิก");
            $table->integer('point')->comment("คะแนน");
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
        Schema::dropIfExists('election_votes');
    }
}
