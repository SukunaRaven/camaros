<?php

namespace App\Http\Controllers;

use App\Models\Camaros;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('camaros.home');
    }
    public function show(Camaros $camaro)
    {
        // Eager load uploader en reviews
        $camaro->load('uploader', 'reviews.user');

        return view('camaros.show', compact('camaro'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('camaros.edit', compact('categories'));
    }
    public function edit(Camaros $camaro)
    {
        $categories = Category::all();
        return view('camaros.edit', compact('camaro','categories'));
    }
    public function admin()
    {
        return view('admin.admin');
    }
    public function userProfile()
    {
        return view('users.userProfile');
    }
    public function loginUser()
    {
        return view('users.loginUser');
    }
    public function registerUser()
    {
        return view('users.registerUser');
    }
}
