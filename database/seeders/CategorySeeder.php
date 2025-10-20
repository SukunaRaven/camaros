<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $cats = ['Classic','Modern','Concept'];
        foreach($cats as $c) Category::create(['name' => $c]);
    }
}

