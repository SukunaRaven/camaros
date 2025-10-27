<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camaro extends Model
{
use HasFactory;

protected $fillable = ['name', 'year', 'description', 'category_id', 'image_url', 'user_id'];

public function category()
{
return $this->belongsTo(Category::class);
}

public function uploader()
{
return $this->belongsTo(User::class, 'user_id');
}
}
