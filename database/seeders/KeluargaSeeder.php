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
            // Per 1-10 Keluarga
            [
                'nokk' => '3573123456789012',
                'kepala_keluarga_id' => 1, // 1-4
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573987654321098',
                'kepala_keluarga_id' => 5, // 5-8
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573123409876543',
                'kepala_keluarga_id' => 9, // 9-12
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573745632109876',
                'kepala_keluarga_id' => 13, // 13-16
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573876543210987',
                'kepala_keluarga_id' => 17, // 17-20
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573456789123456',
                'kepala_keluarga_id' => 21, // 21-24
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573987123456789',
                'kepala_keluarga_id' => 25, // 25-28
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573654321987654',
                'kepala_keluarga_id' => 29, // 29-32
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573876598765432',
                'kepala_keluarga_id' => 33, // 33-36
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573123498765432',
                'kepala_keluarga_id' => 37, // 37-40
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Per 11-20 Keluarga
            [
                'nokk' => '3573745698765432',
                'kepala_keluarga_id' => 41, // 41-44
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573876523456789',
                'kepala_keluarga_id' => 45, // 45-48
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573123450987654',
                'kepala_keluarga_id' => 49, // 49-52
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573745623456789',
                'kepala_keluarga_id' => 53, // 53-56
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573876540987654',
                'kepala_keluarga_id' => 57, // 57-60
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507123456789012',
                'kepala_keluarga_id' => 63, // 63-66
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507987654321098',
                'kepala_keluarga_id' => 67, // 67-70
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507123409876543',
                'kepala_keluarga_id' => 71, // 71-74
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507745632109876',
                'kepala_keluarga_id' => 75, // 75-78
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507876543210987',
                'kepala_keluarga_id' => 79, // 79-82
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Per 21-30 Keluarga
            [
                'nokk' => '3507456789123456',
                'kepala_keluarga_id' => 83, // 83-86
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507987123456789',
                'kepala_keluarga_id' => 87, // 87-90
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507654321987654',
                'kepala_keluarga_id' => 91, // 91-94
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507876598765432',
                'kepala_keluarga_id' => 95, // 95-98
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507123498765432',
                'kepala_keluarga_id' => 99, // 99-102
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507745698765432',
                'kepala_keluarga_id' => 103, // 103-106
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507876523456789',
                'kepala_keluarga_id' => 107, // 107-110
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507123450987654',
                'kepala_keluarga_id' => 111, // 111-114
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507745623456789',
                'kepala_keluarga_id' => 115, // 115-118
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3507876540987654',
                'kepala_keluarga_id' => 119, // 119-122
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        // Insert data ke dalam tabel keluarga
        DB::table('keluarga')->insert($keluargaData);
    }
}
