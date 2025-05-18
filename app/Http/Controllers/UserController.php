<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }
    
    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        // Pastikan hanya admin yang bisa membuat admin
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('users.index')->with('error', 'Anda tidak memiliki izin untuk membuat akun admin.');
        }
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,mahasiswa',
        ]);
    
        // Buat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt('password'), // Sesuaikan dengan sistem password yang aman
        ]);
    
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }
    
    
    
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,mahasiswa',
        ]);
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
    
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }
    
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
    
}
