<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaBansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kriteria_bansos')->insert([
            [
                'nama_kriteria' => 'Pendapatan',
                'pendapatan' => 1,
                'kendaraan' => 4,
                'jenis_lantai' => 5,
                'kondisi_dinding' => 5,
                'kondisi_atap' => 5,
                'tanggungan' => 3,
                'listrik' => 5,
                'luas_tanah' => 4,
                'luas_bangunan' => 3,
                'bobot' => null
            ],
            [
                'nama_kriteria' => 'Kendaraan',
                'pendapatan' => 1 / 4,
                'kendaraan' => 1,
                'jenis_lantai' => 2,
                'kondisi_dinding' => 2,
                'kondisi_atap' => 2,
                'tanggungan' => 1 / 5,
                'listrik' => 2,
                'luas_tanah' => 1,
                'luas_bangunan' => 1 / 3,
                'bobot' => null

            ], [
                'nama_kriteria' => 'Jenis Lantai',
                'pendapatan' => 1 / 5,
                'kendaraan' => 1 / 2,
                'jenis_lantai' => 1,
                'kondisi_dinding' => 1,
                'kondisi_atap' => 1,
                'tanggungan' => 1 / 4,
                'listrik' => 1,
                'luas_tanah' => 1 / 3,
                'luas_bangunan' => 1 / 5,
                'bobot' => null
            ], [
                'nama_kriteria' => 'Kondisi Dinding',
                'pendapatan' => 1 / 5,
                'kendaraan' => 1 / 2,
                'jenis_lantai' => 1,
                'kondisi_dinding' => 1,
                'kondisi_atap' => 1,
                'tanggungan' => 1 / 4,
                'listrik' => 1,
                'luas_tanah' => 1 / 3,
                'luas_bangunan' => 1 / 5,
                'bobot' => null
            ], [
                'nama_kriteria' => 'Kondisi Atap',
                'pendapatan' => 1 / 5,
                'kendaraan' => 1 / 2,
                'jenis_lantai' => 1,
                'kondisi_dinding' => 1,
                'kondisi_atap' => 1,
                'tanggungan' => 1 / 4,
                'listrik' => 1,
                'luas_tanah' => 1 / 3,
                'luas_bangunan' => 1 / 5,
                'bobot' => null
            ], [
                'nama_kriteria' => 'Tanggungan',
                'pendapatan' => 1 / 3,
                'kendaraan' => 5,
                'jenis_lantai' => 4,
                'kondisi_dinding' => 4,
                'kondisi_atap' => 4,
                'tanggungan' => 1,
                'listrik' => 4,
                'luas_tanah' => 3,
                'luas_bangunan' => 1,
                'bobot' => null
            ], [
                'nama_kriteria' => 'Listrik',
                'pendapatan' => 1 / 5,
                'kendaraan' => 1 / 2,
                'jenis_lantai' => 1,
                'kondisi_dinding' => 1,
                'kondisi_atap' => 1,
                'tanggungan' => 1 / 4,
                'listrik' => 1,
                'luas_tanah' => 1 / 3,
                'luas_bangunan' => 1 / 5,
                'bobot' => null
            ], [
                'nama_kriteria' => 'Luas Tanah',
                'pendapatan' => 1 / 4,
                'kendaraan' => 1,
                'jenis_lantai' => 3,
                'kondisi_dinding' => 3,
                'kondisi_atap' => 3,
                'tanggungan' => 1 / 3,
                'listrik' => 3,
                'luas_tanah' => 1,
                'luas_bangunan' => 1 / 3,
                'bobot' => null
            ], [
                'nama_kriteria' => 'Luas Bangunan',
                'pendapatan' => 1 / 3,
                'kendaraan' => 3,
                'jenis_lantai' => 5,
                'kondisi_dinding' => 5,
                'kondisi_atap' => 5,
                'tanggungan' => 1,
                'listrik' => 5,
                'luas_tanah' => 3,
                'luas_bangunan' => 1,
                'bobot' => null
            ],
        ]);
    }
}
