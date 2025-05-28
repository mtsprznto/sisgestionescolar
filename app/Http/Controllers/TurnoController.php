<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $turnos = Turno::all();
        return view('admin.turnos.index', compact('turnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.turnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        $datos = request()->all();
        return response()->json($datos);
        */
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);
        $turno = new Turno();
        $turno->nombre = $request->nombre;
        $turno->save();

        return redirect()->route("admin.turnos.index")
            ->with('mensaje', 'El turno se ha creado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $turno = Turno::find($id);
        return view('admin.turnos.edit', compact('turno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        /*
        $datos = request()->all();
        return response()->json($datos);
        */
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);
        $turno = Turno::find($id);

        $turno->nombre = $request->nombre;
        $turno->save();

        return redirect()->route("admin.turnos.index")
            ->with('mensaje', 'El turno se ha actualizado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $turno = Turno::find($id);
        $turno->delete();
        return redirect()->route('admin.turnos.index')
            ->with('mensaje', 'El turno se ha eliminado correctamente')
            ->with('icono', 'success');
    }
}
