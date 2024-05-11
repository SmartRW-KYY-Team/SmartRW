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
                'ketua' => 1,  // ID Ketua RT (sesuaikan dengan data user)
                'sekretaris' => 2,  // ID Sekretaris RT (sesuaikan dengan data user)
                'bendahara' => 3,  // ID Bendahara RT (sesuaikan dengan data user)
                'saldo' => 1000000,  // Saldo awal RT
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'RT 002',
                'ketua' => 4,  // ID Ketua RT (sesuaikan dengan data user)
                'sekretaris' => 5,  // ID Sekretaris RT (sesuaikan dengan data user)
                'bendahara' => 6,  // ID Bendahara RT (sesuaikan dengan data user)
                'saldo' => 800000,  // Saldo awal RT
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'RT 003',
                'ketua' => 7,  // ID Ketua RT (sesuaikan dengan data user)
                'sekretaris' => 8,  // ID Sekretaris RT (sesuaikan dengan data user)
                'bendahara' => 9,  // ID Bendahara RT (sesuaikan dengan data user)
                'saldo' => 800000,  // Saldo awal RT
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert data ke dalam tabel rt
        DB::table('rt')->insert($rtData);

        $this->command->info('Seeder Rt berhasil dijalankan!');
    }
}
