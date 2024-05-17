<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('administrator')->insert([
            [
                'role_id' => 1, // ID untuk role_id RW
                'username' => 'KetuaRW1',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 2, // ID untuk role_id RW
                'username' => 'SekretarisRW1',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 3, // ID untuk role_id RW
                'username' => 'BendaharaRW1',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 4, // ID untuk role_id RT
                'username' => 'KetuaRT1',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 5, // ID untuk role_id RT
                'username' => 'SekretarisRT1',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 6, // ID untuk role_id RT
                'username' => 'BendaharaRT1',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
