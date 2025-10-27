<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Review extends Model
{
    use HasFactory;


    protected $fillable = ['user_id','camaro_id','rating','comment'];

    public static function create(array $array)
    {
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function camaros(): BelongsTo
    {
        return $this->belongsTo(Camaro::class, 'camaro_id');
    }
}
