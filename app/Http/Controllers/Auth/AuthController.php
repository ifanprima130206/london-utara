<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Register;
use App\Models\Back\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {

        $data = [
            'title' => 'Login',
        ];

        return view('auth.login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
        ];

        return view('auth.register', $data);
    }

    public function store_login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'g-recaptcha-response' => 'recaptcha',
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();
        
        if (!$user || $user->status != "1") {
            return back()->withErrors([
                'email' => 'Akun belum aktif, silahkan cek email dan aktivasi sekarang.',
            ])->onlyInput('email');
        }


        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
 
            return redirect()->intended('admin/overview')->with('success', 'Login Berhasil.');
        }
 
        return back()->withErrors([
            'email' => 'Login gagal.',
        ])->onlyInput('email');
    }

    public function store_register(Request $request){

        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'g-recaptcha-response' => 'recaptcha',
        ]);

        
        $existingUser = User::where('email', $request->email)->whereNull('deleted_at')->first();

        if ($existingUser) {

            return redirect()->back()->withInput()->withErrors(['email' => 'Email sudah terdaftar.']);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 0,
            'status' => '0'
        ]);

        Mail::to($user->email)->send(new Register($user));

        return redirect()->route('auth.login')->with('success', 'Silahkan cek email anda untuk mengaktifkan akun dan pergi ke halaman spam');
    }

    public function activation($id) {

        $id = decrypt($id);

        $user = User::find($id);

        if ($user) {
            $user->status = '1';
            $user->save();

            return view('auth.active');
        } else {

            return redirect()->route('auth.login')->with('error', 'Akun tidak ditemukan.');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login')->with('success', 'Anda telah berhasil logout.');
    }
}
