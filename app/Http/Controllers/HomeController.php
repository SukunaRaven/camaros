<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function show() {
        return view('show');
    }
    public function create()
    {
        return view('create');
    }
    public function edit()
    {
        return view('edit');
    }
    public function admin()
    {
        return view('admin');
    }
    public function userProfile()
    {
        return view('userProfile');
    }
}
