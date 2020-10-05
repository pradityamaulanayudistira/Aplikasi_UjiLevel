<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelMakanans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_makanans', function (Blueprint $table) {
            $table->id();
            $table->string("nama_makanan");
            $table->integer("harga_makanan");
            $table->integer("qty_makanan");
            $table->string("gambar_makanan");
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
        Schema::dropIfExists('tabel_makanans');
    }
}
