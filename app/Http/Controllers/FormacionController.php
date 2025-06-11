<?php

namespace App\Http\Controllers;

use App\Models\Formacion;
use App\Models\Personal;
use Illuminate\Http\Request;

class FormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $personal = Personal::find($id);
        $formaciones = Formacion::where('personal_id', $id)->get();

        return view('admin.formaciones.index', compact('formaciones', 'personal'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Formacion $formacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formacion $formacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formacion $formacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formacion $formacion)
    {
        //
    }
}
