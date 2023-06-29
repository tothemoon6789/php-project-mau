<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmintintucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admintintucs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tieude');
            $table->string('sen');
            $table->binary('noidung');
            $table->string('hinhanh');
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
        Schema::dropIfExists('admintintucs');
    }
}
