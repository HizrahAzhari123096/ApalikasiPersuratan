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
        $request->validate([
            'user_name'    => 'required',
            'password'     => 'required',
            'status'       => 'required',
            'nama_petugas' => 'required',
        ]);

        Users::create($request->all());

        return redirect()->route('users.index')->with(['success' => 'User berhasil ditambahkan!']);
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'user_name'    => 'required',
            'password'     => 'required',
            'status'       => 'required',
            'nama_petugas' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with(['success' => 'User berhasil diperbarui!']);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')->with(['success' => 'User berhasil dihapus!']);
    }
}
