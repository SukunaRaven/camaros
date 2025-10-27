<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camaro;

class CamaroAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware();
    }

    public function index()
    {
        $camaros = Camaro::with('category','uploader')->paginate(20);
        return view('views.admin.admin', compact('camaros'));
    }

    public function destroy(Camaro $camaro)
    {
        $camaro->delete();
        return redirect()->back()->with('success','Camaro verwijderd');
    }

    private function middleware()
    {
    }
}
