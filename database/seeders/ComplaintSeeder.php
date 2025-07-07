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
                'complaint_title' => 'Sampah Menumpuk di Depan Kantin',
                'complaint_content' => 'Sudah tiga hari sampah di depan Kantin tidak diangkut. Bau menyengat dan mengganggu aktivitas perkuliahan. Mohon segera ditindaklanjuti.',
                'proses' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'category_id' => 2,
                'attachment_id' => 3,
                'complaint_title' => 'Jaringan WiFi Lemah di Perpustakaan',
                'complaint_content' => 'Jaringan kampus di area perpustakaan sangat lambat bahkan sering terputus. Padahal mahasiswa banyak yang belajar dan mengerjakan tugas di sana.',
                'proses' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'category_id' => 1,
                'attachment_id' => 3,
                'complaint_title' => 'Dosen Tidak Hadir Tanpa Pemberitahuan',
                'complaint_content' => 'Dosen mata kuliah Sistem Operasi tidak hadir selama dua pertemuan terakhir tanpa pemberitahuan. Kami berharap pihak DAAK bisa mengklarifikasi dan memberikan solusi atas permasalahan ini.',
                'proses' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
