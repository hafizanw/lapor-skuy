<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Complaint;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complaint::insert([
            [
                'user_id' => 1,
                'category_id' => 1,
                'attachment_id' => 1,
                'complaint_title' => 'jhfewfnewwhef',
                'complaint_content' => 'fueiwnhfuwifnwi',
                'proses' => 'diproses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'category_id' => 2,
                'attachment_id' => 3,
                'complaint_title' => 'fwefjhfewfnewwhef',
                'complaint_content' => 'sgerwgvevwevfueiwnhfuwifnwi',
                'proses' => 'diajukan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'category_id' => 1,
                'attachment_id' => 3,
                'complaint_title' => 'ffefcewce',
                'complaint_content' => 'efvwegwhgrhreherheh',
                'proses' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
