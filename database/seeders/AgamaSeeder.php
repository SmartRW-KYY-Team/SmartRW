<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar agama di Indonesia
        $agamaList = [
            'Islam',
            'Kristen Protestan',
            'Katolik',
            'Hindu',
            'Buddha',
            'Konghucu',
        ];

        // Looping untuk memasukkan data agama ke dalam tabel agama
        foreach ($agamaList as $namaAgama) {
            Agama::create([
                'nama' => $namaAgama,
            ]);
        }

        $this->command->info('Seeder Agama berhasil dijalankan!');
    }
}
