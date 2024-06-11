<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rwData = [
            [
                'nama' => 'RW 004',
                'ketua_id' => 10,  // ID Ketua RT (sesuaikan dengan data user)
                'sekretaris_id' => 11,  // ID Sekretaris RT (sesuaikan dengan data user)
                'bendahara_id' => 12,  // ID Bendahara RT (sesuaikan dengan data user)
                'saldo' => 1000000,  // Saldo awal RT
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

        // Insert data ke dalam tabel rt
        DB::table('rw')->insert($rwData);

        $this->command->info('Seeder Rw berhasil dijalankan!');
    }
}
