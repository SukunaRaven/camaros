<?php

namespace App\Http\Controllers;

use App\Models\Camaro;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CamaroController extends Controller
{
    public function home()
    {
        return view('camaro.home');
    }

    public function camaroExhibition(Request $request)
    {
        $query = Camaro::query()->with('category', 'uploader')
            ->where('is_public', true); // alleen publieke Camaros

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        $camaros = $query->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('camaro.camaroExhibition', compact('camaros', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('camaro.create', compact('categories'));
    }

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

        return redirect()->route('home')->with('success', 'Camaro toegevoegd');
    }

    public function show(Camaro $camaro)
    {
        $camaro->load('category', 'uploader');
        return view('camaro.show', compact('camaro'));
    }

    public function edit(Camaro $camaro)
    {
        $categories = Category::all();
        return view('camaro.edit', compact('camaro', 'categories'));
    }

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

        return redirect()->route('camaro.show', $camaro)->with('success', 'Camaro bijgewerkt');
    }

    public function destroy(Camaro $camaro)
    {
        if ($camaro->image_url && Storage::disk('public')->exists(ltrim($camaro->image_url,'/'))) {
            Storage::disk('public')->delete(ltrim($camaro->image_url,'/'));
        }

        $camaro->delete();

        return redirect()->route('home')->with('success', 'Camaro verwijderd');
    }

    public function toggleVisibility(Camaro $camaro)
    {
        // Alleen eigenaar mag toggle doen
        if ($camaro->user_id !== auth()->id()) {
            abort(403);
        }

        $camaro->is_public = !$camaro->is_public;
        $camaro->save();

        return redirect()->back()->with('success', 'Camaro visibility updated!');
    }

    public function togglePrivacy(\App\Models\Camaro $camaro)
    {
        // Controleer dat de ingelogde gebruiker eigenaar is
        if ($camaro->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        // Toggle public/private
        $camaro->is_public = !$camaro->is_public;
        $camaro->save();

        return back()->with('success', 'Camaro visibility updated.');
    }

}
