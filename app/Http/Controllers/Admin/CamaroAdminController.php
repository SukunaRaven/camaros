<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CamaroAdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        return view('admin.admin', compact('users'));
    }

    public function destroyUser(User $user): RedirectResponse
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Je kunt jezelf niet verwijderen!');
        }

        $user->delete();
        return back()->with('status', 'Gebruiker verwijderd!');
    }
}
