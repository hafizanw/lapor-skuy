<?php
namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class kirim_aduan_controller extends Controller
{
    public function index_umum()
    {
        $userId  = Auth::id();
        $profile = DB::select('CALL select_user(?)', [$userId])[0];

        return view('kirim_aduan.kirim_aduan_umum', [
            'displayLogo' => 'd-none d-md-inline',
            'titlePage'       => 'Kirim Aduan Umum',
            'username'        => $profile->name,
            'profile_picture' => $profile->profile_picture
            ? ('profile_uploads/' . $profile->profile_picture)
            : 'profile_uploads/profile_default.png',
        ]);
    }
    public function index_privat()
    {
        $userId  = Auth::id();
        $profile = DB::select('CALL select_user(?)', [$userId])[0];

        return view('kirim_aduan.kirim_aduan_privat', [
            'displayLogo' => 'd-none d-md-inline',
            'titlePage'       => 'Kirim Aduan Umum',
            'username'        => $profile->name,
            'profile_picture' => $profile->profile_picture
            ? ('profile_uploads/' . $profile->profile_picture)
            : 'profile_uploads/profile_default.png',
        ]);
    }

    public function index()
    {
        $userId  = Auth::id();
        $profile = DB::select('CALL select_user(?)', [$userId])[0];

        return view('kirim_aduan.kirim_aduan', [
            'displayLogo' => 'd-none d-md-inline',
            'titlePage'       => 'Kirim Aduan',
            'username'        => $profile->name,
            'profile_picture' => $profile->profile_picture
            ? ('profile_uploads/' . $profile->profile_picture)
            : 'profile_uploads/profile_default.png',
        ]);
    }

    public function store(Request $request)
    {
        // // Debugging: Tampilkan semua data yang diterima dari request
        // dd($request->all());

        // Validasi data
        $validatedData = $request->validate([
            'user_id'         => 'required',
            'visibility_type' => 'required|in:1,2', // 1 untuk umum, 2 untuk privat
            'title'           => 'required|string|max:255',
            'content'         => 'required|string',
            'image'           => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Mengambil file dari request
        $file = $request->file('image');

        if ($file) {
            // Jika file ada, proses simpan file dan buat attachment
            $realFileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $extension;
            $filePath = $file->storeAs('uploads/complaints', $fileName, 'public');

            $complaint_attachment = new ComplaintAttachment();
            $complaint_attachment->real_name_file = $realFileName;
            $complaint_attachment->path_file = $filePath;
            $complaint_attachment->type_file = $file->getClientMimeType();
            $complaint_attachment->save();

            $attachmentId = $complaint_attachment->id;
        } else {
            // Jika tidak ada file diupload
            $attachmentId = null;
        }

        // API Neural Network
        $response = Http::post('http://31.97.61.247:5000/klasifikasi', [
            'judul' => $validatedData['title'],
            'deskripsi' => $validatedData['content'],
        ]);

        $result = $response->json();
        $departemen = (string) ($result['departemen'] ?? 'draft');
        $confidence = (float) ($result['confidence'] ?? 0);

        $departemen_map = [
            'KEMAHASISWAAN' => 1,
            'DAAK'          => 2,
            'SARPRAS'       => 3,
            'PENGAJARAN'    => 4,
            'PERPUS'        => 5,
            'KEAMANAN'      => 6,
            'UPT_LAB'       => 7,
        ];
        $departemen_id = $departemen_map[strtoupper($departemen)] ?? null;
        $nextId = DB::table('complaints')->max('id') + 1;

        if($confidence > 0.5) {
            DB::statement('CALL insert_into_complaints_departement(?, ?, ?, ?, ?, ?, ?, ?, ?)',[
                $nextId,
                $validatedData['user_id'],
                $validatedData['visibility_type'],
                $attachmentId,
                $departemen_id,
                null,
                $validatedData['title'],
                $validatedData['content'],
                "diajukan"
            ]);
        } else {
            $complaint = new Complaint();
            $complaint->user_id = $validatedData['user_id'];
            $complaint->category_id = $validatedData['visibility_type'];
            $complaint->attachment_id = $attachmentId; // bisa null
            $complaint->complaint_title = $validatedData['title'];
            $complaint->complaint_content = $validatedData['content'];
            $complaint->proses = 'draft';
            $complaint->save();
        }

        return redirect()->route('kirim-aduan')->with('success', 'Aduan berhasil dikirim!');
    }
}
