<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CamaroAdminController extends Controller
{
    //Show admin page with all users
    public function index()
    {
        $user = auth()->user();
        $camaros = $user->camaros()->get();
        $users = \App\Models\User::orderBy('created_at','desc')->paginate(20);

        return view('admin.admin', compact('user','camaros','users'));
    }


    //Delete users (not yourself)
    public function destroy(User $user)
    {
        //Prevent deleting yourself
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.admin')->with('error', 'Je kunt jezelf niet verwijderen.');
        }

        //Extra check: Don't delete admins or ask to make sure.
        $user->delete();

        return redirect()->route('admin.admin')->with('success', 'Gebruiker verwijderd.');
    }

}
