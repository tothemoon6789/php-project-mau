<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminsanphams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tieude');
            $table->string('sen');
            $table->binary('mota');
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
        Schema::dropIfExists('adminsanphams');
    }
}
