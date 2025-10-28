<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role', 'profile_photo'];
    protected $hidden = ['password', 'remember_token'];

    public function camaros()
    {
        return $this->hasMany(Camaro::class, 'uploader_id');
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
