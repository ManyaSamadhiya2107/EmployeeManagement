<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function loginForm() {
        return view('auth.login');
    }

    public function registerForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        try {
            // Validate the request
            $validated = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
                'date_of_birth' => 'nullable|date',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'permanent_address_line1' => 'nullable|string',
                'permanent_address_line2' => 'nullable|string',
                'permanent_city' => 'nullable|string',
                'permanent_state' => 'nullable|string',
                'current_address_line1' => 'nullable|string',
                'current_address_line2' => 'nullable|string',
                'current_city' => 'nullable|string',
                'current_state' => 'nullable|string'
            ]);

            // Handle profile picture upload
            $profilePicturePath = null;
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                if ($file->isValid()) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $profilePicturePath = $file->storeAs('profile_pictures', $filename, 'public');
                }
            }

            // Collect qualifications and experiences
            $qualifications = $request->input('qualifications');
            $experience = $request->input('experience');

            // Filter out empty values from arrays
            $qualifications = array_filter($qualifications ?? []);
            $experience = array_filter($experience ?? []);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'date_of_birth' => $request->input('date_of_birth'),
                'password' => Hash::make($request->input('password')),
                'profile_picture' => $profilePicturePath,
                'qualifications' => count($qualifications) > 0 ? json_encode($qualifications) : null,
                'experience' => count($experience) > 0 ? json_encode($experience) : null,
                'permanent_address_line1' => $request->input('permanent_address_line1'),
                'permanent_address_line2' => $request->input('permanent_address_line2'),
                'permanent_city' => $request->input('permanent_city'),
                'permanent_state' => $request->input('permanent_state'),
                'current_address_line1' => $request->input('current_address_line1'),
                'current_address_line2' => $request->input('current_address_line2'),
                'current_city' => $request->input('current_city'),
                'current_state' => $request->input('current_state'),
                'role' => 'user'
            ]);

            Auth::login($user);
            return redirect('/profile');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function login(Request $request) {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/profile');
        }
        return back();
    }
}
