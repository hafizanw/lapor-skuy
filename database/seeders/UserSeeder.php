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
                'nim'          => '1111',
                'name'         => 'Budi Mahasiswa',
                'email'        => '2ff4aa9d85-e8888b+user1@inbox.mailtrap.io',
                'password'     => bcrypt('123'),
                'phone_number' => '081234567890',
                'profile_picture' => '',
                'faculty'      => 'Fakultas Ilmu Komputer',
                'major'        => 'Teknik Informatika',
            ],
            [
                'nim'          => '2222',
                'name'         => 'Wawan Gacorr',
                'email'        => 'wawan@gmail.com',
                'password'     => bcrypt('2222'),
                'phone_number' => '08123456435890',
                'faculty'      => 'Fakultas Ilmu Komputer',
                'profile_picture' => '',
                'major'        => 'Teknik Informatika',
            ],
            [
                'nim'          => '3333',
                'name'         => 'Yanto',
                'email'        => 'yanto123@gmail.com',
                'password'     => bcrypt('3333'),
                'phone_number' => '08123456435834',
                'profile_picture' => '',
                'faculty'      => 'Fakultas Ilmu Komputer',
                'major'        => 'Teknik Informatika',
            ]
            ]);
    }
}