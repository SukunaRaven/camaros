<?php

namespace App\Http\Controllers;

use App\Models\Camaro;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CamaroController extends Controller
{
    // Home pagina
    public function home()
    {
        return view('camaro.home'); // alleen info over Camaro's
    }

    // Show single Camaro
    public function show(Camaro $camaro)
    {
        // Eager load category en uploader zodat $camaro->category en $camaro->uploader werken
        $camaro->load('category', 'uploader');

        return view('camaro.show', compact('camaro'));
    }


    // Formulier voor create
    public function create()
    {
        $categories = Category::all();
        return view('camaro.create', compact('categories'));
    }

    // Store nieuwe Camaro
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('camaro_images','public');
            $data['image_url'] = '/storage/' . $path;
        }

        Camaro::create($data);

        return redirect()->route('home')->with('success','Camaro toegevoegd');
    }

    // Formulier voor edit
    public function edit(Camaro $camaro)
    {
        $categories = Category::all();
        return view('camaro.edit', compact('camaro','categories'));
    }

    // Update Camaro
    public function update(Request $request, Camaro $camaro)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('camaro_images','public');
            $data['image_url'] = '/storage/' . $path;
        }

        $camaro->update($data);

        return redirect()->route('camaro.show', $camaro)->with('success','Camaro bijgewerkt');
    }

    // Delete Camaro
    public function destroy(Camaro $camaro)
    {
        if ($camaro->image_url && Storage::disk('public')->exists(ltrim($camaro->image_url,'/'))) {
            Storage::disk('public')->delete(ltrim($camaro->image_url,'/'));
        }

        $camaro->delete();

        return redirect()->route('home')->with('success','Camaro verwijderd');
    }

    public function camaroExhibition(Request $request)
    {
        // Basis query
        $query = Camaro::query()->with('category', 'uploader');

        // Filter zoeken
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Filter categorie
        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        $camaros = $query->paginate(12)->withQueryString();
        $categories = Category::all(); // Haal alle categorieën op

        return view('camaro.camaroExhibition', compact('camaros', 'categories'));
    }


}
