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
        Schema::create('pinjam_elektronic', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat');
            $table->string('peminjam');
            $table->string('jabatan');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->string('lama_pinjam');
            $table->string('keperluan');
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
        Schema::dropIfExists('pinjam_elektronic');
    }
};