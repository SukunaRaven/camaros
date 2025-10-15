<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        // check op minimaal 5 unieke login-dagen
        if (!$user->hasLoggedInAtLeastDays(5)) {
            return back()->withErrors(['msg' => 'Je moet op minimaal 5 verschillende dagen hebben ingelogd om een review te plaatsen.']);
        }

        $request->validate([
            'camaro_id' => 'required|exists:camaro_models,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        Review::create([
            'user_id' => $user->id,
            'camaro_id' => $request->camaro_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Review geplaatst!');
    }

}
