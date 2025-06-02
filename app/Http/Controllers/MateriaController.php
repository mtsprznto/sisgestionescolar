<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $materias = Materia::all();
        return view('admin.materias.index', compact('materias'));
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
        ]);

        $paralelo = new Materia();
        $paralelo->nombre = $request->nombre_create;
        $paralelo->save();

        return redirect()->route("admin.materias.index")
            ->with('mensaje', 'La materia se ha creado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        $validate = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
        ]);

        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate)
                ->withInput()
                ->with("modal_id", $id);
        }


        $materia = Materia::find($id);

        $materia->nombre = $request->nombre;
        $materia->save();

        return redirect()->route("admin.materias.index")
            ->with('mensaje', 'La materia se ha actualizado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $materia = Materia::find($id);
        $materia->delete();

        return redirect()->route("admin.materias.index")
            ->with('mensaje', 'La materia se ha eliminado correctamente')
            ->with('icono', 'success');

    }
}
