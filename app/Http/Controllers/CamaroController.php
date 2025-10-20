<?php

namespace App\Http\Controllers;

use App\Models\Camaros;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCamaroRequest;
use App\Http\Requests\UpdateCamaroRequest;

class CamaroController extends Controller
{
    public function __construct()
    {
        $this->middleware();
    }

    public function index(Request $request)
    {
        $query = Camaros::with('category','uploader')
            ->when($request->search, function($q) use ($request) {
                $q->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%');
            })
            ->when($request->category, function($q) use ($request) {
                $q->where('category_id', $request->category);
            });

        $camaros = $query->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('camaros.home', compact('camaros','categories'));
    }

    public function show(Camaros $camaro)
    {
        return view('camaros.show', compact('camaro'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('camaros.create', compact('categories'));
    }

    public function store(StoreCamaroRequest $request)
    {
        $data = $request->validated();
        $data['uploader_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('camaro_images','public');
            $data['image_url'] = '/storage/' . $path;
        }

        Camaros::create($data);

        return redirect()->route('camaro.index')->with('success','Camaro toegevoegd');
    }

    public function edit(Camaros $camaro)
    {
        $categories = Category::all();
        return view('camaros.edit', compact('camaro','categories'));
    }

    public function update(UpdateCamaroRequest $request, Camaros $camaro)
    {
        $this->authorize('update', $camaro);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('camaro_images','public');
            $data['image_url'] = '/storage/' . $path;

            if ($camaro->image_url) {
                $oldPath = ltrim($camaro->image_url, '/');
                if (str_starts_with($oldPath, 'storage/')) {
                    $oldPath = substr($oldPath, strlen('storage/'));
                }
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
        }

        $camaro->update($data);

        return redirect()->route('camaro.show', $camaro)->with('success','Camaro bijgewerkt');
    }

    public function destroy(Camaros $camaro)
    {
        $this->authorize('delete', $camaro);

        if ($camaro->image_url) {
            $oldPath = ltrim($camaro->image_url, '/');
            if (str_starts_with($oldPath, 'storage/')) {
                $oldPath = substr($oldPath, strlen('storage/'));
            }
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        $camaro->delete();

        return redirect()->route('camaro.index')->with('success','Camaro verwijderd');
    }

    public function toggleStatus(Request $request, Camaros $camaro)
    {
        $this->authorize('toggleStatus', $camaro);

        $camaro->is_active = !$camaro->is_active;
        $camaro->save();

        return response()->json(['status' => $camaro->is_active]);
    }

    private function authorize(string $string, Camaros $camaro)
    {
    }

    private function middleware()
    {
    }
}
