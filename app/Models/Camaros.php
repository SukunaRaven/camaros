<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Camaros extends Model
{
    use HasFactory;

    // Alleen dit is genoeg:
    protected $fillable = [
        'name', 'year', 'description', 'image_url', 'category_id', 'uploader_id', 'is_active'
    ];

    public static function findOrFail($value)
    {
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploader_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'camaro_id');
    }
}
