<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Paralelo;
use Illuminate\Http\Request;

class ParaleloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $grados = Grado::with('paralelos')->orderBy('nombre', 'asc')->get();
        return view('admin.paralelos.index', compact('grados'));
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
            'grado_id_create' => 'required|exists:grados,id',
        ]);

        $paralelo = new Paralelo();
        $paralelo->nombre = $request->nombre_create;
        $paralelo->grado_id = $request->grado_id_create;
        $paralelo->save();

        return redirect()->route("admin.paralelos.index")
            ->with('mensaje', 'El paralelo se ha creado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paralelo $paralelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paralelo $paralelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paralelo $paralelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paralelo $paralelo)
    {
        //
    }
}
