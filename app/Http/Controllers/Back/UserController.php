<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {

        $users = User::where('status', '1')->latest()->get();

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
            'email' => 'required|email',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'role_id' => 'required'
        ]);

        $existingUser = User::where('email', $request->email)->whereNull('deleted_at')->first();

        if ($existingUser) {

            return redirect()->back()->withInput()->withErrors(['email' => 'Email sudah terdaftar.']);
        }

        $user = new User();
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->password = bcrypt($request->password);
        $user->role_id = $validate['role_id'];
        $user->status = '1';
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {

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
            'email' => 'required|email',
            'password' => 'nullable|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'role_id' => 'required'
        ]);

        $existingUser = User::where('email', $request->email)->whereNot('id', $id)->whereNull('deleted_at')->first();

        if ($existingUser) {

            return redirect()->back()->withInput()->withErrors(['email' => 'Email sudah terdaftar.']);
        }

        $user = User::find($id);

        $user = User::find($id);
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->role_id = $validate['role_id'];
        $user->save();

        if (Auth::user()->role_id == 1) {
            
            return redirect()->route('users.index')->with('success', 'User berhasil diupdate!');
        } else {

            return redirect()->route('admin.overview')->with('success', 'User berhasil diupdate!');
        }
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
