<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Laat Laravel het id zelf beheren
    // public ?int $id = null; // ❌ verwijder dit
    public mixed $role;

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];

    public function camaros()
    {
        return $this->hasMany(Camaro::class, 'uploader_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function logins()
    {
        return $this->hasMany(Login::class);
    }

    public function hasLoggedInAtLeastDays(int $days): bool
    {
        return $this->logins()->distinct('login_date')->count('login_date') >= $days;
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
