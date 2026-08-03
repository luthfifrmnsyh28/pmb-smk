<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user
     */
    public function index()
    {
        $users = User::with('roles')
            ->latest()
            ->get();

        return view('user.index', compact('users'));
    }

    /**
     * Form tambah user
     */
    public function create()
    {
        $roles = Role::all();

        return view('user.create', compact('roles'));
    }

    /**
     * Simpan user
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role'     => 'required',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'status'   => true,
        ]);

        $user->assignRole($request->role);

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Detail user
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Form edit user
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('user.edit', compact(
            'user',
            'roles'
        ));
    }

    /**
     * Update user
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required',
        ]);

        $data = [
            'name'   => $request->name,
            'email'  => $request->email,
            'status' => $request->status,
        ];

        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        $user->syncRoles($request->role);

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Reset Password
     */
    public function resetPassword(User $user)
    {
        if ($user->id == auth()->id()) {
            return back()->with(
                'error',
                'Tidak dapat mereset password akun sendiri.'
            );
        }

        $user->update([
            'password' => Hash::make('12345678'),
        ]);

        return redirect()
            ->route('user.index')
            ->with(
                'success',
                'Password berhasil direset menjadi : 12345678'
            );
    }

    /**
     * Hapus user
     */
    public function destroy(User $user)
    {
        if ($user->id == auth()->id()) {
            return back()->with(
                'error',
                'Tidak bisa menghapus akun sendiri.'
            );
        }

        $user->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil dihapus.');
    }
}