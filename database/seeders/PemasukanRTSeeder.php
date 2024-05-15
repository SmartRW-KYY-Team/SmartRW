<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemasukanRTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pemasukanRT')->insert([
            [
                'tanggal' => '2024-05-01',
                'user_id' => 1,
                'jumlah' => 500000,
                'rt_id' => 1,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2024-05-02',
                'user_id' => 2,
                'jumlah' => 750000,
                'rt_id' => 2,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2024-05-03',
                'user_id' => 3,
                'jumlah' => 600000,
                'rt_id' => 3,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
