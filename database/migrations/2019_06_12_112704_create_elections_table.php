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
            $table->integer('groupId')->comment("รหัสกลุ่ม");
            $table->integer('seniorGroupId')->comment("รหัสกลุ่มผู้ทรงคุณวุฒิ");
            $table->integer('organizationGroupId')->comment("รหัสกลุ่มผู้แทนองค์กรบริหารส่วนท้องถิ่น");
            $table->integer('ngoGroupId')->comment("รหัสกลุ่มผู้แทนองค์กรภาคเอกชน");
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
