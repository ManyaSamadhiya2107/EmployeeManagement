<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminAuthController extends Controller {

    public function loginForm() {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect('/admin');
        }
        return view('auth.admin_login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');


        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Admin account not found.'])->withInput();
        }

        if ($user->role !== 'admin') {
            return back()->withErrors(['email' => 'Only admin users can access this page.'])->withInput();
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin')->with('success', 'Welcome Admin!');
        }

        return back()->withErrors(['password' => 'Invalid credentials.'])->withInput();
    }

    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/admin/login')->with('success', 'Logged out successfully');
    }
}
