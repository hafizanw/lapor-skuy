<?php
namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complaint::insert([
            [
                'user_id'           => 1,
                'category_id'       => 1,
                'attachment_id'     => 1,
                'complaint_title'   => 'Wifi Kampus Tidak Bisa Digunakan',
                'complaint_content' => 'Sudah 2 hari wifi kampus tidak bisa digunakan, mohon segera diperbaiki.',
                'proses'            => 'diproses',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 2,
                'category_id'       => 2,
                'attachment_id'     => 3,
                'complaint_title'   => 'Kualitas Ruangan Buruk',
                'complaint_content' => 'Ruangan terlalu panas dan tidak nyaman untuk belajar.',
                'proses'            => 'diajukan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 3,
                'category_id'       => 1,
                'attachment_id'     => 3,
                'complaint_title'   => 'Kualitas Wifi Buruk',
                'complaint_content' => 'Wifi di ruang kelas sering putus, mohon perbaiki.',
                'proses'            => 'draft',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
