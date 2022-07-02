<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProvinsiOnDestinasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('destinasi', function (Blueprint $table) {
            $table->bigInteger('provinsi_id')->change();
            $table->bigInteger('kab_id')->change();
            $table->bigInteger('kec_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('destinasi', function (Blueprint $table) {
            //
        });
    }
}
