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
            $table->string('fileName', 255)->comment("ชื่อไฟล์");
            $table->string('path', 255)->comment("ที่อยู่ของไฟล์");
            $table->string('newName', 255)->comment("ชื่อใหม่");
            $table->integer('status')->comment("สถานะ");
            $table->integer('size')->comment("ขนาด");
            $table->string('type', 20)->comment("ชนิดของไฟล์");
            $table->timestamps();
            $table->softDeletes();
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
