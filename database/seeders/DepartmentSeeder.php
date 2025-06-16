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
        // PERBAIKAN: Menggunakan model User yang sudah menunjuk ke tabel 'users'
        Department::create([
            'name' => 'Test',
            'description' => 'Test Department 1',
            'role' => 'test',
        ]);
        Department::create([
            'name' => 'Agus Lapar',
            'description' => 'Test Department 2',
            'role' => 'daak',
        ]);
        Department::create([
            'name' => 'Elyn',
            'description' => 'Test Department 3',
            'role' => 'administrasi_keuangan',
        ]);
    }
}