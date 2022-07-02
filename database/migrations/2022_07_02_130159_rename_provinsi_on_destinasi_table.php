<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameProvinsiOnDestinasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('destinasi', function (Blueprint $table) {
            $table->renameColumn('kab_id','provinsi_id');
            $table->renameColumn('kec_id','kab_id');
            $table->renameColumn('desa_id','kec_id');
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
