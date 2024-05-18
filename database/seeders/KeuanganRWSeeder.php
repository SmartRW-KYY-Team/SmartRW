<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeuanganRWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('keuanganRW')->insert([
            [
                'tipe' => 'Keluar',
                'tanggal' => '2024-05-01',
                'keterangan' => 'Kematian',
                'jumlah' => 250000,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'Masuk',
                'tanggal' => '2024-05-02',
                'keterangan' => 'Sumbangan',
                'jumlah' => 350000,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'Masuk',
                'tanggal' => '2024-05-03',
                'keterangan' => 'Iuran',
                'jumlah' => 15000,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
