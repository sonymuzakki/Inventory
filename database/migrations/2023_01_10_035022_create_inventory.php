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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('jenis_id');
            $table->integer('divisi_id');
            $table->integer('lokasi_id');
            $table->string('hostname')->nullable();
            $table->string('merk')->nullable();
            $table->string('Processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('grafik')->nullable();
            $table->string('hardisk')->nullable();
            $table->string('ssd')->nullable();
            $table->string('os')->nullable();
            $table->string('Office')->nullable();
            $table->string('akunOffice')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('inventory');
    }
};