<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Nivel;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $niveles = Nivel::with('grados')->orderBy('nombre', 'asc')->get();
        return view('admin.grados.index', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /*
        $datos = request()->all();
        return response()->json($datos);
        */
        $request->validate([
            'nombre_create' => 'required|string|max:255',
            'nivel_id_create' => 'required|exists:nivels,id'
        ]);
        $grado = new Grado();
        $grado->nombre = $request->nombre_create;
        $grado->nivel_id = $request->nivel_id_create;
        $grado->save();

        return redirect()->route('admin.grados.index')
            ->with('mensaje', 'El grado se ha creado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grado $grado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grado $grado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grado $grado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grado $grado)
    {
        //
    }
}
