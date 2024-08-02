<?php

namespace App\Http\Controllers;


use App\Models\KepalaSurat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\View\View;

class KepalaSuratController extends Controller
{
    public function index(): View
    {
        $kepalasurat = KepalaSurat::latest()->paginate(10);
        return view('kepalasurat.index', compact('kepalasurat'));
    }

    public function create(): View
    {
        $users = User::all();
        return view('kepalasurat.create', compact('users'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_kop' => 'required|string|max:255',
            'alamat_kop' => 'required|string|max:255',
            'nama_tujuan' => 'required|string|max:255',
            'id_user' => 'required|exists:users,id_user',
        ]);

        KepalaSurat::create([
            'nama_kop' => $request->nama_kop,
            'alamat_kop' => $request->alamat_kop,
            'nama_tujuan' => $request->nama_tujuan,
            'id_user' => $request->id_user,
        ]);

        return redirect()->route('kepalasurat.index')->with('success', 'Kepala Surat berhasil ditambahkan');
    }


    public function edit($id_kop)
    {
        $kepalasurat = KepalaSurat::findOrFail($id_kop); // Pastikan menggunakan id_kop sebagai parameter
        return view('kepalasurat.edit', compact('kepalasurat'));
    }

    public function update(Request $request, $id_kop)
    {
        $request->validate([
            'nama_kop' => 'required',
            'alamat_kop' => 'required',
            'nama_tujuan' => 'required',
            'id_user' => 'required',
        ]);

        $kepalasurat = KepalaSurat::findOrFail($id_kop); // Pastikan menggunakan id_kop sebagai parameter
        $kepalasurat->update($request->all());

        return redirect()->route('kepalasurat.index')
            ->with('success', 'Kepala Surat berhasil diperbarui.');
    }


    public function destroy(string $id): RedirectResponse
    {
        $kepalasurat = KepalaSurat::findOrFail($id);
        $kepalasurat->delete();
        return redirect()->route('kepalasurat.index')->with('success', 'Kepala Surat berhasil dihapus!');
    }

    public function show(string $id): View
    {
        $kepalasurat = KepalaSurat::findOrFail($id);
        return view('kepalasurat.show', compact('kepalasurat'));
    }
}