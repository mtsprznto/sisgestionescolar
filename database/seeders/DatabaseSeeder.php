<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Turno;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(RoleSeeder::class);


        User::factory()->create([
            'name' => 'M Ignacio Perez N',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456')
        ])->assignRole('ADMINISTRADOR');

        Configuracion::create([
            'nombre' => 'Colegio Nacional de Educacion Basica',
            'descripcion' => 'Av. 6 de Octubre Nro. 1234',
            'direccion' => '12345678',
            'telefono' => '12345678',
            'divisa' => 'Bs',
            'correo_electronico' => 'austrian@austran.com',
            'web' => 'reactacadem.com',
            'logo' => 'uploads/logos/1748891169_Diseño sin título (12).png',
        ]);

        Gestion::create([
            'nombre' => '2023'
        ]);
        Gestion::create([
            'nombre' => '2024'
        ]);
        Gestion::create([
            'nombre' => '2025'
        ]);

        Periodo::create(['nombre' => '1er Trimestre', 'gestion_id' => 1]);
        Periodo::create(['nombre' => '2do Trimestre', 'gestion_id' => 1]);
        Periodo::create(['nombre' => '3er Trimestre', 'gestion_id' => 1]);

        Periodo::create(['nombre' => '1er Trimestre', 'gestion_id' => 2]);
        Periodo::create(['nombre' => '2do Trimestre', 'gestion_id' => 2]);
        Periodo::create(['nombre' => '3er Trimestre', 'gestion_id' => 2]);

        Periodo::create(['nombre' => '1er Trimestre', 'gestion_id' => 3]);
        Periodo::create(['nombre' => '2do Trimestre', 'gestion_id' => 3]);
        Periodo::create(['nombre' => '3er Trimestre', 'gestion_id' => 3]);

        Nivel::create(['nombre' => 'INICIAL']);
        Nivel::create(['nombre' => 'PRIMARIA']);
        Nivel::create(['nombre' => 'SECUNDARIA']);

        Grado::create(['nombre' => '1ro Inicial', 'nivel_id' => 1]);
        Grado::create(['nombre' => '2do Inicial', 'nivel_id' => 1]);
        Grado::create(['nombre' => '1ro Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '2do Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '3ro Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '4to Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '5to Primaria', 'nivel_id' => 2]);
        Grado::create(['nombre' => '6to Primaria', 'nivel_id' => 2]);

        Grado::create(['nombre' => '1ro Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '2do Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '3ro Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '4to Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '5to Secundaria', 'nivel_id' => 3]);
        Grado::create(['nombre' => '6to Secundaria', 'nivel_id' => 3]);

        Paralelo::create(['nombre' => 'A', 'grado_id' => 1]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 2]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 3]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 4]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 5]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 6]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 7]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 8]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 9]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 10]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 11]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 12]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 13]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 14]);

        Turno::create(['nombre' => 'Mañana']);
        Turno::create(['nombre' => 'Tarde']);
        Turno::create(['nombre' => 'Noche']);


        Materia::create(['nombre' => 'ARTES PLASTICAS Y VISUALES']);
        Materia::create(['nombre' => 'BIOLOGIA - GEOGRAFIA']);
        Materia::create(['nombre' => 'CIENCIAS SOCIALES']);
        Materia::create(['nombre' => 'COMPUTACIÓN']);
        Materia::create(['nombre' => 'COSMOVISIONES, FILOSOFIA Y PSICOLOGIA']);
        Materia::create(['nombre' => 'EDUCACION FISICA Y DEPORTES']);
        Materia::create(['nombre' => 'EDUCACION MUSICAL']);
        Materia::create(['nombre' => 'FISICA']);
        Materia::create(['nombre' => 'LENGUA CASTELLANA Y ORIGINARIA']);
        Materia::create(['nombre' => 'LENGUA EXTRANJERA']);
        Materia::create(['nombre' => 'MATEMATICA']);
        Materia::create(['nombre' => 'QUIMICA']);
        Materia::create(['nombre' => 'VALORES, ESPIRITUALIDADES Y RELIGIONES']);
        Materia::create(['nombre' => 'TECNICA TECNOLOGIA GENERAL']);
    }
}
