<?php

namespace App\Http\Controllers;

use App\Models\NamaTandaTangan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class NamaTandaTanganController extends Controller
{
    public function index(): View
    {
        $datanamatandatangan = NamaTandaTangan::latest()->paginate(10);
        return view('namatandatangan.index', compact('datanamatandatangan'));
    }

    public function create(): View
    {
        return view('namatandatangan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id'              => 'required|unique:namatandatangan,id',
            'nama_tandatangan' => 'required',
            'jabatan'         => 'required',
            'nip'             => 'required',
        ]);

        NamaTandaTangan::create([
            'id'              => $request->id,
            'nama_tandatangan' => $request->nama_tandatangan,
            'jabatan'         => $request->jabatan,
            'nip'             => $request->nip,
        ]);

        return redirect()->route('namatandatangan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $datanamatandatangan = NamaTandaTangan::findOrFail($id);
        return view('namatandatangan.edit', compact('datanamatandatangan'));
    }

    public function show(string $id): View
    {
        $namatandatangan = NamaTandaTangan::findOrFail($id);
        return view('namatandatangan.show', compact('namatandatangan'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'id'              => 'required',
            'nama_tandatangan' => 'required',
            'jabatan'         => 'required',
            'nip'             => 'required',
        ]);

        $namatandatangan = NamaTandaTangan::findOrFail($id);
        $namatandatangan->update([
            'id'              => $request->id,
            'nama_tandatangan' => $request->nama_tandatangan,
            'jabatan'         => $request->jabatan,
            'nip'             => $request->nip,
        ]);

        return redirect()->route('namatandatangan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $namatandatangan = NamaTandaTangan::findOrFail($id);
        $namatandatangan->delete();
        return redirect()->route('namatandatangan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
