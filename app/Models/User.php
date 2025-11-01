<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    //Make sure user is admin
    public function isAdmin(): bool
    {
        //Give TRUE if user is admin, give FALSE if user isn't admin
        return $this->role === 'admin';
    }

    //One user can upload multiple Camaro's
    public function camaros()
    {
        return $this->hasMany(Camaro::class);
    }

    //One user can have multiple logins
    public function loginRecords()
    {
        return $this->hasMany(LoginRecord::class);
    }
}
