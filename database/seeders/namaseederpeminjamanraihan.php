<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class namaseederpeminjamanraihan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */

        DB::table('users')->insert([

            [
                'nama'       => 'Administrator',
                'username'   => 'admin',
                'password'   => Hash::make('admin123'),
                'role'       => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama'       => 'Petugas Sekolah',
                'username'   => 'petugas',
                'password'   => Hash::make('petugas123'),
                'role'       => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama'       => 'Muhammad Raihan',
                'username'   => 'peminjam',
                'password'   => Hash::make('peminjam123'),
                'role'       => 'peminjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);



        /*
        |--------------------------------------------------------------------------
        | KATEGORIS
        |--------------------------------------------------------------------------
        */

        DB::table('kategoris')->insert([

            [
                'nama_kategori' => 'Elektronik',
                'deskripsi'     => 'Kategori alat elektronik',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            [
                'nama_kategori' => 'Olahraga',
                'deskripsi'     => 'Kategori alat olahraga',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            [
                'nama_kategori' => 'Laboratorium',
                'deskripsi'     => 'Kategori alat laboratorium',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            [
                'nama_kategori' => 'Multimedia',
                'deskripsi'     => 'Kategori alat multimedia',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

        ]);



        /*
        |--------------------------------------------------------------------------
        | KONDISIS
        |--------------------------------------------------------------------------
        */

        DB::table('kondisis')->insert([

            [
                'nama_kondisi' => 'Baik',
                'keterangan'   => 'Barang dalam kondisi baik',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],

            [
                'nama_kondisi' => 'Rusak Ringan',
                'keterangan'   => 'Barang mengalami kerusakan ringan',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],

            [
                'nama_kondisi' => 'Rusak Berat',
                'keterangan'   => 'Barang mengalami kerusakan berat',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],

        ]);



        /*
        |--------------------------------------------------------------------------
        | ALATS
        |--------------------------------------------------------------------------
        */

        DB::table('alats')->insert([

            [
                'kategori_id'    => 1,
                'kondisi_id'     => 1,
                'kode_alat'      => 'ALT001',
                'nama_alat'      => 'Laptop Asus',
                'stok'           => 10,
                'stok_tersedia'  => 10,
                'stok_dipinjam'  => 0,
                'lokasi'         => 'Gudang A',
                'deskripsi'      => 'Laptop untuk kebutuhan pembelajaran',
                'foto'           => null,
                'status'         => 'tersedia',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'kategori_id'    => 1,
                'kondisi_id'     => 1,
                'kode_alat'      => 'ALT002',
                'nama_alat'      => 'Proyektor Epson',
                'stok'           => 5,
                'stok_tersedia'  => 5,
                'stok_dipinjam'  => 0,
                'lokasi'         => 'Gudang B',
                'deskripsi'      => 'Proyektor ruang meeting',
                'foto'           => null,
                'status'         => 'tersedia',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'kategori_id'    => 2,
                'kondisi_id'     => 1,
                'kode_alat'      => 'ALT003',
                'nama_alat'      => 'Bola Futsal',
                'stok'           => 15,
                'stok_tersedia'  => 15,
                'stok_dipinjam'  => 0,
                'lokasi'         => 'Gudang Olahraga',
                'deskripsi'      => 'Bola futsal sekolah',
                'foto'           => null,
                'status'         => 'tersedia',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'kategori_id'    => 3,
                'kondisi_id'     => 1,
                'kode_alat'      => 'ALT004',
                'nama_alat'      => 'Mikroskop',
                'stok'           => 7,
                'stok_tersedia'  => 7,
                'stok_dipinjam'  => 0,
                'lokasi'         => 'Lab IPA',
                'deskripsi'      => 'Mikroskop laboratorium',
                'foto'           => null,
                'status'         => 'tersedia',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

            [
                'kategori_id'    => 4,
                'kondisi_id'     => 1,
                'kode_alat'      => 'ALT005',
                'nama_alat'      => 'Kamera Canon',
                'stok'           => 3,
                'stok_tersedia'  => 3,
                'stok_dipinjam'  => 0,
                'lokasi'         => 'Ruang Multimedia',
                'deskripsi'      => 'Kamera dokumentasi sekolah',
                'foto'           => null,
                'status'         => 'tersedia',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

        ]);



        /*
        |--------------------------------------------------------------------------
        | PEMINJAMANS
        |--------------------------------------------------------------------------
        */

        DB::table('peminjamans')->insert([

            [
                'user_id'            => 3,
                'alat_id'            => 1,
                'kode_peminjaman'    => 'PJM001',
                'tanggal_pinjam'     => now()->subDays(5),
                'tanggal_kembali'    => now()->addDays(2),
                'jumlah'             => 1,
                'catatan'            => 'Digunakan untuk presentasi',
                'status'             => 'approved',
                'status_keterlambatan' => 'normal',
                'total_teguran'      => 0,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],

            [
                'user_id'            => 3,
                'alat_id'            => 3,
                'kode_peminjaman'    => 'PJM002',
                'tanggal_pinjam'     => now()->subDays(10),
                'tanggal_kembali'    => now()->subDays(2),
                'jumlah'             => 2,
                'catatan'            => 'Digunakan untuk olahraga',
                'status'             => 'approved',
                'status_keterlambatan' => 'terlambat',
                'total_teguran'      => 1,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],

        ]);



        /*
        |--------------------------------------------------------------------------
        | PENGEMBALIANS
        |--------------------------------------------------------------------------
        */

        DB::table('pengembalians')->insert([

            [
                'peminjaman_id'        => 1,
                'tanggal_pengembalian' => now(),
                'keterlambatan'        => 0,
                'denda'                => 0,
                'kondisi_kembali'      => 'baik',
                'created_at'           => now(),
                'updated_at'           => now(),
            ],

        ]);



        /*
        |--------------------------------------------------------------------------
        | DENDAS
        |--------------------------------------------------------------------------
        */

        DB::table('dendas')->insert([

            [
                'peminjaman_id' => 2,
                'jumlah_denda'  => 50000,
                'status_bayar'  => 'belum_bayar',
                'keterangan'    => 'Terlambat pengembalian alat',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

        ]);



        /*
        |--------------------------------------------------------------------------
        | SURAT TEGURAN
        |--------------------------------------------------------------------------
        */

        DB::table('surat_teguran')->insert([

            [
                'peminjaman_id'  => 2,
                'user_id'        => 3,
                'level_teguran'  => 'teguran_1',
                'isi_teguran'    => 'Anda terlambat mengembalikan alat. Segera lakukan pengembalian.',
                'tanggal_teguran'=> now(),
                'status_baca'    => 'belum_dibaca',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],

        ]);



        /*
        |--------------------------------------------------------------------------
        | LOG ACTIVITIES
        |--------------------------------------------------------------------------
        */

        DB::table('log_activities')->insert([

            [
                'user_id'    => 1,
                'aktivitas'  => 'Administrator login ke sistem',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id'    => 2,
                'aktivitas'  => 'Petugas menyetujui peminjaman alat',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id'    => 3,
                'aktivitas'  => 'Peminjam melakukan pengajuan peminjaman',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

    }
}