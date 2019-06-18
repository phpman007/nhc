<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('groupId')->comment("รหัสกลุ่ม")->nullable();
            $table->string('province')->comment("จังหวัด")->nullable();
            $table->string('section')->comment("เขต")->nullable();
            $table->date('openDate')->comment("วันที่เปิดรับสมัคร")->nullable();
            $table->date('endDate')->comment("วันที่สิ้นสุดการรับสมัคร")->nullable();
            $table->date('confirmDate')->comment("วันที่ยืนยันการรับสมัคร")->nullable();
            $table->date('electionDate')->comment("วันลงคะแนนเสียงเลือกตั้ง")->nullable();
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
        Schema::dropIfExists('elections');
    }
}
