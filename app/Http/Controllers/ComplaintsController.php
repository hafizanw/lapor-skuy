<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari pengguna
        $validatedData = $request->validate([
            'title' => 'required|string|max:255', // harus ada dan maksimal 255 karakter
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'required|string|max:255',
            'type' => 'required|string|in:umum,privat',
        ]);

        // Menyimpan data aduan ke dalam database
        $complaint = new \App\Models\Complaint();
        $complaint->title = $validatedData['title'];
        $complaint->name = $validatedData['name'];
        $complaint->description = $validatedData['description'];
        $complaint->image = $validatedData['image'];
        $complaint->type = $validatedData['type'];;
        $complaint->save();

        // Mengembalikan respons ke pengguna
        return redirect()->route('kirim-aduan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
