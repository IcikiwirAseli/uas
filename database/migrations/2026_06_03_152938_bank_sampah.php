<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('TransaksiBank', function (Blueprint $table) {
            $table->id("IDTransaksiSampah");
            $table->string('NIK');
            $table->string('IDBankSampah');
            $table->string('IDSampah')->foreign('IDSampah')->references('IDSampah')->on('Sampah');
            $table->integer('QTY');
            $table->date('tanggal');
            }
            );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
