<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminDanhmucCaphaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_danhmuc_caphais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('danhmuccapmot');
            $table->string('sencapmot');
            $table->string('danhmuccaphai');
            $table->string('sencaphai');
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
        Schema::dropIfExists('admin_danhmuc_caphais');
    }
}
