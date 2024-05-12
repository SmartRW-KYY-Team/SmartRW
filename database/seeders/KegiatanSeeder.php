<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kegiatan')->insert([
            [
                'nama' => 'Gotong Royong',
                'tanggal_kegiatan' => '2024-05-05',
                'deskripsi' => 'Gotong royong membersihkan lingkungan RT 01 RW 01',
                'rt' => 2,
                'rw' => 1,
                'lampiran' => 'lampiran1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rapat RW',
                'tanggal_kegiatan' => '2024-05-06',
                'deskripsi' => 'Rapat bulanan RW 02',
                'rt' => 1,
                'rw' => 1,
                'lampiran' => 'lampiran2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pengajian Rutin',
                'tanggal_kegiatan' => '2024-05-07',
                'deskripsi' => 'Pengajian mingguan di RT 03 RW 03',
                'rt' => 3,
                'rw' => 1,
                'lampiran' => 'lampiran3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bazar Amal',
                'tanggal_kegiatan' => '2024-05-08',
                'deskripsi' => 'Bazar amal untuk pengumpulan dana sosial',
                'rt' => 1,
                'rw' => 1,
                'lampiran' => 'lampiran4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pelatihan Komputer',
                'tanggal_kegiatan' => '2024-05-09',
                'deskripsi' => 'Pelatihan penggunaan komputer untuk warga RT 05 RW 05',
                'rt' => 1,
                'rw' => 1,
                'lampiran' => 'lampiran5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
