<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\NamaTandaTangan;
use App\Models\KepalaSurat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SuratMasukController extends Controller
{
    // Display a listing of the resource.
    public function index(): View
    {
        $suratmasuk = SuratMasuk::with(['kepalaSurat', 'namaTandaTangan'])->latest()->paginate(10);
        return view('suratmasuk.index', compact('suratmasuk'));
    }

    // Show the form for creating a new resource.
    public function create(): View
    {
        $kepala_surat = KepalaSurat::all();
        $namatandatangan = NamaTandaTangan::all();
        return view('suratmasuk.create', compact('kepala_surat', 'namatandatangan'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_kop' => 'required|exists:kepala_surat,id_kop',
            'tanggal' => 'required|date',
            'no_surat' => 'required|min:5',
            'asal_surat' => 'required|min:5',
            'perihal' => 'required|min:5',
            'disp1' => 'required|min:3',
            'disp2' => 'required|min:3',
            'id_tandatangan' => 'required|exists:namatandatangan,id_tandatangan',
            'image' => 'required|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        SuratMasuk::create($data);

        return redirect()->route('suratmasuk.index')->with('success', 'Data Surat Masuk berhasil ditambahkan!');
    }

    // Show the form for editing the specified resource.
    public function edit($no_surat): View
    {
        $suratmasuk = SuratMasuk::findOrFail($no_surat);
        $kepala_surat = KepalaSurat::all();
        $namatandatangan = NamaTandaTangan::all();
        return view('suratmasuk.edit', compact('suratmasuk', 'kepala_surat', 'namatandatangan'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $no_surat): RedirectResponse
    {
        $request->validate([
            'id_kop' => 'required|exists:kepala_surat,id_kop',
            'tanggal' => 'required|date',
            'no_surat' => 'required|min:5',
            'asal_surat' => 'required|min:5',
            'perihal' => 'required|min:5',
            'disp1' => 'required|min:3',
            'disp2' => 'required|min:3',
            'id_tandatangan' => 'required|exists:namatandatangan,id_tandatangan',
            'image' => 'sometimes|image|max:2048',
        ]);

        $suratmasuk = SuratMasuk::findOrFail($no_surat);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada gambar baru diunggah
            if ($suratmasuk->image) {
                \Storage::delete('public/' . $suratmasuk->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $suratmasuk->update($data);

        return redirect()->route('suratmasuk.index')->with('success', 'Data Surat Masuk berhasil diubah!');
    }

    // Remove the specified resource from storage.
    public function destroy($no_surat): RedirectResponse
    {
        $suratmasuk = SuratMasuk::findOrFail($no_surat);
        if ($suratmasuk->image) {
            \Storage::delete('public/' . $suratmasuk->image);
        }
        $suratmasuk->delete();
        return redirect()->route('suratmasuk.index')->with('success', 'Data Surat Masuk berhasil dihapus!');
    }
    public function show(string $no_surat): View
    {
        $suratmasuk = SuratMasuk::findOrFail($no_surat);
        return view('suratmasuk.show', compact('suratmasuk'));
    }
}
