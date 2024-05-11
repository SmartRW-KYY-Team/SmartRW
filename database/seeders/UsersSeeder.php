<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                'nik' => 123456789,
                'nama' => 'John Doe',
                'tgl_lahir' => '1990-05-15',
                'tempat_lahir' => 'Jakarta',
                'jenis_kelamin' => 'Laki',
                'agama' => 1, // ID Agama Islam
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Karyawan',
                'password' => Hash::make('password123'),
                'notelp' => '08123456789',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 987654321,
                'nama' => 'Jane Doe',
                'tgl_lahir' => '1992-08-20',
                'tempat_lahir' => 'Bandung',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 2, // ID Agama Kristen Protestan
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Mahasiswa',
                'password' => Hash::make('password123'),
                'notelp' => '08567891234',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 111222333,
                'nama' => 'Ahmad Abdullah',
                'tgl_lahir' => '1988-04-10',
                'tempat_lahir' => 'Surabaya',
                'jenis_kelamin' => 'Laki',
                'agama' => 1, // ID Agama Islam
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Guru',
                'password' => Hash::make('password123'),
                'notelp' => '08765432100',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 444555666,
                'nama' => 'Siti Rahayu',
                'tgl_lahir' => '1995-12-03',
                'tempat_lahir' => 'Yogyakarta',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 3, // ID Agama Katolik
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Wiraswasta',
                'password' => Hash::make('password123'),
                'notelp' => '08112233445',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 777888999,
                'nama' => 'Budi Santoso',
                'tgl_lahir' => '1985-10-25',
                'tempat_lahir' => 'Medan',
                'jenis_kelamin' => 'Laki',
                'agama' => 4, // ID Agama Hindu
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Dosen',
                'password' => Hash::make('password123'),
                'notelp' => '08987654321',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 333222111,
                'nama' => 'Rina Wati',
                'tgl_lahir' => '1998-06-15',
                'tempat_lahir' => 'Semarang',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 2, // ID Agama Kristen Protestan
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Pelajar',
                'password' => Hash::make('password123'),
                'notelp' => '08123456789',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 666777888,
                'nama' => 'Agus Setiawan',
                'tgl_lahir' => '1987-03-18',
                'tempat_lahir' => 'Surakarta',
                'jenis_kelamin' => 'Laki',
                'agama' => 5, // ID Agama Buddha
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Wiraswasta',
                'password' => Hash::make('password123'),
                'notelp' => '08765432100',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 222333444,
                'nama' => 'Linda Susanti',
                'tgl_lahir' => '1994-09-28',
                'tempat_lahir' => 'Malang',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 1, // ID Agama Islam
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Pegawai Negeri',
                'password' => Hash::make('password123'),
                'notelp' => '08211223344',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 555444333,
                'nama' => 'Dedi Firmansyah',
                'tgl_lahir' => '1993-02-12',
                'tempat_lahir' => 'Pontianak',
                'jenis_kelamin' => 'Laki',
                'agama' => 3, // ID Agama Katolik
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Pengusaha',
                'password' => Hash::make('password123'),
                'notelp' => '08987654321',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 999888777,
                'nama' => 'Rini Cahyani',
                'tgl_lahir' => '1997-11-05',
                'tempat_lahir' => 'Bandar Lampung',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 4, // ID Agama Hindu
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Penulis',
                'password' => Hash::make('password123'),
                'notelp' => '08112233445',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 123321123,
                'nama' => 'Ani Fatimah',
                'tgl_lahir' => '1996-07-20',
                'tempat_lahir' => 'Makassar',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 5, // ID Agama Buddha
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Konsultan',
                'password' => Hash::make('password123'),
                'notelp' => '08761234567',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 456654456,
                'nama' => 'Fahmi Prasetyo',
                'tgl_lahir' => '1989-11-15',
                'tempat_lahir' => 'Surabaya',
                'jenis_kelamin' => 'Laki',
                'agama' => 2, // ID Agama Kristen Protestan
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Manager',
                'password' => Hash::make('password123'),
                'notelp' => '08111223344',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 789987789,
                'nama' => 'Sari Indah',
                'tgl_lahir' => '1991-03-25',
                'tempat_lahir' => 'Denpasar',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 3, // ID Agama Katolik
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Dokter',
                'password' => Hash::make('password123'),
                'notelp' => '08233445566',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 987789987,
                'nama' => 'Andi Wijaya',
                'tgl_lahir' => '1990-01-10',
                'tempat_lahir' => 'Padang',
                'jenis_kelamin' => 'Laki',
                'agama' => 4, // ID Agama Hindu
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Pengusaha',
                'password' => Hash::make('password123'),
                'notelp' => '08127894567',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 678987678,
                'nama' => 'Dina Wahyu',
                'tgl_lahir' => '1993-06-30',
                'tempat_lahir' => 'Bandung',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 5, // ID Agama Buddha
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Arsitek',
                'password' => Hash::make('password123'),
                'notelp' => '08761234567',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 987678987,
                'nama' => 'Eko Prasetyo',
                'tgl_lahir' => '1987-09-05',
                'tempat_lahir' => 'Surabaya',
                'jenis_kelamin' => 'Laki',
                'agama' => 1, // ID Agama Islam
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Pegawai Swasta',
                'password' => Hash::make('password123'),
                'notelp' => '08127894567',
                'keluarga' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => 135792468,
                'nama' => 'Rudi Hartono',
                'tgl_lahir' => '1994-02-28',
                'tempat_lahir' => 'Bandung',
                'jenis_kelamin' => 'Laki',
                'agama' => 3, // ID Agama Katolik
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Konsultan IT',
                'password' => Hash::make('password123'),
                'notelp' => '08123456789',
                'keluarga' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 246813579,
                'nama' => 'Sari Wijaya',
                'tgl_lahir' => '1991-11-15',
                'tempat_lahir' => 'Yogyakarta',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 4, // ID Agama Hindu
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Arsitek',
                'password' => Hash::make('password123'),
                'notelp' => '08567891234',
                'keluarga' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 369258147,
                'nama' => 'Bambang Susanto',
                'tgl_lahir' => '1989-09-20',
                'tempat_lahir' => 'Surabaya',
                'jenis_kelamin' => 'Laki',
                'agama' => 1, // ID Agama Islam
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Pengusaha',
                'password' => Hash::make('password123'),
                'notelp' => '08765432100',
                'keluarga' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 579312468,
                'nama' => 'Dewi Lestari',
                'tgl_lahir' => '1993-05-10',
                'tempat_lahir' => 'Semarang',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 2, // ID Agama Kristen Protestan
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Pelajar',
                'password' => Hash::make('password123'),
                'notelp' => '08112233445',
                'keluarga' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 789654123,
                'nama' => 'Tono Sutrisno',
                'tgl_lahir' => '1997-08-05',
                'tempat_lahir' => 'Bandung',
                'jenis_kelamin' => 'Laki',
                'agama' => 5, // ID Agama Buddha
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Dokter',
                'password' => Hash::make('password123'),
                'notelp' => '08987654321',
                'keluarga' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 951753852,
                'nama' => 'Lina Cahyani',
                'tgl_lahir' => '1990-03-18',
                'tempat_lahir' => 'Surakarta',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 3, // ID Agama Katolik
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Pegawai Negeri',
                'password' => Hash::make('password123'),
                'notelp' => '08211223344',
                'keluarga' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 852741963,
                'nama' => 'Arief Budiman',
                'tgl_lahir' => '1988-12-10',
                'tempat_lahir' => 'Makassar',
                'jenis_kelamin' => 'Laki',
                'agama' => 4, // ID Agama Hindu
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Pengusaha',
                'password' => Hash::make('password123'),
                'notelp' => '08127894567',
                'keluarga' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 369147258,
                'nama' => 'Linda Saputri',
                'tgl_lahir' => '1995-06-30',
                'tempat_lahir' => 'Denpasar',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 5, // ID Agama Buddha
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Arsitek',
                'password' => Hash::make('password123'),
                'notelp' => '08761234567',
                'keluarga' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 741258963,
                'nama' => 'Rudi Setiawan',
                'tgl_lahir' => '1992-04-25',
                'tempat_lahir' => 'Padang',
                'jenis_kelamin' => 'Laki',
                'agama' => 1, // ID Agama Islam
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Pegawai Swasta',
                'password' => Hash::make('password123'),
                'notelp' => '08127894567',
                'keluarga' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => 654789321,
                'nama' => 'Santi Wijaya',
                'tgl_lahir' => '1994-07-12',
                'tempat_lahir' => 'Surabaya',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 2, // ID Agama Kristen Protestan
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Manager',
                'password' => Hash::make('password123'),
                'notelp' => '08561234567',
                'keluarga' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke dalam tabel users
        DB::table('users')->insert($usersData);

        $this->command->info('Seeder User berhasil dijalankan!');
    }
}
