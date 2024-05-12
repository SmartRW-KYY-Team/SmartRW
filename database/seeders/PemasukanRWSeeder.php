<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemasukanRWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pemasukanRW')->insert([
            [
                'tanggal' => '2024-05-01',
                'jumlah' => 5000000,
                'rt' => 1,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2024-05-02',
                'jumlah' => 7500000,
                'rt' => 2,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2024-05-03',
                'jumlah' => 6000000,
                'rt' => 3,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
