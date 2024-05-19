<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        try {
            if(Auth::user()){
                return redirect()->back();
            }else{
                return view('auth.index');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        try {
            // Validasi Form
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'email harus diisi',
                'email.email' => 'inputan harus berupa email',
                'password.required' => 'password harus diisi'
            ]);
    
            // Validasi User Dari DB
            if(Auth::attempt($credentials)){
                // Jika Berhasil diberi Session
                $request->session()->regenerate();
                // Diarakahkan ke dashboard
                return redirect('/')->with('success','Berhasil Login');
            }else{
                // Jika Gagal akan Mengembalikan Alert Error
                return back()->with('error','Gagal Login');
            }
        
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function registerView()
    {
        try {
            if(Auth::user()){
                return redirect()->back();
            }else{
                return view('auth.register');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function register(Request $request)
    {
        try {
            // Validasi Form
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'name.required' => 'name harus diisi',
                'email.required' => 'email harus diisi',
                'email.email' => 'inputan harus berupa email',
                'password.required' => 'password harus diisi'
            ]);
    
            // Buat User Baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect($user ? '/login' : '/register')->with($user ? 'success' : 'error',$user ? 'Berhasil Register' : 'Gagal Register');
        
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('success','Berhasil Logout');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
