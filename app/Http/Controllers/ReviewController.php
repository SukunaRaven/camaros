<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware();
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Diepere validatie: minimaal 5 unieke login-dagen
        if (!$user->hasLoggedInAtLeastDays(1)) {
            return back()->withErrors(['msg' => 'Je moet op minimaal 1 dag hebben ingelogd om een review te plaatsen.']);
        }

        $request->validate([
            'camaro_id' => 'required|exists:camaro,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        Review::create([
            'user_id' => $user->id,
            'camaro_id' => $request->camaro_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success','Review geplaatst');
    }

    private function middleware()
    {
    }
}
