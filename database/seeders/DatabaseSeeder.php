<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Personal;
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

        // Personal administrativo

        $usuarios = [
            ['name' => 'Juan Mendoza', 'email' => 'juan@escuela.com', 'role' => 'DIRECTOR/A GENERAL', 'ci' => '987654321', 'foto' => 'uploads/fotos/juan.png', 'direccion' => 'Av. Libertad 123', 'telefono' => '98765321', 'profesion' => 'Ingeniero'],
            ['name' => 'Carlos Raiz', 'email' => 'carlosraiz@escuela.com', 'role' => 'DIRECTOR/A ACADEMICO', 'ci' => '345345345', 'foto' => 'uploads/fotos/carlos.png', 'direccion' => 'Av. Independiente 223', 'telefono' => '62215321', 'profesion' => 'Administrador'],
            ['name' => 'Maria López', 'email' => 'marialopez@escuela.com', 'role' => 'DIRECTOR/A ADMINISTRATIVO', 'ci' => '456789123', 'foto' => 'uploads/fotos/maria.png', 'direccion' => 'Av. Central 89', 'telefono' => '789456123', 'profesion' => 'Contadora'],
            ['name' => 'Pedro Sánchez', 'email' => 'pedrosanchez@escuela.com', 'role' => 'ADMINISTRADOR', 'ci' => '654321987', 'foto' => 'uploads/fotos/pedro.png', 'direccion' => 'Av. Colon 45', 'telefono' => '321987654', 'profesion' => 'Abogado'],
            ['name' => 'Ana Rodríguez', 'email' => 'anarodriguez@escuela.com', 'role' => 'DOCENTE', 'ci' => '321654987', 'foto' => 'uploads/fotos/ana.png', 'direccion' => 'Av. Sucre 76', 'telefono' => '987654321', 'profesion' => 'Pedagoga'],
            ['name' => 'Diego Torres', 'email' => 'diegotorres@escuela.com', 'role' => 'DOCENTE', 'ci' => '789321654', 'foto' => 'uploads/fotos/diego.png', 'direccion' => 'Av. Bolívar 33', 'telefono' => '654987321', 'profesion' => 'Filósofo'],
            ['name' => 'Lucía Gómez', 'email' => 'luciagomez@escuela.com', 'role' => 'SECRETARIO/A', 'ci' => '951753852', 'foto' => 'uploads/fotos/lucia.png', 'direccion' => 'Av. San Martín 12', 'telefono' => '852753951', 'profesion' => 'Administradora'],
            ['name' => 'Fernando Herrera', 'email' => 'fernandoherrera@escuela.com', 'role' => 'CAJERO/A', 'ci' => '369258147', 'foto' => 'uploads/fotos/fernando.png', 'direccion' => 'Av. Ayacucho 98', 'telefono' => '741852963', 'profesion' => 'Economista'],
            ['name' => 'Andrea Muñoz', 'email' => 'andreamunoz@escuela.com', 'role' => 'REGENTE', 'ci' => '147852369', 'foto' => 'uploads/fotos/andrea.png', 'direccion' => 'Av. Potosí 67', 'telefono' => '963258741', 'profesion' => 'Bióloga'],
            ['name' => 'Sofía Castillo', 'email' => 'sofiacastillo@escuela.com', 'role' => 'ESTUDIANTE', 'ci' => '258369147', 'foto' => 'uploads/fotos/sofia.png', 'direccion' => 'Av. Oruro 21', 'telefono' => '159753852', 'profesion' => 'Estudiante'],
        ];

        foreach ($usuarios as $usuario) {
            // Crear usuario
            $user = User::create([
                'name' => $usuario['name'],
                'email' => $usuario['email'],
                'password' => Hash::make('987654321')
            ])->assignRole($usuario['role']);

            // Crear personal vinculado al usuario
            Personal::create([
                'usuario_id' => $user->id,
                'tipo' => 'administrativo',
                'nombres' => explode(' ', $usuario['name'])[0], // Extrae el primer nombre
                'apellidos' => explode(' ', $usuario['name'])[1], // Extrae el apellido
                'ci' => $usuario['ci'],
                'fecha_nacimiento' => now()->subYears(rand(25, 50))->format('Y-m-d'), // Fecha aleatoria
                'direccion' => $usuario['direccion'],
                'telefono' => $usuario['telefono'],
                'profesion' => $usuario['profesion'],
                'foto' => $usuario['foto']
            ]);
        }

        // Personal docente

        $usuarios = [
            ['name' => 'Juan Pérez', 'email' => 'juanperez@escuela.com', 'role' => 'DOCENTE', 'ci' => '123456789', 'foto' => 'uploads/fotos/juan.png', 'direccion' => 'Av. Universitaria 100', 'telefono' => '987654321', 'profesion' => 'Matemático'],
            ['name' => 'Carlos Ramírez', 'email' => 'carlosramirez@escuela.com', 'role' => 'DOCENTE', 'ci' => '234567890', 'foto' => 'uploads/fotos/carlos.png', 'direccion' => 'Av. Estudiantes 200', 'telefono' => '876543210', 'profesion' => 'Físico'],
            ['name' => 'Ana Martínez', 'email' => 'anamartinez@escuela.com', 'role' => 'DOCENTE', 'ci' => '345678901', 'foto' => 'uploads/fotos/ana.png', 'direccion' => 'Av. Ciencias 300', 'telefono' => '765432109', 'profesion' => 'Química'],
            ['name' => 'Pedro Fernández', 'email' => 'pedrofernandez@escuela.com', 'role' => 'DOCENTE', 'ci' => '456789012', 'foto' => 'uploads/fotos/pedro.png', 'direccion' => 'Av. Docentes 400', 'telefono' => '654321098', 'profesion' => 'Biología'],
            ['name' => 'María Castillo', 'email' => 'mariacastillo@escuela.com', 'role' => 'DOCENTE', 'ci' => '567890123', 'foto' => 'uploads/fotos/maria.png', 'direccion' => 'Av. Educación 500', 'telefono' => '543210987', 'profesion' => 'Historia'],
            ['name' => 'Diego López', 'email' => 'diegolopez@escuela.com', 'role' => 'DOCENTE', 'ci' => '678901234', 'foto' => 'uploads/fotos/diego.png', 'direccion' => 'Av. Filosofía 600', 'telefono' => '432109876', 'profesion' => 'Filosofía'],
            ['name' => 'Lucía Herrera', 'email' => 'luciaherrera@escuela.com', 'role' => 'DOCENTE', 'ci' => '789012345', 'foto' => 'uploads/fotos/lucia.png', 'direccion' => 'Av. Letras 700', 'telefono' => '321098765', 'profesion' => 'Lengua'],
            ['name' => 'Fernando Gómez', 'email' => 'fernandogomez@escuela.com', 'role' => 'DOCENTE', 'ci' => '890123456', 'foto' => 'uploads/fotos/fernando.png', 'direccion' => 'Av. Cultura 800', 'telefono' => '210987654', 'profesion' => 'Música'],
            ['name' => 'Andrea Torres', 'email' => 'andreatorres@escuela.com', 'role' => 'DOCENTE', 'ci' => '901234567', 'foto' => 'uploads/fotos/andrea.png', 'direccion' => 'Av. Artes 900', 'telefono' => '109876543', 'profesion' => 'Artes Plásticas'],
            ['name' => 'Sofía Muñoz', 'email' => 'sofiamunoz@escuela.com', 'role' => 'DOCENTE', 'ci' => '012345678', 'foto' => 'uploads/fotos/sofia.png', 'direccion' => 'Av. Deportes 1000', 'telefono' => '987654320', 'profesion' => 'Educación Física'],
        ];
        
        foreach ($usuarios as $usuario) {
            // Crear usuario
            $user = User::create([
                'name' => $usuario['name'],
                'email' => $usuario['email'],
                'password' => Hash::make('987654321')
            ])->assignRole($usuario['role']);
        
            // Crear personal vinculado al usuario
            Personal::create([
                'usuario_id' => $user->id,
                'tipo' => 'docente', // 💡 Ahora el tipo es "docente"
                'nombres' => explode(' ', $usuario['name'])[0], // Extrae el primer nombre
                'apellidos' => explode(' ', $usuario['name'])[1], // Extrae el apellido
                'ci' => $usuario['ci'],
                'fecha_nacimiento' => now()->subYears(rand(25, 50))->format('Y-m-d'), // Fecha aleatoria
                'direccion' => $usuario['direccion'],
                'telefono' => $usuario['telefono'],
                'profesion' => $usuario['profesion'],
                'foto' => $usuario['foto']
            ]);
        }
        
    }
}
