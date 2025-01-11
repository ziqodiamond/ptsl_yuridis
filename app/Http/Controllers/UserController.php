<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        // Filter by role
        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Search by name, email, or NIP
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                ;
            });
        }

        // Paginate users
        $users = $query->paginate(10);

        return view('admin.user', compact('users'));
    }

    // Store the new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'Pengguna berhasil di tambah.');
    }

    // Update user data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'nullable|string',
            'password' => 'nullable|string|min:8',

        ]);

        $user = User::findOrFail($id);

        // Update fields
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Pengguna berhasil diperbaharui');
    }

    // Delete user
    public function delete($id)
    {
        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Hapus user
        $user->delete();

        // Redirect atau beri response sukses
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
