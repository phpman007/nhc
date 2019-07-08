<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigIncrements('id');
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('nameTitle', 100)->comment("คำนำหน้าชื่อ")->nullable();
            $table->string('firstname', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('fullname', 255)->comment("ชื่อเต็ม")->nullable();
            $table->string('personalId', 13)->comment("เลขที่บัตรประชาชน")->nullable();
            $table->integer('groupId')->comment("รหัสกลุ่ม")->nullable();
            $table->integer('seniorGroupId')->comment("รหัสกลุ่มกรณีที่อยู่ในกลุ่มผู้ทรงคุณวุฒิ")->nullable();
            $table->integer('organizationGroupId')->comment("รหัสกลุ่มกรณีที่อยู่ในกลุ่มองค์กรส่วนท้องถิ่น")->nullable();
            $table->integer('ngoGroupId')->comment("รหัสกลุ่มกรณีที่อยู่ในกลุ่มองค์กรอิสระ")->nullable();
            $table->integer('candidateStatus')->comment("สถานะสมาชิกว่าเป็นผู้สมัครรับเลือกหรือผู้ลงคะแนนเพียงอย่างเดียว")->nullable();
            $table->string('candidateNumber')->comment("หมายเลขเลือกตั้ง")->nullable();
            $table->integer('last_step')->comment("ตอนนี้ทำถึงสเต็ปที่")->nullable();
            $table->integer('status_accept')->comment("ยื่นเอกสารแล้วหรือไม่")->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('members');
    }
}
