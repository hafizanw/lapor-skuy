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
        User::create([
            'nim'          => '1111',
            'name'         => 'Budi Mahasiswa',
            'email'        => '2ff4aa9d85-e8888b+user1@inbox.mailtrap.io',
            'password'     => '123',
            'phone_number' => '081234567890',
            'faculty'      => 'Fakultas Ilmu Komputer',
            'major'        => 'Teknik Informatika',
        ]);
    }
}