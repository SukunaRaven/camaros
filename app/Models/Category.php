<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function firstOrCreate(array $array)
    {
    }

    public function camaros() {
        return $this->hasMany(Camaro::class);
    }
}
