<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pengaduan')->insert([
            [
                'pengadu_id' => 1,
                'deskripsi' => 'Pengaduan mengenai kebersihan lingkungan.',
                'rt_id' => 1,
                'rw_id' => 1,
                'tanggal_kejadian' => '2024-05-05',
                'lampiran' => 'lampiran1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pengadu_id' => 2,
                'deskripsi' => 'Pengaduan mengenai keamanan lingkungan.',
                'rt_id' => 2,
                'rw_id' => 1,
                'tanggal_kejadian' => '2024-05-06',
                'lampiran' => 'lampiran2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pengadu_id' => 3,
                'deskripsi' => 'Pengaduan tentang kerusakan infrastruktur jalan.',
                'rt_id' => 3,
                'rw_id' => 1,
                'tanggal_kejadian' => '2024-05-07',
                'lampiran' => 'lampiran3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pengadu_id' => 4,
                'deskripsi' => 'Pengaduan mengenai kebisingan di malam hari.',
                'rt_id' => 1,
                'rw_id' => 1,
                'tanggal_kejadian' => '2024-05-08',
                'lampiran' => 'lampiran4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pengadu_id' => 5,
                'deskripsi' => 'Pengaduan tentang pemeliharaan taman kota.',
                'rt_id' => 2,
                'rw_id' => 1,
                'tanggal_kejadian' => '2024-05-09',
                'lampiran' => 'lampiran5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
