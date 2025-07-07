<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// Pastikan model User diimport

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PERBAIKAN: Menggunakan model User yang sudah menunjuk ke tabel 'users'

        User::insert([
            [
                'nim'             => '1111',
                'name'            => 'Budi Saputra',
                'email'           => 'budi123@gmail.com',
                'password'        => bcrypt('123'),
                'phone_number'    => '081234567890',
                'profile_picture' => '',
                'faculty'         => 'Fakultas Ilmu Komputer',
                'major'           => 'Teknik Informatika',
            ],
            [
                'nim'             => '2222',
                'name'            => 'Wawan Gunawan',
                'email'           => 'wawan@gmail.com',
                'password'        => bcrypt('2222'),
                'phone_number'    => '08123456435890',
                'faculty'         => 'Fakultas Ilmu Komputer',
                'profile_picture' => '',
                'major'           => 'Teknik Informatika',
            ],
            [
                'nim'             => '3333',
                'name'            => 'Angelina',
                'email'           => 'Angelina11@gmail.com',
                'password'        => bcrypt('3333'),
                'phone_number'    => '08123456435834',
                'profile_picture' => '',
                'faculty'         => 'Fakultas Ilmu Komputer',
                'major'           => 'Teknik Informatika',
            ],
        ]);
    }
}
