<?php

namespace App\Http\Controllers;

use App\Models\NamaTandaTangan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NamaTandaTanganController extends Controller
{
    // Display a listing of the resource.
    public function index(): View
    {
        $namatandatangan = NamaTandaTangan::orderBy('id_tandatangan', 'asc')->paginate(10);
        return view('namatandatangan.index', compact('namatandatangan'));
    }

    // Show the form for creating a new resource.
    public function create(): View
    {
        $lastId = NamaTandaTangan::max('id_tandatangan') + 1;
        return view('namatandatangan.create', compact('lastId'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_tandatangan' => 'required|string|max:100',
            'jabatan' => 'required|string|max:200',
            'nip' => 'required|string|max:25|unique:namatandatangan,nip',
        ]);

        NamaTandaTangan::create($request->only(['nama_tandatangan', 'jabatan', 'nip']));

        return redirect()->route('namatandatangan.index')->with('success', 'Data Berhasil Disimpan!');
    }

    // Display the specified resource.
    public function show(int $id_tandatangan): View
    {
        $namatandatangan = NamaTandaTangan::findOrFail($id_tandatangan);
        return view('namatandatangan.show', compact('namatandatangan'));
    }

    // Show the form for editing the specified resource.
    public function edit(int $id_tandatangan): View
    {
        $namatandatangan = NamaTandaTangan::findOrFail($id_tandatangan);
        return view('namatandatangan.edit', compact('namatandatangan'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, int $id_tandatangan): RedirectResponse
    {
        $request->validate([
            'nama_tandatangan' => 'required|string|max:100',
            'jabatan' => 'required|string|max:200',
            'nip' => 'required|string|max:25|unique:namatandatangan,nip,' . $id_tandatangan . ',id_tandatangan',
        ]);

        $namatandatangan = NamaTandaTangan::findOrFail($id_tandatangan);
        $namatandatangan->update($request->only(['nama_tandatangan', 'jabatan', 'nip']));

        return redirect()->route('namatandatangan.index')->with('success', 'Data Berhasil Diubah!');
    }

    // Remove the specified resource from storage.
    public function destroy(int $id_tandatangan): RedirectResponse
    {
        $namatandatangan = NamaTandaTangan::findOrFail($id_tandatangan);
        $namatandatangan->delete();
        return redirect()->route('namatandatangan.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
