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
            $table->string('fileName', 255);
            $table->string('path', 255);
            $table->string('newName', 255);
            $table->integer('status');
            $table->integer('size');
            $table->string('type', 20);
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
