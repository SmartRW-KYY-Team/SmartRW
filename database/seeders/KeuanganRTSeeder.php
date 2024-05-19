<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeuanganRTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('keuanganRT')->insert([
            [
                'tipe' => 'Keluar',
                'tanggal' => '2024-05-01',
                'keterangan' => 'Kematian',
                'jumlah' => 250000,
                'rt_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'Masuk',
                'tanggal' => '2024-05-02',
                'keterangan' => 'Sumbangan',
                'jumlah' => 350000,
                'rt_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'Masuk',
                'tanggal' => '2024-05-03',
                'keterangan' => 'Iuran',
                'jumlah' => 15000,
                'rt_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
