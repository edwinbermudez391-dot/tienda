<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrendaRequest;
use App\Models\Prenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrendaController extends Controller
{
    public function index(Request $request)
    {
        $query = Prenda::where('mostrar_catalogo', true);
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->input('categoria'));
        }
        $prendas = $query->latest()->paginate(8)->withQueryString();
        $spotlightPrendas = Prenda::where('mostrar_spotlight', true)->where('estado', 'disponible')->latest()->take(6)->get();
        $muroPrendas = Prenda::where('mostrar_muro', true)->latest()->take(8)->get();

        return view('prendas.index', compact('prendas', 'spotlightPrendas', 'muroPrendas'));
    }

    public function show(Prenda $prenda)
    {
        abort_if(!$prenda->mostrar_catalogo && !$prenda->mostrar_muro, 404);

        return view('prendas.show', compact('prenda'));
    }

    public function create()
    {
        return view('prendas.create');
    }

    public function store(PrendaRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('prendas', 's3');
        }

        $validated['mostrar_spotlight'] = $request->boolean('mostrar_spotlight');
        $validated['mostrar_catalogo'] = $request->boolean('mostrar_catalogo');
        $validated['mostrar_muro'] = $request->boolean('mostrar_muro');

        Prenda::create($validated);

        return redirect()->route('prendas.admin')->with('success', 'Prenda registrada exitosamente.');
    }

    public function admin()
    {
        $prendas = Prenda::orderBy('created_at', 'desc')->paginate(10);

        return view('prendas.admin', compact('prendas'));
    }

    public function edit(Prenda $prenda)
    {
        return view('prendas.edit', compact('prenda'));
    }

    public function update(PrendaRequest $request, Prenda $prenda)
    {
        $validated = $request->validated();

        if ($request->hasFile('imagen')) {
            if ($prenda->imagen) {
                Storage::disk('s3')->delete($prenda->imagen);
            }
            $validated['imagen'] = $request->file('imagen')->store('prendas', 's3');
        }

        $validated['mostrar_spotlight'] = $request->boolean('mostrar_spotlight');
        $validated['mostrar_catalogo'] = $request->boolean('mostrar_catalogo');
        $validated['mostrar_muro'] = $request->boolean('mostrar_muro');

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
