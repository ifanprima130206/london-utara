<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {

        $users = User::latest()->get();

        $data = [
            'title' => 'Pengguna',
            'users' => $users
        ];

        return view('back.data.users', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Pengguna',
            'page' => 'create'
        ];

        return view('back.form.users', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'role_id' => 'required'
        ]);

        $user = User::create($validate);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id) {
        
        $id = Crypt::decrypt($id);

        $user = User::find($id);

        $data = [
            'title' => 'Pengguna',
            'page' => 'edit',
            'user' => $user
        ];

        return view('back.form.users', $data);
    }

    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'role_id' => 'required'
        ]);

        $user = User::find($id);
        $user->update($validate);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate!');
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
