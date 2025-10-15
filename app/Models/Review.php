<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'camaro_id', 'rating', 'comment'];

    public static function create(array $array)
    {
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function camaro(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Camaros::class, 'camaro_id');
    }
}

