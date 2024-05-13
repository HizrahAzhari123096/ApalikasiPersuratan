<?php

namespace App\Http\Controllers;

use App\Models\KepalaSurat;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KepalaSuratController extends Controller
{
    

    public function index(): View
    {
        $dataKepalasurat = KepalaSurat::latest()->paginate(10);
        return view('kepalasurat.index', compact('dataKepalasurat'));
    }

    public function create(): View
    {
        return view('kepalasurat.create');
    }
//
    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'id_kop'      => 'required|unique:kepalasurat,id_kop',
            'nama_kop' => 'required',
            'alamat_kop' => 'required',
            'nama_tujuan' => 'required',

        ]);

        Kepalasurat::create([
            'id_kop'        => $request->id_kop,
            'nama_kop'  => $request->nama_kop,
            'alamat_kop' => $request->alamat_kop,
            'nama_tujuan' => $request->nama_tujuan,

        ]);

        return redirect()->route('kepalasurat.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

        public function edit(string $id_kop): View
    {
        $dataKepalasurat = Kepalasurat::findOrFail($id_kop);

        return view('kepalasurat.edit', compact('dataKepalasurat'));

    }

    public function show(string $id_kop): View
    {
        $kepalasurat = Kepalasurat::findOrFail($id_kop);

        return view('kepalasurat.show', compact('kepalasurat'));
    }

    public function update(Request $request, $id_kop): RedirectResponse
    {
        //validate form
        $request->validate([
            'id_kop'      => 'required|unique:kepalasurat,id_kop',
            'nama_kop' => 'required',
            'alamat_kop' => 'required',
            'nama_tujuan' => 'required',

        ]);

        $dataKepalasurat = Kepalasurat::findOrFail($id_kop);
        $dataKepalasurat->update([
            'id_kop'        => $request->id_kop,
            'nama_kop'  => $request->nama_kop,
            'alamat_kop' => $request->alamat_kop,
            'nama_tujuan' => $request->nama_tujuan,
            ]);

        return redirect()->route('kepalasurat.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id_kop): RedirectResponse
    {
        $kepalasurat = Kepalasurat::findOrFail($id_kop);
        $kepalasurat->delete();
        return redirect()->route('kepalasurat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

