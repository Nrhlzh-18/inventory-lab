<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan', function (Blueprint $table) {
            $table->id();
            $table->string('kodeBarang');            
            $table->string('namaReagent');
            $table->string('spesifikasi');
            $table->integer('stokAwal');
            $table->integer('stokBahan');
            $table->string('satuan');
            $table->integer('stokMinimum');
            $table->double('hargaSatuan');
            $table->string('penyedia');
            $table->string('tempatPenyimpanan');
            $table->string('keterangan');
            $table->string('foto');
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
        Schema::dropIfExists('bahan');
    }
};
