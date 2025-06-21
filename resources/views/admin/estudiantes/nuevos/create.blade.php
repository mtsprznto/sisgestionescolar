@extends('adminlte::page')

@section('title', 'Estudiante')

@section('content_header')
<h1>Creacion de un nuevo estudiante</h1>
<hr>
@stop

@section('content')

<!-- Apoderado -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Llene los datos del apoderado</h3>
                <div class="card-tools">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalCreate">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="ModalCreateLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalCreateLabel">Apoderados</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body table-responsive">
                                    <table id="example1"
                                        class="table table-bordered table-striped table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>Apellidos y nombres</th>
                                                <th>Carnet Identidad</th>
                                                <th>Fecha de nacimiento</th>
                                                <th>Telefono</th>
                                                <th>Parentesco</th>
                                                <th>Ocupación</th>
                                                <th>Dirección</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($ppffs as $ppff)

                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$ppff->apellidos}} {{$ppff->nombres}}</td>
                                                    <td>{{$ppff->ci}}</td>
                                                    <td>{{$ppff->fecha_nacimiento}}</td>
                                                    <td>{{$ppff->telefono}}</td>
                                                    <td>{{$ppff->parentesco}}</td>
                                                    <td>{{$ppff->ocupacion}}</td>
                                                    <td>{{$ppff->direccion}}</td>
                                                    <td
                                                        style="width: 1%; white-space: nowrap; padding: 8px; position: relative;">
                                                        <button class="btn btn-info btn-sm btn-seleccionar"
                                                            data-nombres="{{$ppff->nombres}}"
                                                            data-apellidos="{{$ppff->apellidos}}" data-ci="{{$ppff->ci}}"
                                                            data-fecha_nacimiento="{{$ppff->fecha_nacimiento}}"
                                                            data-telefono="{{$ppff->telefono}}"
                                                            data-parentesco="{{$ppff->parentesco}}"
                                                            data-ocupacion="{{$ppff->ocupacion}}"
                                                            data-direccion="{{$ppff->direccion}}"
                                                            data-id="{{$ppff->id}}"
                                                            style="min-width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                            Seleccionar
                                                        </button>
                                                    </td>
                                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                    <script>
                                                        document.addEventListener("DOMContentLoaded", function () {
                                                            document.querySelectorAll(".delete-btn").forEach(button => {
                                                                button.addEventListener("click", function (event) {
                                                                    event.preventDefault();
                                                                    let id = this.getAttribute("data-id");

                                                                    Swal.fire({
                                                                        title: '¿Desea eliminar este registro?',
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#ModalCreatePpff">
                                        Crear nuevo apoderado
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="ModalCreatePpff" tabindex="-1"
                                        aria-labelledby="ModalCreatePpffLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header"
                                                    style="background-color:rgb(23, 34, 184); color: #fff;">
                                                    <h5 class="modal-title" id="ModalCreatePpffLabel">Registro de un
                                                        nuevo apoderado</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('admin/estudiantes/ppff/create') }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Nombres</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nombres" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Apellidos</label>
                                                                    <input type="text" class="form-control"
                                                                        name="apellidos" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Carnet de identidad</label>
                                                                    <input type="text" class="form-control" name="ci"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Fecha de nacimiento</label>
                                                                    <input type="date" class="form-control"
                                                                        name="fecha_nacimiento" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Telefono</label>
                                                                    <input type="text" class="form-control"
                                                                        name="telefono" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Parentesco</label>
                                                                    <input type="text" class="form-control"
                                                                        name="parentesco" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Ocupacion</label>
                                                                    <input type="text" class="form-control"
                                                                        name="ocupacion" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Direccion</label>
                                                                    <input type="text" class="form-control"
                                                                        name="direccion" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Registrar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="datos_ppff" style="display: none;">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Nombres</label>
                            <p id="nombres"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Apellidos</label>
                            <p id="apellidos"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Carnet Identidad</label>
                            <p id="ci"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha de nacimiento</label>
                            <p id="fecha_nacimiento"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <p id="telefono"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Parentesco</label>
                            <p id="parentesco"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Ocupacion</label>
                            <p id="ocupacion"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Direccion</label>
                            <p id="direccion"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


</div>


<!-- Estudiante -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos del formulario</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{url('/admin/estudiantes/nuevos/create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="ppff_id" id="ppff_id" hidden>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fotografia</label><b> (*)</b>
                                <div class="input-group mb-3 foto-container">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>

                                    <input type="file" onchange="mostrarImagen(event)" accept="image/*" name="foto"
                                        required>
                                    <br>
                                    <img id="preview" src="" style="max-width: 150px; margin-top: 10px;">
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
                                            <select name="rol" id="rol_select" class="form-control">
                                                <option value="">Seleccione un rol...</option>
                                                @foreach ($roles as $rol)
                                                    @if ($rol->name == 'ESTUDIANTE')
                                                        <option value="{{ $rol->name }}" {{$rol->name == "ESTUDIANTE" ? 'selected' : ''}}>{{ $rol->name }}</option>
                                                    @else
                                                    @endif
                                                @endforeach
                                                <option value="">No existe el rol estudiante</option>
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
                                            <input type="text" class="form-control" name="nombres" id="nombres"
                                                value="{{old('nombres')}}" placeholder="Ingrese nombres..." required>
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
                                                <span class="input-group-text"><i
                                                        class="fas fa-user-friends"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="apellidos" id="apellidos"
                                                value="{{old('apellidos')}}" placeholder="Ingrese apellidos..."
                                                required>
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
                                            <input type="text" class="form-control" name="ci" id="ci"
                                                value="{{old('ci')}}" placeholder="Ingrese ci..." required>
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
                                                <span class="input-group-text"><i
                                                        class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="fecha_nacimiento"
                                                id="fecha_nacimiento" value="{{old('fecha_nacimiento')}}"
                                                placeholder="Ingrese fecha nacimiento..." required>
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
                                            <input type="text" class="form-control" name="telefono" id="telefono"
                                                value="{{old('telefono')}}" placeholder="Ingrese telefono..." required>
                                        </div>
                                        @error('telefono')
                                            <small class="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Genero</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-users"></i>
                                                </span>
                                            </div>
                                            <select name="genero" id="genero" class="form-control">
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                        </div>
                                        @error('genero')
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
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="{{old('email')}}" placeholder="Ingrese email..." required>
                                        </div>
                                        @error('email')
                                            <small class="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">Direccion</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map-pin"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="direccion" id="direccion"
                                                value="{{old('direccion')}}" placeholder="Ingrese direccion..."
                                                required>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('/admin/personal/')}}" class="btn btn-default"><i
                                        class="fas fa-arrow-left"></i> Cancelar</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                    Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
<style>
    #example1_wrapper .dt-buttons {
        background-color: transparent;
        box-shadow: none;
        border: none;
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 15px;

    }

    #example1_wrapper .btn {
        color: #fff;
        border-radius: 4px;
        padding: 5px 15px;
        font-size: 14px;

    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
        border: none;
    }

    .btn-default {
        background-color: #6e7176;
        color: #212529;
        border: none;
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table {
        min-width: 100%;
        width: auto;
    }

    .table th,
    .table td {
        white-space: nowrap;
    }

    .table td {
        white-space: nowrap;
        padding: 8px;
        vertical-align: middle;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
        white-space: nowrap;
    }

    .foto-container {
        display: flex;
        flex-wrap: wrap;
        /* 💡 Permite que los elementos hijos se envuelvan */
        gap: 10px;
        /* 💡 Espacio entre los elementos */
        align-items: center;
        /* 💡 Asegura alineación uniforme */
    }

    .foto-container input,
    .foto-container img {
        flex: 1 1 auto;
        max-width: 100%;
        /* 💡 Evita desbordes */
    }

    .foto-container {
        display: flex;
        flex-wrap: wrap;
        /* 💡 Permite que los elementos hijos se envuelvan */
        gap: 10px;
        /* 💡 Espacio entre los elementos */
        align-items: center;
        /* 💡 Asegura alineación uniforme */
    }

    .foto-container input,
    .foto-container img {
        flex: 1 1 auto;
        max-width: 100%;
        /* 💡 Evita desbordes */
    }



    /* Asegurar que la columna de acciones tenga un ancho fijo */
    table.dataTable thead th:last-child,
    table.dataTable tbody td:last-child {
        width: 120px !important;
        min-width: 120px !important;
        max-width: 120px !important;
        text-align: center;
    }

    /* Asegurar que el botón ocupe todo el ancho de su celda */
    table.dataTable tbody td:last-child .btn {
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: inline-block;
    }

    /* Ajustar el padding en móviles */
    @media (max-width: 768px) {
        .dataTables_wrapper .dataTables_scroll {
            width: 100%;
            margin: 0;
        }

        .dataTables_scrollBody {
            position: relative !important;
            overflow-x: auto !important;
            overflow-y: auto !important;
        }
    }
</style>

@stop

@section('js')
<script>
    $(function () {

        $('.btn-seleccionar').click(function () {
            var nombres = $(this).data('nombres');
            var apellidos = $(this).data('apellidos');
            var ci = $(this).data('ci');
            var fecha_nacimiento = $(this).data('fecha_nacimiento');
            var telefono = $(this).data('telefono');
            var parentesco = $(this).data('parentesco');
            var ocupacion = $(this).data('ocupacion');
            var direccion = $(this).data('direccion');
            var id = $(this).data('id');
            $('#nombres').text(nombres);
            $('#apellidos').text(apellidos);
            $('#ci').text(ci);
            $('#fecha_nacimiento').text(fecha_nacimiento);
            $('#telefono').text(telefono);
            $('#parentesco').text(parentesco);
            $('#ocupacion').text(ocupacion);
            $('#direccion').text(direccion);
            $('#ppff_id').val(id);
            $('#datos_ppff').css('display', 'block');
            $('#ModalCreate').modal('hide');
        })






        $('#example1').DataTable({
            "responsive": true,
            "scrollX": true,
            "autoWidth": true,
            "pageLength": 5,
            "responsive": true,
            "lengthChange": true,
            "language": {
                "emptyTable": "No hay informacion",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Apoderado",
                "infoEmpty": "Mostrando 0 a 0 de Apoderado",
                "infoFiltered": "(Filtrado de _MAX_ total Apoderado)",
                "lengthMenu": "Mostrar _MENU_ Apoderado",
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