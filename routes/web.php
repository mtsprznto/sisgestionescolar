<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);


Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index.home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');



//rutas para la configuraciPones del sistema
Route::get('/admin/configuracion', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('auth');
Route::post('/admin/configuracion/create', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('admin.configuracion.store')->middleware('auth');


// RUTAS PARA GESTION
Route::get('/admin/gestiones', [App\Http\Controllers\GestionController::class, 'index'])->name('admin.gestiones.index')->middleware('auth');
Route::get('/admin/gestiones/create', [App\Http\Controllers\GestionController::class, 'create'])->name('admin.gestiones.create')->middleware('auth');
Route::post('/admin/gestiones/create', [App\Http\Controllers\GestionController::class, 'store'])->name('admin.gestiones.store')->middleware('auth');
Route::get('/admin/gestiones/{id}/edit', [App\Http\Controllers\GestionController::class, 'edit'])->name('admin.gestiones.edit')->middleware('auth');
Route::put('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'update'])->name('admin.gestiones.update')->middleware('auth');
Route::delete('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'destroy'])->name('admin.gestiones.destroy')->middleware('auth');

//--------------------

// RUTAS PARA PERIODOS
Route::get('/admin/periodos', [App\Http\Controllers\PeriodoController::class, 'index'])->name('admin.periodos.index')->middleware('auth');
Route::post('/admin/periodos/create', [App\Http\Controllers\PeriodoController::class, 'store'])->name('admin.periodos.store')->middleware('auth');
Route::put('/admin/periodos/{id}', [App\Http\Controllers\PeriodoController::class, 'update'])->name('admin.periodos.update')->middleware('auth');
Route::delete('/admin/periodos/{id}', [App\Http\Controllers\PeriodoController::class, 'destroy'])->name('admin.periodos.destroy')->middleware('auth');

//--------------------


// RUTAS PARA NIVELES
Route::get('/admin/niveles', [App\Http\Controllers\NivelController::class, 'index'])->name('admin.niveles.index')->middleware('auth');
Route::post('/admin/niveles/create', [App\Http\Controllers\NivelController::class, 'store'])->name('admin.niveles.store')->middleware('auth');
Route::put('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'update'])->name('admin.niveles.update')->middleware('auth');
Route::delete('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'destroy'])->name('admin.niveles.destroy')->middleware('auth');




// RUTAS PARA GRADOS
Route::get('/admin/grados', [App\Http\Controllers\GradoController::class, 'index'])->name('admin.grados.index')->middleware('auth');
Route::post('/admin/grados/create', [App\Http\Controllers\GradoController::class, 'store'])->name('admin.grados.store')->middleware('auth');
Route::put('/admin/grados/{id}', [App\Http\Controllers\GradoController::class, 'update'])->name('admin.grados.update')->middleware('auth');
Route::delete('/admin/grados/{id}', [App\Http\Controllers\GradoController::class, 'destroy'])->name('admin.grados.destroy')->middleware('auth');


// RUTAS PARA PARALELOS
Route::get('/admin/paralelos', [App\Http\Controllers\ParaleloController::class, 'index'])->name('admin.paralelos.index')->middleware('auth');
Route::post('/admin/paralelos/create', [App\Http\Controllers\ParaleloController::class, 'store'])->name('admin.paralelos.store')->middleware('auth');
Route::put('/admin/paralelos/{id}', [App\Http\Controllers\ParaleloController::class, 'update'])->name('admin.paralelos.update')->middleware('auth');
Route::delete('/admin/paralelos/{id}', [App\Http\Controllers\ParaleloController::class, 'destroy'])->name('admin.paralelos.destroy')->middleware('auth');

// RUTAS PARA TURNOS
Route::get('/admin/turnos', [App\Http\Controllers\TurnoController::class, 'index'])->name('admin.turnos.index')->middleware('auth');
Route::get('/admin/turnos/create', [App\Http\Controllers\TurnoController::class, 'create'])->name('admin.turnos.create')->middleware('auth');
Route::post('/admin/turnos/create', [App\Http\Controllers\TurnoController::class, 'store'])->name('admin.turnos.store')->middleware('auth');
Route::get('/admin/turnos/{id}/edit', [App\Http\Controllers\TurnoController::class, 'edit'])->name('admin.turnos.edit')->middleware('auth');
Route::put('/admin/turnos/{id}', [App\Http\Controllers\TurnoController::class, 'update'])->name('admin.turnos.update')->middleware('auth');
Route::delete('/admin/turnos/{id}', [App\Http\Controllers\TurnoController::class, 'destroy'])->name('admin.turnos.destroy')->middleware('auth');


// RUTAS PARA MATERIAS
Route::get('/admin/materias', [App\Http\Controllers\MateriaController::class, 'index'])->name('admin.materias.index')->middleware('auth');
Route::post('/admin/materias/create', [App\Http\Controllers\MateriaController::class, 'store'])->name('admin.materias.store')->middleware('auth');
Route::put('/admin/materias/{id}', [App\Http\Controllers\MateriaController::class, 'update'])->name('admin.materias.update')->middleware('auth');
Route::delete('/admin/materias/{id}', [App\Http\Controllers\MateriaController::class, 'destroy'])->name('admin.materias.destroy')->middleware('auth');

// RUTAS PARA ROLES
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/permisos/{id}', [App\Http\Controllers\RoleController::class, 'permisos'])->name('admin.roles.permisos')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth');

// RUTAS PARA PERSONAL
Route::get('/admin/personal/{tipo}', [App\Http\Controllers\PersonalController::class, 'index'])->name('admin.personal.index')->middleware('auth');
Route::get('/admin/personal/create/{tipo}', [App\Http\Controllers\PersonalController::class, 'create'])->name('admin.personal.create')->middleware('auth');
Route::post('/admin/personal/create', [App\Http\Controllers\PersonalController::class, 'store'])->name('admin.personal.store')->middleware('auth');
Route::get('/admin/personal/show/{id}', [App\Http\Controllers\PersonalController::class, 'show'])->name('admin.personal.show')->middleware('auth');
Route::get('/admin/personal/{id}/edit', [App\Http\Controllers\PersonalController::class, 'edit'])->name('admin.personal.edit')->middleware('auth');
Route::get('/admin/personal/permisos/{id}', [App\Http\Controllers\PersonalController::class, 'edit'])->name('admin.personal.permisos')->middleware('auth');
Route::put('/admin/personal/{id}', [App\Http\Controllers\PersonalController::class, 'update'])->name('admin.personal.update')->middleware('auth');
Route::delete('/admin/personal/{id}', [App\Http\Controllers\PersonalController::class, 'destroy'])->name('admin.personal.destroy')->middleware('auth');


// RUTAS PARA LA FORMACION DEL PERSONAL
Route::get('/admin/personal/{id}/formaciones', [App\Http\Controllers\FormacionController::class, 'index'])->name('admin.formaciones.index')->middleware('auth');
Route::get('/admin/personal/{id}/formaciones/create', [App\Http\Controllers\FormacionController::class, 'create'])->name('admin.formaciones.create')->middleware('auth');
Route::post('/admin/personal/{id}/formaciones/create', [App\Http\Controllers\FormacionController::class, 'store'])->name('admin.formaciones.store')->middleware('auth');
Route::get('/admin/personal/formaciones/{id}', [App\Http\Controllers\FormacionController::class, 'edit'])->name('admin.formaciones.edit')->middleware('auth');
Route::put('/admin/personal/formaciones/{id}', [App\Http\Controllers\FormacionController::class, 'update'])->name('admin.formaciones.update')->middleware('auth');
Route::delete('/admin/personal/formaciones/{id}', [App\Http\Controllers\FormacionController::class, 'destroy'])->name('admin.formaciones.destroy')->middleware('auth');


// RUTAS PARA ESTUDIANTES DEL SIS
Route::get('/admin/estudiantes', [App\Http\Controllers\EstudianteController::class, 'index'])->name('admin.estudiantes.index')->middleware('auth');
Route::get('/admin/estudiantes/create', [App\Http\Controllers\EstudianteController::class, 'create'])->name('admin.estudiantes.create')->middleware('auth');
Route::post('/admin/estudiantes/create', [App\Http\Controllers\EstudianteController::class, 'store'])->name('admin.estudiantes.store')->middleware('auth');
Route::get('/admin/estudiantes/{id}', [App\Http\Controllers\EstudianteController::class, 'show'])->name('admin.estudiantes.show')->middleware('auth');
Route::get('/admin/estudiantes/{id}/edit', [App\Http\Controllers\EstudianteController::class, 'edit'])->name('admin.estudiantes.edit')->middleware('auth');


//Ruta para registrar al apoderado
Route::post('/admin/estudiantes/ppff/create', [App\Http\Controllers\PpffController::class, 'store'])->name('admin.ppffs.store')->middleware('auth');
