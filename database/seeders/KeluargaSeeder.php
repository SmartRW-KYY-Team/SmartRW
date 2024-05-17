<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $keluargaData = [
            [
                'nokk' => 123456,
                'kepala_keluarga_id' => 1, // ID user sebagai kepala keluarga
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => 789012,
                'kepala_keluarga_id' => 2, // ID user sebagai kepala keluarga
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => 345678,
                'kepala_keluarga_id' => 3, // ID user sebagai kepala keluarga
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => 901234,
                'kepala_keluarga_id' => 4, // ID user sebagai kepala keluarga
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => 567890,
                'kepala_keluarga_id' => 5, // ID user sebagai kepala keluarga
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke dalam tabel keluarga
        DB::table('keluarga')->insert($keluargaData);
    }
}
