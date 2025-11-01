<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    //Camaro can have multiple categories (Uncontinued), categories can belong to multiple Camaro
    public function camaros(): BelongsToMany
    {
        return $this->belongsToMany(Camaro::class);
    }
}
