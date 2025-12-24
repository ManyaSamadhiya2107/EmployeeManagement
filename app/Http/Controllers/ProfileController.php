<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function index() {
        $user = Auth::user();
        return view('profile.profile', ['user' => $user]);
    }

    public function update(Request $request) {
        $user = Auth::user();
        $field = $request->input('field');
        $value = $request->input('value');

        // Fields that can be edited
        $editableFields = [
            'current_address_line1',
            'current_address_line2',
            'current_city',
            'current_state',
            'permanent_address_line1',
            'permanent_address_line2',
            'permanent_city',
            'permanent_state'
        ];

        if (in_array($field, $editableFields)) {
            $user->update([$field => $value]);
            return response()->json(['status' => 'success', 'message' => 'Profile updated']);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid field'], 400);
    }

    public function uploadPicture(Request $request) {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('profile_pictures', $filename, 'public');

            $user->update(['profile_picture' => $path]);
            return response()->json(['status' => 'success', 'path' => $path]);
        }

        return response()->json(['status' => 'error'], 400);
    }

    public function addQualification(Request $request) {
        $user = Auth::user();
        $qualifications = json_decode($user->qualifications, true) ?? [];
        $qualifications[] = $request->input('qualification');

        $user->update(['qualifications' => json_encode($qualifications)]);
        return response()->json(['status' => 'success']);
    }

    public function removeQualification(Request $request) {
        $user = Auth::user();
        $qualifications = json_decode($user->qualifications, true) ?? [];
        $index = $request->input('index');

        unset($qualifications[$index]);
        $qualifications = array_values($qualifications);

        $user->update(['qualifications' => json_encode($qualifications)]);
        return response()->json(['status' => 'success']);
    }

    public function addExperience(Request $request) {
        $user = Auth::user();
        $experiences = json_decode($user->experience, true) ?? [];
        $experiences[] = $request->input('experience');

        $user->update(['experience' => json_encode($experiences)]);
        return response()->json(['status' => 'success']);
    }

    public function removeExperience(Request $request) {
        $user = Auth::user();
        $experiences = json_decode($user->experience, true) ?? [];
        $index = $request->input('index');

        unset($experiences[$index]);
        $experiences = array_values($experiences);

        $user->update(['experience' => json_encode($experiences)]);
        return response()->json(['status' => 'success']);
    }
}
