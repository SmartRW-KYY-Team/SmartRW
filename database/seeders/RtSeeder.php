<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rtData = [
            [
                'nama' => 'RT 001',
                'ketua_id' => 1,  // ID Ketua RT (sesuaikan dengan data user)
                'sekretaris_id' => 3,  // ID Sekretaris RT (sesuaikan dengan data user)
                'bendahara_id' => 2,  // ID Bendahara RT (sesuaikan dengan data user)
                'saldo' => 1000000,  // Saldo awal RT
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'RT 002',
                'ketua_id' => 5,  // ID Ketua RT (sesuaikan dengan data user)
                'sekretaris_id' => 6,  // ID Sekretaris RT (sesuaikan dengan data user)
                'bendahara_id' => 7,  // ID Bendahara RT (sesuaikan dengan data user)
                'saldo' => 1000000,  // Saldo awal RT
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'RT 003',
                'ketua_id' => 9,  // ID Ketua RT (sesuaikan dengan data user)
                'sekretaris_id' => 11,  // ID Sekretaris RT (sesuaikan dengan data user)
                'bendahara_id' => 10,  // ID Bendahara RT (sesuaikan dengan data user)
                'saldo' => 1000000,  // Saldo awal RT
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert data ke dalam tabel rt
        DB::table('rt')->insert($rtData);

        $this->command->info('Seeder Rt berhasil dijalankan!');
    }
}
