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
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nameTitle', 100)->comment("คำนำหน้าชื่อ");
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            // $table->string('fullname', 255)->comment("ชื่อเต็ม");
            $table->string('personalId', 13)->comment("เลขที่บัตรประชาชน");
            $table->integer('groupId')->comment("รหัสกลุ่ม");
            $table->integer('seniorGroupId')->comment("รหัสกลุ่มกรณีที่อยู่ในกลุ่มผู้ทรงคุณวุฒิ");
            $table->integer('organizationGroupId')->comment("รหัสกลุ่มกรณีที่อยู่ในกลุ่มองค์กรส่วนท้องถิ่น");
            $table->integer('ngoGroupId')->comment("รหัสกลุ่มกรณีที่อยู่ในกลุ่มองค์กรอิสระ");
            $table->integer('candidateStatus')->comment("สถานะสมาชิกว่าเป็นผู้สมัครรับเลือกหรือผู้ลงคะแนนเพียงอย่างเดียว");
            $table->rememberToken();
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
        Schema::dropIfExists('members');
    }
}
