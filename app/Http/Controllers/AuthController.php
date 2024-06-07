<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $admin = Administrator::where('username', $request->username)->get()->first();
            session(['id_administrator' => $admin->id_administrator]);
            session(['role' => $admin->role]);
            session(['no_role' => $admin->no_role]);
            session(['username' => $admin->username]);
            Alert::success('success', 'Berhasil Login');
            return redirect()->route('dashboard.index');
        } else {
            Alert::error('error', 'Username atau Password Salah');
            return redirect()->route('login');
        }
    }
    public function logout(Request $request)
    {
        session()->flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
