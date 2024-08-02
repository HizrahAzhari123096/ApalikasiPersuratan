<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\NamaTandaTangan;
use App\Models\KepalaSurat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SuratKeluarController extends Controller
{
    // Display a listing of the resource.
    public function index(): View
    {
        $suratkeluar = SuratKeluar::with(['kepalaSurat', 'namatandatangan', 'users'])->latest()->paginate(10);
        return view('suratkeluar.index', compact('suratkeluar'));
    }

    // Show the form for creating a new resource.
    public function create(): View
    {
        $kepala_surat = KepalaSurat::all();
        $namatandatangan = NamaTandaTangan::all();
        $users = User::all(); // Menambahkan variabel users
        return view('suratkeluar.create', compact('kepala_surat', 'namatandatangan', 'users'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_kop' => 'required|exists:kepala_surat,id_kop',
            'tanggal' => 'required|date',
            'no_surat' => 'required|string|max:150',
            'tujuan' => 'required|string|max:150',
            'perihal' => 'required|string|max:150',
            'id_tandatangan' => 'required|exists:namatandatangan,id_tandatangan',
            'id_user' => 'required|exists:users,id_user',
            'isi_surat' => 'required|string', // Menambahkan validasi untuk isi_surat
        ]);

        SuratKeluar::create([
            'id_kop' => $request->id_kop,
            'tanggal' => $request->tanggal,
            'no_surat' => $request->no_surat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'id_tandatangan' => $request->id_tandatangan,
            'id_user' => $request->id_user,
            'isi_surat' => $request->isi_surat, // Menambahkan isi_surat
        ]);

        return redirect()->route('suratkeluar.index')->with('success', 'Surat Keluar berhasil ditambahkan');
    }

    // Display the specified resource.
    public function show(SuratKeluar $suratkeluar): View
    {
        return view('suratkeluar.show', compact('suratkeluar'));
    }

    // Show the form for editing the specified resource.
    public function edit(SuratKeluar $suratkeluar): View
    {
        $kepala_surat = KepalaSurat::all();
        $namatandatangan = NamaTandaTangan::all();
        $users = User::all(); // Menambahkan variabel users
        return view('suratkeluar.edit', compact('suratkeluar', 'kepala_surat', 'namatandatangan', 'users'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, SuratKeluar $suratkeluar): RedirectResponse
    {
        $request->validate([
            'id_kop' => 'required|exists:kepala_surat,id_kop',
            'tanggal' => 'required|date',
            'no_surat' => 'required|string|max:150',
            'tujuan' => 'required|string|max:150',
            'perihal' => 'required|string|max:150',
            'id_tandatangan' => 'required|exists:namatandatangan,id_tandatangan',
            'id_user' => 'required|exists:users,id_user',
            'isi_surat' => 'required|string', // Menambahkan validasi untuk isi_surat
        ]);

        $suratkeluar->update($request->only(['id_kop', 'tanggal', 'no_surat', 'tujuan', 'perihal', 'id_tandatangan', 'id_user', 'isi_surat']));

        return redirect()->route('suratkeluar.index')->with('success', 'Surat Keluar berhasil diperbarui');
    }

    // Remove the specified resource from storage.
    public function destroy(SuratKeluar $suratkeluar): RedirectResponse
    {
        $suratkeluar->delete();
        return redirect()->route('suratkeluar.index')->with('success', 'Surat Keluar berhasil dihapus');
    }
}

