<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * @var mixed|null
     */
    public mixed $role;
    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = ['password', 'remember_token'];

    public function camaroModels(): User|\Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Camaros::class, 'uploader_id');
    }

    public function reviews(): User|\Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function logins(): User|\Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Login::class);
    }

    public function hasLoggedInAtLeastDays(int $days): bool
    {
        $uniqueDays = $this->logins()->distinct('login_date')->count('login_date');
        return $uniqueDays >= $days;
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}

