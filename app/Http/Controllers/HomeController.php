<?php

namespace App\Http\Controllers;

use App\Models\Camaros;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('camaros.home');
    }
    public function show() {
        $camaros = camaros::all();
        return view('camaros.show');
    }
    public function create()
    {
        return view('camaros.create');
    }
    public function edit()
    {
        return view('camaros.edit');
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
