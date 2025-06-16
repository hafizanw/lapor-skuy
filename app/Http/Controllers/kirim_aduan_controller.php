<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintAttachment;
use Illuminate\Http\Request;

class kirim_aduan_controller extends Controller
{
    public function index() {
        return view('kirim_aduan.kirim_aduan', [
        ]);
    }

    public function store(Request $request) {
        // // Debugging: Tampilkan semua data yang diterima dari request
        // dd($request->all());

        // Validasi data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'visibility_type' => 'required|in:1,2', // 1 untuk umum, 2 untuk privat
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Mengambil file dari request
        $file = $request->file('image');
        
        // Mendapatkan nama asli file
        $realFileName = $file->getClientOriginalName();
        
        // Mendapatkan ekstensi file
        $extension = $file->getClientOriginalExtension();
        
        // Membuat nama file unik untuk menghindari konflik
        $fileName = time() . '_' . uniqid() . '.' . $extension;
        
        // Menyimpan file ke storage (misalnya ke folder public/uploads/complaints)
        $filePath = $file->storeAs('uploads/complaints', $fileName, 'public');
        
        // Simpan aduan ke database
        $complaint_attachment = new ComplaintAttachment();
        $complaint_attachment->real_name_file = $realFileName;
        $complaint_attachment->path_file = $filePath;
        $complaint_attachment->type_file = $file->getClientMimeType(); // atau $extension
        $complaint_attachment->save();
        
        $complaint = new Complaint();
        $complaint->user_id = $validatedData['user_id'];
        $complaint->category_id = $validatedData['visibility_type'];
        $complaint->attachment_id = $complaint_attachment->id; // Menyimpan ID attachment
        $complaint->complaint_title = $validatedData['title'];
        $complaint->complaint_content = $validatedData['content'];
        $complaint->proses = 'draft'; // Status awal aduan
        $complaint->save();

        return redirect()->route('kirim-aduan')->with('success', 'Aduan berhasil dikirim!');
    }
}