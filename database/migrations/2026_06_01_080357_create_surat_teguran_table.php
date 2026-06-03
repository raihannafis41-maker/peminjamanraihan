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
        Schema::create('surat_teguran', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | RELASI
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('peminjaman_id');
            $table->unsignedBigInteger('user_id');

            /*
            |--------------------------------------------------------------------------
            | DATA TEGURAN
            |--------------------------------------------------------------------------
            */

            $table->enum('level_teguran', [
                'Teguran 1',
                'Teguran 2',
                'Teguran 3'
            ])->default('Teguran 1');

            $table->text('isi_teguran');

            $table->date('tanggal_teguran');

            $table->boolean('status_baca')
                  ->default(false);

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | FOREIGN KEY
            |--------------------------------------------------------------------------
            */

            $table->foreign('peminjaman_id')
                  ->references('id')
                  ->on('peminjamans')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_teguran');
    }
};