<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CamaroAdminController extends Controller
{
    // toon admin dashboard met alle users
    public function index()
    {
        $user = auth()->user();
        $camaros = $user->camaros()->get();
        $users = \App\Models\User::orderBy('created_at','desc')->paginate(20);

        return view('admin.admin', compact('user','camaros','users'));
    }


    // verwijder gebruiker (niet jezelf)
    public function destroy(User $user)
    {
        // prevent deleting yourself
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.admin')->with('error', 'Je kunt jezelf niet verwijderen.');
        }

        // (optioneel) extra check: alleen verwijderen als niet admin, of vraag bevestiging
        $user->delete();

        return redirect()->route('admin.admin')->with('success', 'Gebruiker verwijderd.');
    }

}
