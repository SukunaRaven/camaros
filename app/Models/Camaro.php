<?php

namespace App\Models;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camaro extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'description',
        'category_id',
        'user_id',
        'image_url',
        'is_public'
    ];

    // Relatie naar User (uploader)
    public function uploader(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relatie naar Category
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


}
