<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\LoginRecord;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Toon het login scherm.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Verwerk het login verzoek.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Valideer en log de gebruiker in
        $request->authenticate();

        // Regenerate sessie voor veiligheid
        $request->session()->regenerate();

        // Controleer of de gebruiker succesvol is ingelogd
        if (Auth::check()) {
            // Registreer een nieuwe login
            LoginRecord::create([
                'user_id' => Auth::id(),
                'logged_in_at' => now(),
            ]);
        }

        // Redirect naar de homepagina i.p.v. dashboard
        return redirect()->intended(route('home'));
    }

    /**
     * Log de gebruiker uit.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
