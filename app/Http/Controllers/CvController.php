<?php

namespace App\Http\Controllers;

use App\Models\Portofolio1019;
use Illuminate\Http\Request;

class CvController extends Controller
{
    // Menampilkan daftar semua CV
    public function index()
    {
        $cvs = Portofolio1019::latest()->get();
        return view('CV.pages', compact('cvs'));
    }

    // Form Tambah CV
    public function create()
    {
        return view('CV.create');
    }

    // Simpan Data CV Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'profesi' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'lokasi' => 'required',
            'tentang_saya' => 'required',
            'keahlian' => 'required',
            'pengalaman_kerja' => 'required',
            'pendidikan' => 'required',
        ]);

        Portofolio1019::create($request->all());

        return redirect()->route('cv.index')->with('success', 'Data CV berhasil ditambahkan!');
    }

    // Tampil Detail CV
    public function show($id)
    {
        $cv = Portofolio1019::findOrFail($id);
        return view('CV.show', compact('cv'));
    }

    // Form Edit CV
    public function edit($id)
    {
        $cv = Portofolio1019::findOrFail($id);
        return view('CV.edit', compact('cv'));
    }

    // Update Data CV
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'profesi' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'lokasi' => 'required',
            'tentang_saya' => 'required',
            'keahlian' => 'required',
            'pengalaman_kerja' => 'required',
            'pendidikan' => 'required',
        ]);

        $cv = Portofolio1019::findOrFail($id);
        $cv->update($request->all());

        return redirect()->route('cv.index')->with('success', 'Data CV berhasil diperbarui!');
    }

    // Hapus CV
    public function destroy($id)
    {
        $cv = Portofolio1019::findOrFail($id);
        $cv->delete();

        return redirect()->route('cv.index')->with('success', 'Data CV berhasil dihapus!');
    }
}
