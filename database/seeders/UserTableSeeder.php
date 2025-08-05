<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB; // Pastikan ini ada

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menonaktifkan pemeriksaan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Hapus semua data yang ada di tabel 'users'
        DB::table('users')->truncate();

        // Mengaktifkan kembali pemeriksaan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Buat 5000 hingga 10000 data user secara acak
        $numberOfUsers = rand(5000, 10000);

        User::factory()->count($numberOfUsers)->create();

        $this->command->info($numberOfUsers . ' users created successfully!');
    }
}