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
        Schema::create('pengajuan_layanan', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->integer('layananId');
            $table->string('keterangan',10000);
            $table->boolean('confirmed');
            $table->date('tanggalPengajuan');
            $table->date('tanggalVerifikasi');
            $table->integer('userVerifikasi');
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
        Schema::dropIfExists('pengajuan_layanan');
    }
};
