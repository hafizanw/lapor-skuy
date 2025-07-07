<?php
namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

// Pastikan model User diimport

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name' => 'Agus Kemahasiswaan',
            'password' => bcrypt('123'),
            'description' => 'Departemen Kemahasiswaan',
            'role' => 'KEMAHASISWAAN',
        ]);
        Department::create([
            'name' => 'Budi DAAK',
            'password' => bcrypt('123'),
            'description' => 'Departemen DAAK',
            'role' => 'daak',
        ]);
        Department::create([
            'name' => 'Eko Sarpras',
            'password' => bcrypt('123'),
            'description' => 'Departemen Sarpras',
            'role' => 'SARPRAS',
        ]);
        Department::create([
            'name' => 'Elyn Pengajaran',
            'password' => bcrypt('123'),
            'description' => 'Departemen Pengajaran',
            'role' => 'PENGAJARAN',
        ]);
        Department::create([
            'name' => 'Alya Perpus',
            'password' => bcrypt('123'),
            'description' => 'Departemen Perpus',
            'role' => 'PERPUS',
        ]);
        Department::create([
            'name' => 'Tegar Keamanan',
            'password' => bcrypt('123'),
            'description' => 'Departemen Keamanan',
            'role' => 'KEAMANAN',
        ]);
        Department::create([
            'name' => 'Dian UPT_LAB',
            'password' => bcrypt('123'),
            'description' => 'Departemen UPT_LAB',
            'role' => 'UPT_LAB',
        ]);
    }
}
