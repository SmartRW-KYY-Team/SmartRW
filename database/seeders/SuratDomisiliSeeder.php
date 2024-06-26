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
                'pemohon_id' => 1,
                'status' => 'Proses',
                'keterangan' => 'Permohonan surat domisili untuk keperluan administrasi',
                'rt_id' => 1,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon_id' => 2,
                'status' => 'Selesai',
                'keterangan' => 'Pengajuan surat domisili untuk melengkapi persyaratan kerja',
                'rt_id' => 2,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon_id' => 3,
                'status' => 'Ditolak',
                'keterangan' => 'Permohonan surat domisili tidak dapat diproses karena dokumen tidak lengkap',
                'rt_id' => 3,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon_id' => 4,
                'status' => 'Proses',
                'keterangan' => 'Pengajuan surat domisili untuk keperluan perpanjangan SIM',
                'rt_id' => 2,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon_id' => 5,
                'status' => 'Selesai',
                'keterangan' => 'Permohonan surat domisili untuk keperluan pendaftaran sekolah',
                'rt_id' => 1,
                'rw_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
