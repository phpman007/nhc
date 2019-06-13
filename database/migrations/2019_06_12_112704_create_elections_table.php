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
            $table->string('groupId')->comment("รหัสกลุ่ม");
            $table->string('province')->comment("จังหวัด");
            $table->string('section')->comment("เขต");
            $table->date('openDate')->comment("วันที่เปิดรับสมัคร");
            $table->date('endDate')->comment("วันที่สิ้นสุดการรับสมัคร");
            $table->date('confirmDate')->comment("วันที่ยืนยันการรับสมัคร");
            $table->date('electionDate')->comment("วันลงคะแนนเสียงเลือกตั้ง");
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
        Schema::dropIfExists('elections');
    }
}
