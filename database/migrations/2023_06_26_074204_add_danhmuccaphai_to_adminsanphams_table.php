<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDanhmuccaphaiToAdminsanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adminsanphams', function (Blueprint $table) {
            //
            $table->string('danhmuccapmot');
            $table->string('sencapmot');
            $table->string('danhmuccaphai');
            $table->string('sencaphai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adminsanphams', function (Blueprint $table) {
            //
        });
    }
}
