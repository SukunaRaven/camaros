<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public static function create(array $array)
    {
    }


    public function camaros()
    {
        return $this->hasMany(Camaros::class);
    }
}
