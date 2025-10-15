<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camaros extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'year', 'description', 'image_url', 'category_id', 'uploader_id', 'is_active'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function uploader(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'uploader_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'camaro_id');
    }
}
