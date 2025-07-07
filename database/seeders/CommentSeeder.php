<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::insert([
        [
            'complaint_id' => 1,
            'user_id' => 1,
            'description' => 'Saya juga sangat setuju setuju dengan aduan tersebut',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'complaint_id' => 2,
            'user_id' => 2,
            'description' => 'Saya juga mendapati hal yang sama',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'complaint_id' => 3,
            'user_id' => 3,
            'description' => 'Setuju',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
    }
}
