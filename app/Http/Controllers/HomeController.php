<?php

namespace App\Http\Controllers;

use App\Models\Camaro;
use App\Models\Category;

class HomeController extends Controller
{
    public function home() {
        $camaros = Camaro::with('category','uploader')->paginate(12);
        $categories = Category::all();
        return view('camaro.home', compact('camaros','categories'));
    }
}
