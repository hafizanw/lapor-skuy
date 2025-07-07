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
            'name' => 'Test',
            'password' => bcrypt('123'),
            'description' => 'Test Department 1',
            'password' => '123',
            'role' => 'test',
        ]);
        Department::create([
            'name' => 'Agus Lapar',
            'password' => bcrypt('123'),
            'description' => 'Test Department 2',
            'password' => '123',
            'role' => 'daak',
        ]);
        Department::create([
            'name' => 'Elyn',
            'password' => bcrypt('123'),
            'description' => 'Test Department 3',
            'password' => '123',
            'role' => 'administrasi_keuangan',
        ]);
    }
}
