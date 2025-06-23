<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ComplaintAttachment;

class ComplaintAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComplaintAttachment::insert([
            [
                'real_name_file' => 'gambar1.jpg',
                'path_file' => 'aaaa/bbbb/cccc',
                'type_file' => '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'real_name_file' => 'gambar2.jpg',
                'path_file' => 'aaaa/bbbb/cccc',
                'type_file' => '.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'real_name_file' => 'gambar3.jpg',
                'path_file' => 'aaaa/bbbb/cccc/dddd',
                'type_file' => '.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
