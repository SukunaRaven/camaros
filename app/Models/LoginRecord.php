<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginRecord extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'logged_in_at'];

    //One login only belongs to one user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
