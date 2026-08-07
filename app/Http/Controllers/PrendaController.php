<?php

namespace App\Http\Controllers;

use App\Models\Prenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrendaController extends Controller
{
    public function index()
    {
        $query = Prenda::where('mostrar_catalogo', true);
        if (request()->filled('categoria')) {
            $query->where('categoria', request('categoria'));
        }
        $prendas = $query->latest()->paginate(8)->withQueryString();
        $spotlightPrendas = Prenda::where('mostrar_spotlight', true)->where('estado', 'disponible')->latest()->take(6)->get();
        $muroPrendas = Prenda::where('mostrar_muro', true)->latest()->take(8)->get();

        return view('prendas.index', compact('prendas', 'spotlightPrendas', 'muroPrendas'));
    }

    public function show(Prenda $prenda)
    {
        return view('prendas.show', compact('prenda'));
    }

    public function create()
    {
        return view('prendas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'talla' => 'required|string',
            'categoria' => 'required|string|max:255',
            'estado' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('prendas', 's3');
        }

        $validated['mostrar_spotlight'] = $request->has('mostrar_spotlight');
        $validated['mostrar_catalogo'] = $request->has('mostrar_catalogo');
        $validated['mostrar_muro'] = $request->has('mostrar_muro');

        Prenda::create($validated);

        return redirect()->route('prendas.admin')->with('success', 'Prenda registrada exitosamente.');
    }

    public function admin()
    {
        $prendas = Prenda::orderBy('created_at', 'desc')->get();

        return view('prendas.admin', compact('prendas'));
    }

    public function edit(Prenda $prenda)
    {
        return view('prendas.edit', compact('prenda'));
    }

    public function update(Request $request, Prenda $prenda)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'talla' => 'required|string',
            'categoria' => 'required|string|max:255',
            'estado' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($prenda->imagen) {
                Storage::disk('s3')->delete($prenda->imagen);
            }
            $validated['imagen'] = $request->file('imagen')->store('prendas', 's3');
        }

        $validated['mostrar_spotlight'] = $request->has('mostrar_spotlight');
        $validated['mostrar_catalogo'] = $request->has('mostrar_catalogo');
        $validated['mostrar_muro'] = $request->has('mostrar_muro');

        $prenda->update($validated);

        return redirect()->route('prendas.admin')->with('success', 'Prenda actualizada correctamente.');
    }

    public function destroy(Prenda $prenda)
    {
        if ($prenda->imagen) {
            Storage::disk('s3')->delete($prenda->imagen);
        }

        $prenda->delete();

        return redirect()->route('prendas.admin')->with('success', 'Prenda eliminada del archivo.');
    }
}
