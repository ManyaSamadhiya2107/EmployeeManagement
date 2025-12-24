<?php
namespace App\Http\Controllers;

class AdminController extends Controller {
    public function index() {
        $employees = \App\Models\User::where('role', 'user')->get();
        return view('admin.dashboard', compact('employees'));
    }

    public function showEmployee($id) {
        $user = \App\Models\User::findOrFail($id);
        return view('profile.profile', compact('user'));
    }
}
