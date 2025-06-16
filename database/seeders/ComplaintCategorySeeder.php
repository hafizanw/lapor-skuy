<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ComplaintCategory;

class ComplaintCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComplaintCategory::insert([
            [
                'description' => 'dafefcc',
                'visibility_type' => 'public',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'dafefwefewfwf',
                'visibility_type' => 'private',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'dafefwefewfefweffwf',
                'visibility_type' => 'private',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
