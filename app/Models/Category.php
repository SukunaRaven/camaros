<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function firstOrCreate(array $array)
    {
    }

    public function camaros(): BelongsToMany
    {
        return $this->belongsToMany(Camaro::class);
    }
}
