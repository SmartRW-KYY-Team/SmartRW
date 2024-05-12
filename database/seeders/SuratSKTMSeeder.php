<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratSKTMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('suratSKTM')->insert([
            [
                'pemohon' => 1,
                'nama_orang_tua' => 'Budi',
                'pekerjaan_orang_tua' => 'Pegawai Swasta',
                'gaji_orang_tua' => 5000000,
                'status' => 'Selesai',
                'keterangan' => 'Permohonan surat SKTM untuk keperluan pendaftaran sekolah',
                'rt' => 2,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon' => 2,
                'nama_orang_tua' => 'Ani',
                'pekerjaan_orang_tua' => 'Wiraswasta',
                'gaji_orang_tua' => 7000000,
                'status' => 'Selesai',
                'keterangan' => 'Permohonan surat SKTM untuk keperluan bantuan kesehatan',
                'rt' => 1,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon' => 3,
                'nama_orang_tua' => 'Cahyo',
                'pekerjaan_orang_tua' => 'Petani',
                'gaji_orang_tua' => 3000000,
                'status' => 'Proses',
                'keterangan' => 'Pengajuan surat SKTM untuk keperluan pengurusan KTP',
                'rt' => 1,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon' => 4,
                'nama_orang_tua' => 'Dewi',
                'pekerjaan_orang_tua' => 'Ibu Rumah Tangga',
                'gaji_orang_tua' => 0,
                'status' => 'Selesai',
                'keterangan' => 'Permohonan surat SKTM untuk keperluan beasiswa',
                'rt' => 2,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pemohon' => 5,
                'nama_orang_tua' => 'Eko',
                'pekerjaan_orang_tua' => 'Pegawai Negeri',
                'gaji_orang_tua' => 10000000,
                'status' => 'Proses',
                'keterangan' => 'Pengajuan surat SKTM untuk keperluan bantuan sembako',
                'rt' => 3,
                'rw' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
