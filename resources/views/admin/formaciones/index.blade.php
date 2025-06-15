@extends('adminlte::page')

@section('title', 'Datos Personal')

@section('content_header')
<h1>Formación del personal {{$personal->tipo}}</h1>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <a href="{{url('/admin/personal/'.$personal->tipo)}}" class="btn btn-default"><i class="fas fa-arrow-left"></i> Volver</a>
        </div>
    </div>
</div>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Datos del formulario</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fotografia</label><b> (*)</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                </div>


                                <br>
                                <img id="preview" src="{{ url($personal->foto) }}" style="max-width: 150px; margin-top: 10px;">
                                <script>
                                    const mostrarImagen = e =>
                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                </script>
                            </div>
                            @error('foto')
                            <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombre del rol</label>
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <select name="rol" id="rol_select" class="form-control" disabled>
                                            <option value="">{{ $personal->usuario->roles->pluck('name')->implode(', ') }}</option>

                                        </select>
                                    </div>
                                    @error('rol')
                                    <small class="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nombres" id="nombres" value="{{old('nombres', $personal->nombres)}}" placeholder="Ingrese nombres..." disabled>
                                    </div>
                                    @error('nombres')
                                    <small class="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{old('apellidos', $personal->apellidos)}}" placeholder="Ingrese apellidos..." disabled>
                                    </div>
                                    @error('apellidos')
                                    <small class="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Cedula de identidad</label>
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ci" id="ci" value="{{old('ci', $personal->ci)}}" placeholder="Ingrese ci..." disabled>
                                    </div>
                                    @error('ci')
                                    <small class="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha de nacimiento</label>
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{old('fecha_nacimiento', $personal->fecha_nacimiento)}}" placeholder="Ingrese fecha nacimiento..." disabled>
                                    </div>
                                    @error('fecha_nacimiento')
                                    <small class="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Telefono</label>
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="telefono" id="telefono" value="{{old('telefono', $personal->telefono)}}" placeholder="Ingrese telefono..." disabled>
                                    </div>
                                    @error('telefono')
                                    <small class="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Profesion</label>
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-briefcase"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="profesion" id="profesion" value="{{old('profesion',$personal->profesion)}}" placeholder="Ingrese profesion..." disabled>
                                    </div>
                                    @error('profesion')
                                    <small class="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="email" value="{{old('email', $personal->usuario->email)}}" placeholder="Ingrese email..." disabled>
                                    </div>
                                    @error('email')
                                    <small class="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Direccion</label>
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-pin"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="direccion" id="direccion" value="{{old('direccion', $personal->direccion)}}" placeholder="Ingrese direccion..." disabled>
                                    </div>
                                    @error('direccion')
                                    <small class="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Formaciones registradas</h3>
                <div class="card-tools">
                    <a href="{{url('/admin/personal/'.$personal->id.'/formaciones/create/')}}" class="btn btn-primary">Registrar nuevo</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Titulo</th>
                            <th>Institución</th>
                            <th>Nivel</th>
                            <th>Fecha de graduación</th>
                            <th>Archivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($formaciones as $formacion )

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$formacion->titulo}}</td>
                            <td>{{$formacion->institucion}}</td>
                            <td>{{$formacion->nivel}}</td>
                            <td>{{$formacion->fecha_graduacion}}</td>
                            <td>{{$formacion->archivo}}</td>
                            <td>
                                <div class="row">



                                    <a href="{{url('/admin/personal/'.$formacion->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> Editar</a>

                                    <form action="{{ url('/admin/personal/'.$formacion->id) }}" method="POST" id="miFormulario{{ $formacion->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn" data-id="{{ $formacion->id }}">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>


                            </td>
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    document.querySelectorAll(".delete-btn").forEach(button => {
                                        button.addEventListener("click", function(event) {
                                            event.preventDefault();
                                            let id = this.getAttribute("data-id");

                                            Swal.fire({
                                                title: '¿Desea eliminar esta formacion?',
                                                icon: 'question',
                                                showDenyButton: true,
                                                confirmButtonText: 'Eliminar',
                                                confirmButtonColor: '#a5161d',
                                                denyButtonColor: '#270a0a',
                                                denyButtonText: 'Cancelar',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.getElementById('miFormulario' + id).submit();
                                                }
                                            });
                                        });
                                    });
                                });
                            </script>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@stop

@section('css')

<style>
    #example1_wrapper .dt-buttons {
        box-shadow: none;
        border: none;
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 15px;

    }

    #example1_wrapper .btn {
        border-radius: 4px;
        padding: 5px 15px;
        font-size: 14px;

    }





    table {
        width: 100% !important;
        table-layout: fixed;
    }

    thead {
        width: 100% !important;
    }

    th,
    td {
        text-align: start;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    img {
        max-width: 100px;
        height: auto;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        /* Permite que los botones se ajusten si son demasiados */
        justify-content: start;
    }

    .row a,
    .row button {
        flex: 1;
        /* Hace que todos los botones ocupen el mismo espacio */
        margin: 5px;
        /* Espaciado entre botones */
        text-align: start;
        /* Centra el texto dentro del botón */
        min-width: 120px;
        /* Define un ancho mínimo para los botones */
        max-width: 150px;
        /* Define un ancho máximo para los botones */
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        /* Permite que los botones se ajusten si son demasiados */
        justify-content: start;
        /* Centra los botones dentro de la fila */
    }

    .table-responsive {
        overflow-x: auto;
        /* Agrega scroll horizontal si la tabla se desborda */
    }

    table {
        width: 100%;
        table-layout: fixed;
        /* Hace que las columnas tengan un ancho fijo */
        border-collapse: collapse;
        /* Asegura que las celdas estén alineadas */
    }

    th,
    td {
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        /* Trunca el texto largo con "..." */
        white-space: nowrap;
        /* Evita que el texto se divida en varias líneas */
        box-sizing: border-box;
        /* Asegura que el padding no afecte el tamaño de las celdas */
    }

    thead th {
        background-color: #f8f9fa;
        /* Color de fondo para diferenciar el encabezado */
        position: sticky;
        /* Hace que el encabezado sea fijo al hacer scroll */
        top: 0;
        z-index: 2;
        /* Asegura que el encabezado esté por encima del contenido */
    }
</style>
@stop

@section('js')
<script>
    $(function() {
        $('#example1').DataTable({
            "responsive": true,
            "scrollX": true,
            "autoWidth": true,
            "pageLength": 5,
            "responsive": true,
            "lengthChange": true,
            "language": {
                "emptyTable": "No hay informacion",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Formaciones",
                "infoEmpty": "Mostrando 0 a 0 de Formaciones",
                "infoFiltered": "(Filtrado de _MAX_ total Formaciones)",
                "lengthMenu": "Mostrar _MENU_ Formaciones",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },

            buttons: [{
                    text: '<i class="fas fa-copy"></i> Copiar',
                    extend: "copy",
                    className: "btn btn-default"
                },
                {
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    extend: "pdf",
                    className: "btn btn-danger"
                },
                {
                    text: '<i class="fas fa-file-csv"></i> CSV',
                    extend: "csv",
                    className: "btn btn-info"
                },
                {
                    text: '<i class="fas fa-file-excel"></i> EXCEL',
                    extend: "excel",
                    className: "btn btn-success"
                },
                {
                    text: '<i class="fas fa-print"></i> IMPRIMIR',
                    extend: "print",
                    className: "btn btn-warning"
                },
            ]
        }).buttons().container().appendTo('#example1_wrapper .row:eq(0)')

    })
</script>
@stop