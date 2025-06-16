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
            'description' => 'jchjsvhfuiewr',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'complaint_id' => 2,
            'user_id' => 2,
            'description' => 'fvvwvvfejchjsvhfuiewr',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'complaint_id' => 3,
            'user_id' => 3,
            'description' => 'dfewfwgfwgwg',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
    }
}
