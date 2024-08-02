<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'user_name' => 'required',
            'password' => 'required',
            'status' => 'required',
            'nama_petugas' => 'required',
        ]);

        // Simpan data ke dalam database
        try {
            $user = User::create([
                'user_name' => $request->user_name,
                'password' => bcrypt($request->password), // Encrypt password
                'status' => $request->status,
                'nama_petugas' => $request->nama_petugas,
            ]);

            return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Tangani error jika terjadi
            return redirect()->back()->withErrors(['msg' => 'Gagal menambahkan user: ' . $e->getMessage()]);
        }
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'user_name' => 'required',
            'password' => 'required',
            'status' => 'required',
            'nama_petugas' => 'required',
        ]);

        // Update data user
        try {
            $user->update([
                'user_name' => $request->user_name,
                'password' => bcrypt($request->password), // Encrypt password
                'status' => $request->status,
                'nama_petugas' => $request->nama_petugas,
            ]);

            return redirect()->route('users.index')->with('success', 'User berhasil diperbarui!');
        } catch (\Exception $e) {
            // Tangani error jika terjadi
            return redirect()->back()->withErrors(['msg' => 'Gagal memperbarui user: ' . $e->getMessage()]);
        }
    }

    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => 'Gagal menghapus user: ' . $e->getMessage()]);
        }
    }

    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }
}