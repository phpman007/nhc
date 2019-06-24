<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_types', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('candidateType', 50)->comment("ประเภทของสมาชิกแบบสมัครเพื่อลงคะแนนอย่างเดียวหรือแบบลงเลือกตั้งด้วย")->nullable();
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
        Schema::dropIfExists('candidate_types');
    }
}
