<?php

namespace App\Http\Controllers;

use App\Models\Camaro;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CamaroController extends Controller
{
    protected array $badWords = [];

    public function __construct()
    {
        //Load curse words from bad_words.txt (currently empty)
        $this->badWords = file(storage_path('app/bad_words.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }

    //Home page
    public function home()
    {
        $camaros = Camaro::latest()->take(10)->get();
        return view('camaro.home', compact('camaros'));
    }

    //Show all public Camaro's
    public function camaroExhibition(Request $request)
    {
        $query = Camaro::query()->with('category', 'uploader')
            ->where('is_public', true);

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


     //Show the Camaro creation form
    public function create()
    {
        $categories = Category::all();
        return view('camaro.create', compact('categories'));
    }

     //Store new Camaro
    public function store(Request $request)
    {
        $data = $this->validateCamaro($request);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('camaro_images', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        Camaro::create($data);

        return redirect()->route('home')->with('success', 'Camaro created successfully!');
    }


     //Show a single Camaro
    public function show(Camaro $camaro)
    {
        $camaro->load('category', 'uploader');
        return view('camaro.show', compact('camaro'));
    }

    //Show edit form for Camaro's
    public function edit(Camaro $camaro)
    {
        $categories = Category::all();

        //Only uploader can edit post
        if ($camaro->user_id !== auth()->id()) {
            abort(403);
        }

        return view('camaro.edit', compact('camaro', 'categories'));
    }


    //Update the edited Camaro
    public function update(Request $request, Camaro $camaro)
    {
        $data = $this->validateCamaro($request);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('camaro_images', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $camaro->update($data);

        //Only uploader can update post
        if ($camaro->user_id !== auth()->id()) {
            abort(403);
        }

        return redirect()->route('camaro.show', $camaro)->with('success', 'Camaro updated successfully!');
    }


    //Delete the Camaro
    public function destroy(Camaro $camaro)
    {
        if ($camaro->image_url && Storage::disk('public')->exists(ltrim($camaro->image_url,'/'))) {
            Storage::disk('public')->delete(ltrim($camaro->image_url,'/'));
        }

        $camaro->delete();

        //Only uploader can delete post
        if ($camaro->user_id !== auth()->id()) {
            abort(403);
        }

        return redirect()->route('home')->with('success', 'Camaro deleted successfully!');
    }


    //Validate input and filter curse words from fields
    protected function validateCamaro(Request $request): array
    {
        //Fields are required, determined if numbers, images or letters,
        $data = $request->validate([
            'name'                 => 'required|string|max:255',
            'year'                 => 'required|integer',
            'category_id'          => 'required|exists:categories,id',
            'description'          => 'required|string',
            'image'                => 'nullable|image|max:2048',

            // Optional fields
            'fiscal_price'     => 'nullable|string|max:255',
            'ready_to_drive_price'      => 'nullable|string|max:255',
            'delivery_costs'       => 'nullable|string|max:255',
            'road_tax'             => 'nullable|string|max:255',
            'classification'       => 'nullable|string|max:255',
            'body'                 => 'nullable|string|max:255',
            'seats'                => 'nullable|string|max:255',
            'gearbox'              => 'nullable|string|max:255',
            'segment'              => 'nullable|string|max:255',
            'energy_label'         => 'nullable|string|max:255',
            'additional_tax'       => 'nullable|string|max:255',
            'introduction'         => 'nullable|string|max:255',
            'end'                  => 'nullable|string|max:255',
            'powertrain'           => 'nullable|string|max:255',
            'powertrain_type'      => 'nullable|string|max:255',
            'max_power'      => 'nullable|string|max:255',
            'max_torque'     => 'nullable|string|max:255',
            'drive'                => 'nullable|string|max:255',
            'cylinders'            => 'nullable|string|max:255',
            'valves_per_cylinder'  => 'nullable|string|max:255',
            'engine_capacity'         => 'nullable|string|max:255',
            'bore_stroke'          => 'nullable|string|max:255',
            'compression_ratio'    => 'nullable|string|max:255',
            'fuel_system'          => 'nullable|string|max:255',
            'valve_control'        => 'nullable|string|max:255',
            'turbo'         => 'nullable|string|max:255',
            'catalytic_converter'  => 'nullable|string|max:255',
            'fuel_tank'            => 'nullable|string|max:255',
            'rpm_100'              => 'nullable|string|max:255',
            'rpm_130'              => 'nullable|string|max:255',
        ]);

        $optionalFields = [
            'fiscal_price', 'ready_to_drive_price', 'delivery_costs', 'road_tax',
            'classification', 'body', 'seats', 'gearbox', 'segment', 'energy_label',
            'additional_tax', 'introduction', 'end',
            'powertrain', 'powertrain_type', 'max_power', 'max_torque', 'drive',
            'cylinders', 'valves_per_cylinder', 'engine_capacity', 'bore_stroke',
            'compression_ratio', 'fuel_system', 'valve_control',
            'turbo', 'catalytic_converter', 'fuel_tank', 'rpm_100', 'rpm_130',
        ];

        foreach ($optionalFields as $field) {
            if (!empty($data[$field])) {
                $data[$field] = str_ireplace($this->badWords, '****', $data[$field]);
            }
        }

        return $data;
    }

    //Privacy toggle
    public function togglePrivacy($id)
    {
        $camaro = Camaro::findOrFail($id);
        $camaro->is_public = !$camaro->is_public;
        $camaro->save();

        return redirect()->back()->with('success', 'Camaro privacy updated successfully.');
    }

}
