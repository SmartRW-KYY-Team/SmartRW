<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratDomisiliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('suratDomisili')->insert([
            [
                'pemohon' => 1,
                'status' => 'Proses',
                'keterangan' => 'Permohonan surat domisili untuk keperluan administrasi',
                'rt' => 1,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon' => 2,
                'status' => 'Selesai',
                'keterangan' => 'Pengajuan surat domisili untuk melengkapi persyaratan kerja',
                'rt' => 2,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon' => 3,
                'status' => 'Ditolak',
                'keterangan' => 'Permohonan surat domisili tidak dapat diproses karena dokumen tidak lengkap',
                'rt' => 3,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon' => 4,
                'status' => 'Proses',
                'keterangan' => 'Pengajuan surat domisili untuk keperluan perpanjangan SIM',
                'rt' => 2,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon' => 5,
                'status' => 'Selesai',
                'keterangan' => 'Permohonan surat domisili untuk keperluan pendaftaran sekolah',
                'rt' => 1,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
