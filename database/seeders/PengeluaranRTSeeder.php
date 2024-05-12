<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengeluaranRTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pengeluaranRT')->insert([
            [
                'tanggal' => '2024-05-01',
                'keterangan' => 'Pembelian alat kebersihan',
                'jumlah' => 250000,
                'rt' => 1,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2024-05-02',
                'keterangan' => 'Pembayaran listrik bulan ini',
                'jumlah' => 350000,
                'rt' => 2,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2024-05-03',
                'keterangan' => 'Pembelian sembako untuk kegiatan bakti sosial',
                'jumlah' => 500000,
                'rt' => 3,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
