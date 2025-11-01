<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Camaro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //Show profile page
    public function show()
    {

        $user = Auth::user();


        $camaros = $user->camaros()->with('category')->get();

        return view('profile.show', compact('user', 'camaros'));
    }

    //Update profile
    public function updateProfile(Request $request)
    {
        //Get logged in user
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->name;

        //Make sure a new picture is uploaded
        if ($request->hasFile('profile_photo')) {

            //Delete old picture from storage
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            //Safe new picture
            $path = $request->file('profile_photo')->store('profile_photos', 'public');

            //Safe the path in the Database
            $user->profile_photo = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated!');
    }

    // Update e-mail
    public function updateEmail(Request $request)
    {
        //Check if e-mail exists and is correct
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        //Get logged in user and update e-mail
        $user = Auth::user();
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Email updated!');
    }

    //Password change
    public function updatePassword(Request $request)
    {
        // Make sure the password is strong enough
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        //Get logged in user
        $user = Auth::user();

        //Hash passcode
        $user->password = Hash::make($request->password);

        //Safe in database
        $user->save();

        return redirect()->back()->with('success', 'Password updated!');
    }
}
