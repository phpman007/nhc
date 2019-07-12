<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attach_files', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('member_id')->comment("รหัสสมาชิก")->nullable();
            $table->integer('upload_group')->comment("กลุ่มที่อัพโหลด")->nullable();
            $table->string('fileName', 255)->comment("ชื่อไฟล์")->nullable();
            $table->string('path', 255)->comment("ที่อยู่ของไฟล์")->nullable();
            $table->string('newName', 255)->comment("ชื่อใหม่")->nullable();
            $table->integer('status')->comment("สถานะ")->nullable();
            $table->integer('size')->comment("ขนาด")->nullable();
            $table->string('type', 20)->comment("ชนิดของไฟล์")->nullable();
            $table->string('type', 255)->comment("ใช้สำหรับ")->nullable();
            $table->timestamps()->nullable();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attach_files');
    }
}
