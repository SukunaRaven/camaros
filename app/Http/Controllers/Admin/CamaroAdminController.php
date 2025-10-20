<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camaros;

class CamaroAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware();
    }

    public function index()
    {
        $camaros = Camaros::with('category','uploader')->paginate(20);
        return view('views.admin.admin', compact('camaros'));
    }

    public function destroy(Camaros $camaro)
    {
        $camaro->delete();
        return redirect()->back()->with('success','Camaro verwijderd');
    }

    private function middleware()
    {
    }
}
