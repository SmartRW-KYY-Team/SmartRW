<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengeluaranRWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pengeluaranRW')->insert([
            [
                'tanggal' => '2024-05-01',
                'keterangan' => 'Pembelian material untuk perbaikan jalan',
                'jumlah' => 2000000,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2024-05-02',
                'keterangan' => 'Pembayaran honor security bulan ini',
                'jumlah' => 1500000,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2024-05-03',
                'keterangan' => 'Pembelian peralatan olahraga untuk warga',
                'jumlah' => 3000000,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
