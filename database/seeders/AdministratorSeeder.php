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
                'role' => "rw",
                'no_role' => 1,
                'username' => 'RW',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => "rt",
                'no_role' => 1,
                'username' => 'RT1',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => "rt",
                'no_role' => 2,
                'username' => 'RT2',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => "rt",
                'no_role' => 3,
                'username' => 'RT3',
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
