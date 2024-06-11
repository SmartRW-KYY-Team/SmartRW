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
                'nokk' => '3573070105240001',
                'kepala_keluarga_id' => 1, // 1-4
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573070205240002',
                'kepala_keluarga_id' => 5, // 5-8
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573070305240003',
                'kepala_keluarga_id' => 9, // 9-12
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573070405240004',
                'kepala_keluarga_id' => 13, // 13-16
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573070505240005',
                'kepala_keluarga_id' => 17, // 17-20
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573070605240006',
                'kepala_keluarga_id' => 21, // 21-24
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573070705240007',
                'kepala_keluarga_id' => 25, // 25-28
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573070805240008',
                'kepala_keluarga_id' => 29, // 29-32
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573070905240009',
                'kepala_keluarga_id' => 33, // 33-36
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573071005240010',
                'kepala_keluarga_id' => 37, // 37-40
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Per 11-20 Keluarga
            [
                'nokk' => '3573071105240011',
                'kepala_keluarga_id' => 41, // 41-44
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573071205240012',
                'kepala_keluarga_id' => 45, // 45-48
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573071305240013',
                'kepala_keluarga_id' => 49, // 49-52
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573071405240014',
                'kepala_keluarga_id' => 53, // 53-56
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573071505240015',
                'kepala_keluarga_id' => 57, // 57-60
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573071605240016',
                'kepala_keluarga_id' => 61, // 61-64
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573071705240017',
                'kepala_keluarga_id' => 65, // 65-68
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573071805240018',
                'kepala_keluarga_id' => 69, // 69-72
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573071905240019',
                'kepala_keluarga_id' => 73, // 73-76
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573072005240020',
                'kepala_keluarga_id' => 77, // 77-80
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Per 21-30 Keluarga
            [
                'nokk' => '3573072105240021',
                'kepala_keluarga_id' => 81, // 81-84
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573072205240022',
                'kepala_keluarga_id' => 85, // 85-88
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573072305240023',
                'kepala_keluarga_id' => 89, // 89-92
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573072405240024',
                'kepala_keluarga_id' => 93, // 93-96
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573072505240025',
                'kepala_keluarga_id' => 97, // 97-100
                'rt_id' => 1, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573072605240026',
                'kepala_keluarga_id' => 101, // 101-104
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573072705240027',
                'kepala_keluarga_id' => 105, // 105-108
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573072805240028',
                'kepala_keluarga_id' => 109, // 109-112
                'rt_id' => 3, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573072905240029',
                'kepala_keluarga_id' => 113, // 113-116
                'rt_id' => 2, // ID rt
                'rw_id' => 1, // ID rw
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nokk' => '3573073005240030',
                'kepala_keluarga_id' => 117, // 117-120
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
