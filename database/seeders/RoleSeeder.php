<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Daftar agama di Indonesia
        $roleList = [
            'KetuaRW',
            'SekretarisRW',
            'BendaharaRW',
            'KetuaRT',
            'SekretarisRT',
            'BendaharaRT',
        ];

        // Looping untuk memasukkan data agama ke dalam tabel agama
        foreach ($roleList as $role) {
            Role::create([
                'nama' => $role,
            ]);
        }
    }
}
