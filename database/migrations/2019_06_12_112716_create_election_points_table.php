<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectionPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('electionId')->comment("รหัสการเลือกตั้ง")->nullable();
            $table->string('memberId')->comment("รหัสสมาชิก")->nullable();
            $table->integer('memberPoint')->comment("คะแนน")->nullable();
            $table->timestamps()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('election_points');
    }
}
