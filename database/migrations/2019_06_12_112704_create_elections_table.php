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
            $table->string('seniorGroupId')->comment("รหัสกลุ่มย่อยผู้ทรงคุณวุฒิ")->nullable();
            $table->string('organizationGroupId')->comment("รหัสกลุ่มย่อยองค์กรปกครองส่วนท้องถิ่น")->nullable();
            $table->string('ngoGroupId')->comment("รหัสกลุ่มย่อยองค์กรภาคเอกชน")->nullable();
            $table->string('provinceId')->comment("รหัสจังหวัด")->nullable();
            $table->string('section')->comment("เขต")->nullable();
            $table->date('openDate')->comment("วันที่เปิดรับสมัคร")->nullable();
            // $table->time('openTime')->comment("เวลาเปิดรับสมัคร")->nullable();
            $table->date('endDate')->comment("วันที่สิ้นสุดการรับสมัคร")->nullable();
            // $table->time('endTime')->comment("เวลาปิดรับสมัคร")->nullable();
            $table->date('confirmDate')->comment("วันที่ยืนยันการรับสมัคร")->nullable();
            // $table->time('confirmTime')->comment("เวลายืนยันการรับสมัคร")->nullable();
            $table->date('electionDate')->comment("วันลงคะแนนเสียงเลือกตั้ง")->nullable();
            $table->time('openElectionTime')->comment("เวลาเปิดลงคะแนน")->nullable();
            $table->time('endElectionTime')->comment("เวลาปิดลงคะแนน")->nullable();
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
