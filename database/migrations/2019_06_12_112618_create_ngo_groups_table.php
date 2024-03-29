<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNgoGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngo_groups', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('groupName', 255)->comment("ชื่อกลุ่มขึ้นต้นด้วยกลุ่ม")->nullable();
            $table->string('groupName1', 255)->comment("ชื่อกลุ่มขึ้นต้นด้วยผู้แทน")->nullable();
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
        Schema::dropIfExists('ngo_groups');
    }
}
