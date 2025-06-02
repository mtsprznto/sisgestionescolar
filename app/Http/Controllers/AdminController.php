<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Turno;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $total_gestiones = Gestion::count();
        $total_periodos = Periodo::count();
        $total_niveles = Nivel::count();
        $total_grados = Grado::count();
        $total_paralelos = Paralelo::count();
        $total_turnos = Turno::count();
        $total_materias = Materia::count();

        return view('admin.index', compact('total_gestiones', 'total_periodos', 'total_niveles', 'total_grados', 'total_paralelos', 'total_turnos','total_materias'));
    }
}
