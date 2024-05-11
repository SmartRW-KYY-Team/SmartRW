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
                'kepala_keluarga' => 1, // ID user sebagai kepala keluarga
                'rt' => 1, // ID rt
                'rw' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => 789012,
                'kepala_keluarga' => 2, // ID user sebagai kepala keluarga
                'rt' => 2, // ID rt
                'rw' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => 345678,
                'kepala_keluarga' => 3, // ID user sebagai kepala keluarga
                'rt' => 3, // ID rt
                'rw' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => 901234,
                'kepala_keluarga' => 4, // ID user sebagai kepala keluarga
                'rt' => 3, // ID rt
                'rw' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => 567890,
                'kepala_keluarga' => 5, // ID user sebagai kepala keluarga
                'rt' => 3, // ID rt
                'rw' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke dalam tabel keluarga
        DB::table('keluarga')->insert($keluargaData);
    }
}
