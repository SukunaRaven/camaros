<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\Login as LoginModel;

class LogSuccessfullLogin
{
    public function handle(Login $event): void
    {
        $user = $event->user;
        LoginModel::create(['user_id' => $user->id, 'login_date' => now()->toDateString()]);
    }
}
