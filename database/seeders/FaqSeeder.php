<?php
namespace Database\Seeders;

use App\Models\Department;
use App\Models\Faq;
use Illuminate\Database\Seeder;

// Pastikan model User diimport

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PERBAIKAN: Menggunakan model User yang sudah menunjuk ke tabel 'users'
        Faq::create([
            'question' => 'Apa itu Lapor Skuy?',
            'answer' => 'Lapor Skuy adalah aplikasi aduan berbasis web yang memungkinkan mahasiswa dan civitas akademika untuk melaporkan berbagai permasalahan di lingkungan kampus secara cepat dan transparan.',
        ]);
        Faq::create([
            'question' => 'Siapa saja yang bisa mengirim aduan?',
            'answer' => 'Semua mahasiswa, dosen, dan staf kampus yang memiliki akun terdaftar dapat mengirimkan aduan melalui aplikasi ini.',
        ]);
        Faq::create([
            'question' => 'Apa saja jenis aduan yang bisa dilaporkan?',
            'answer' => 'Aduan dapat mencakup masalah fasilitas, pelayanan administrasi, keamanan, kebersihan, dan masalah lain yang berhubungan dengan kehidupan kampus.',
        ]);
        Faq::create([
            'question' => 'Bagaimana cara mengirim aduan?',
            'answer' => '1. Login menggunakan akun Anda.
                        2. Klik menu "Kirim Aduan".
                        3. Isi form aduan dengan lengkap.
                        4. Klik tombol Kirim.

                        Aduan Anda akan segera masuk ke sistem dan ditinjau oleh pihak terkait.',
        ]);
        Faq::create([
            'question' => 'Bagaimana saya mengetahui status aduan saya?',
            'answer' => 'Anda dapat memantau status aduan melalui menu "Lihat Aduan", yang menampilkan apakah aduan Anda sedang direview, diproses, atau sudah selesai.',
        ]);
        Faq::create([
            'question' => 'Apakah saya bisa memberikan dukungan terhadap aduan orang lain?',
            'answer' => 'Ya, Anda bisa memberikan tanda setuju (upvote) pada aduan lain yang menurut Anda penting untuk ditindaklanjuti oleh pihak kampus.',
        ]);
        Faq::create([
            'question' => 'Berapa lama aduan akan diproses?',
            'answer' => 'Waktu penyelesaian aduan tergantung pada jenis dan tingkat urgensinya. Namun, setiap aduan akan mendapat tanggapan maksimal dalam 3–7 hari kerja.',
        ]);
        Faq::create([
            'question' => 'Saya lupa password. Bagaimana cara meresetnya?',
            'answer' => 'Gunakan fitur "Lupa Password" di halaman login, lalu ikuti petunjuk untuk mengganti kata sandi Anda melalui email.',
        ]);
        Faq::create([
            'question' => 'Siapa yang menangani aduan saya?',
            'answer' => 'Aduan akan diteruskan ke departemen atau unit kerja terkait, seperti DAAK, Keuangan, Kemahasiswaan, atau Sarana Prasarana, untuk ditindaklanjuti sesuai jenis permasalahan.',
        ]);
    }
}