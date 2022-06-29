<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_destinasi_id')->constrained('kategori_destinasi');
            $table->string('title');
            $table->string('slug');
            $table->binary('deskripsi');
            $table->string('photos')->nullable();
            $table->text('alamat');
            $table->tinyInteger('kab_id');
            $table->tinyInteger('kec_id');
            $table->tinyInteger('desa_id');
            $table->enum('status',['id','en']);
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
        Schema::dropIfExists('destinasi');
    }
}
