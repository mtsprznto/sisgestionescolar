@extends('adminlte::page')

@section('title', 'Estudiante')

@section('content_header')
<h1>Datos del estudiante</h1>
<hr>
@stop

@section('content')

<!-- Apoderado -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Datos del apoderado</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body" id="datos_ppff">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Nombres</label>
                            <p id="nombres">{{$estudiante->ppff->nombres}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Apellidos</label>
                            <p id="apellidos">{{$estudiante->ppff->apellidos}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Carnet Identidad</label>
                            <p id="ci">{{$estudiante->ppff->ci}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha de nacimiento</label>
                            <p id="fecha_nacimiento">{{$estudiante->ppff->fecha_nacimiento}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <p id="telefono">{{$estudiante->ppff->telefono}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Parentesco</label>
                            <p id="parentesco">{{$estudiante->ppff->parentesco}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Ocupacion</label>
                            <p id="ocupacion">{{$estudiante->ppff->ocupacion}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Direccion</label>
                            <p id="direccion">{{$estudiante->ppff->direccion}}</p>
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
                <h3 class="card-title">Datos del estudiante</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <input type="text" name="ppff_id" id="ppff_id" hidden>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fotografia</label><b> (*)</b>
                            <div class="input-group mb-3 foto-container">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                </div>

                                <br>
                                <img id="preview" src="{{asset($estudiante->foto)}}"
                                    style="max-width: 150px; margin-top: 10px;">
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
                                            <option
                                                value="{{$estudiante->usuario->roles->pluck('name')->implode(', ')}}">
                                                {{$estudiante->usuario->roles->pluck('name')->implode(', ')}}
                                            </option>
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
                                            value="{{$estudiante->nombres}}" placeholder="Ingrese nombres..." required
                                            disabled>
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
                                        <input type="text" class="form-control" name="apellidos" id="apellidos"
                                            value="{{$estudiante->apellidos}}" placeholder="Ingrese apellidos..."
                                            required disabled>
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
                                            value="{{$estudiante->ci}}" placeholder="Ingrese ci..." required disabled>
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
                                        <input type="date" class="form-control" name="fecha_nacimiento"
                                            id="fecha_nacimiento" value="{{$estudiante->fecha_nacimiento}}"
                                            placeholder="Ingrese fecha nacimiento..." required disabled>
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
                                            value="{{$estudiante->telefono}}" placeholder="Ingrese telefono..." required
                                            disabled>
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
                                        <select name="genero" id="genero" class="form-control" disabled>
                                            <option value="{{$estudiante->genero}}">{{$estudiante->genero}}</option>
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
                                            value="{{$estudiante->usuario->email}}" placeholder="Ingrese email..."
                                            required disabled>
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
                                        <input type="text" class="form-control" name="direccion" id="direccion"
                                            value="{{$estudiante->direccion}}" placeholder="Ingrese direccion..."
                                            required disabled>
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
                            <a href="{{url('/admin/estudiantes')}}" class="btn btn-default"><i
                                    class="fas fa-arrow-left"></i> Volver</a>
                        </div>
                    </div>
                </div>
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