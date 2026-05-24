<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * RUN MIGRATION
     */
    public function up(): void
    {

        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */

        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('nama');

            $table->string('username')->unique();

            $table->string('password');

            $table->enum('role', [
                'admin',
                'petugas',
                'peminjam'
            ])->default('peminjam');

            $table->string('foto')->nullable();

            $table->timestamps();
        });



        /*
        |--------------------------------------------------------------------------
        | KATEGORIS
        |--------------------------------------------------------------------------
        */

        Schema::create('kategoris', function (Blueprint $table) {

            $table->id();

            $table->string('nama_kategori');

            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });



        /*
        |--------------------------------------------------------------------------
        | KONDISIS
        |--------------------------------------------------------------------------
        */

        Schema::create('kondisis', function (Blueprint $table) {

            $table->id();

            $table->string('nama_kondisi');

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });



        /*
        |--------------------------------------------------------------------------
        | ALATS
        |--------------------------------------------------------------------------
        */

        Schema::create('alats', function (Blueprint $table) {

            $table->id();

            $table->foreignId('kategori_id')
                  ->constrained('kategoris')
                  ->onDelete('cascade');

            $table->foreignId('kondisi_id')
                  ->constrained('kondisis')
                  ->onDelete('cascade');

            $table->string('kode_alat')->unique();

            $table->string('nama_alat');

            $table->integer('stok')->default(0);

            $table->integer('stok_tersedia')->default(0);

            $table->integer('stok_dipinjam')->default(0);

            $table->string('lokasi')->nullable();

            $table->text('deskripsi')->nullable();

            $table->string('foto')->nullable();

            $table->enum('status', [
                'tersedia',
                'habis',
                'dipinjam',
                'rusak'
            ])->default('tersedia');

            $table->timestamps();
        });



        /*
        |--------------------------------------------------------------------------
        | PEMINJAMANS
        |--------------------------------------------------------------------------
        */

        Schema::create('peminjamans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('alat_id')
                  ->constrained('alats')
                  ->onDelete('cascade');

            $table->foreignId('approval_by')
                  ->nullable()
                  ->references('id')
                  ->on('users')
                  ->nullOnDelete();

            $table->string('kode_peminjaman')->unique();

            $table->date('tanggal_pinjam');

            $table->date('tanggal_kembali');

            $table->integer('jumlah');

            $table->text('catatan')->nullable();

            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
                'dipinjam',
                'selesai'
            ])->default('pending');

            $table->timestamps();
        });



        /*
        |--------------------------------------------------------------------------
        | PENGEMBALIANS
        |--------------------------------------------------------------------------
        */

        Schema::create('pengembalians', function (Blueprint $table) {

            $table->id();

            $table->foreignId('peminjaman_id')
                  ->constrained('peminjamans')
                  ->onDelete('cascade');

            $table->date('tanggal_pengembalian');

            $table->integer('jumlah_kembali');

            $table->integer('keterlambatan')
                  ->default(0);

            $table->decimal('denda', 12, 2)
                  ->default(0);

            $table->enum('kondisi_kembali', [
                'baik',
                'rusak',
                'hilang'
            ])->default('baik');

            $table->text('catatan')->nullable();

            $table->timestamps();
        });



        /*
        |--------------------------------------------------------------------------
        | DENDAS
        |--------------------------------------------------------------------------
        */

        Schema::create('dendas', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pengembalian_id')
                  ->constrained('pengembalians')
                  ->onDelete('cascade');

            $table->decimal('total_denda', 12, 2);

            $table->enum('status_bayar', [
                'belum_bayar',
                'sudah_bayar'
            ])->default('belum_bayar');

            $table->timestamps();
        });



        /*
        |--------------------------------------------------------------------------
        | LOG ACTIVITIES
        |--------------------------------------------------------------------------
        */

        Schema::create('log_activities', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->string('aktivitas');

            $table->timestamps();
        });



        /*
        |--------------------------------------------------------------------------
        | SESSIONS
        |--------------------------------------------------------------------------
        */

        Schema::create('sessions', function (Blueprint $table) {

            $table->string('id')->primary();

            $table->foreignId('user_id')
                  ->nullable()
                  ->index();

            $table->string('ip_address', 45)
                  ->nullable();

            $table->text('user_agent')
                  ->nullable();

            $table->longText('payload');

            $table->integer('last_activity')
                  ->index();
        });
    }

    /**
     * REVERSE MIGRATION
     */
    public function down(): void
    {

        Schema::dropIfExists('sessions');

        Schema::dropIfExists('log_activities');

        Schema::dropIfExists('dendas');

        Schema::dropIfExists('pengembalians');

        Schema::dropIfExists('peminjamans');

        Schema::dropIfExists('alats');

        Schema::dropIfExists('kondisis');

        Schema::dropIfExists('kategoris');

        Schema::dropIfExists('users');
    }
};