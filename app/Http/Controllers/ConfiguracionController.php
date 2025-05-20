<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracion;

class ConfiguracionController extends Controller
{
    //
    public function index()
    {
        $jsonData = file_get_contents('https://api.hilariweb.com/divisas');
        $divisas = json_decode($jsonData, true);

        $configuracion = Configuracion::first();
        return view("admin.configuracion.index", compact("configuracion", "divisas"));
    }
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            "nombre"=>"required",
            "descripcion"=>"required",
            "direccion"=>"required",
            "telefono"=>"required",
            "divisa"=>"required",
            "correo_electronico"=>"required | email",
            "logo"=>"image|mimes:jpeg,png,jpg",
        ]);
    }
}
