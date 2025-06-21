@extends('adminlte::page')

@section('title', 'Estudiantes')

@section('content_header')
<h1>Listado de estudiantes</h1>
<hr>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Estudiantes registrados</h3>

                <div class="card-tools">
                    <a href="{{url('/admin/estudiantes/nuevos/create')}}" class="btn btn-primary">Crear nuevo</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($estudiantes as $estudiante )

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            
                            <td>
                                <img src="{{ url($estudiante->foto) }}" width="100px" alt="foto">
                            </td>
                            <td>
                                <div class="row">

                                    <a href="{{url('/admin/estudiantes/'.$estudiante->id.'/formaciones')}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-tasks"></i> Formación
                                    </a>
                                    <a href="{{url('/admin/estudiantes/show/'.$estudiante->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a>
                                    <a href="{{url('/admin/estudiantes/'.$estudiante->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> Editar</a>

                                    <form action="{{ url('/admin/estudiantes/'.$estudiante->id) }}" method="POST" id="miFormulario{{ $estudiante->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn" data-id="{{ $estudiante->id }}">
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

            <!-- /.card-body -->
        </div>

    </div>


</div>
@stop

@section('css')

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

    table {
        width: 100% !important;
        table-layout: fixed;
        /* Hace que las columnas tengan un ancho fijo */
    }

    thead {
        width: 100% !important;
    }

    th,
    td {
        text-align: start;
        overflow: hidden;
        text-overflow: ellipsis;
        /* Trunca el texto largo con "..." */
        white-space: nowrap;
        /* Evita que el texto se divida en varias líneas */
    }

    img {
        max-width: 100px;
        /* Ajusta el tamaño máximo de las imágenes */
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

    tbody tr:hover {
        background-color: #f1f1f1;
        /* Resalta la fila al pasar el cursor */
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "infoEmpty": "Mostrando 0 a 0 de Estudiantes",
                "infoFiltered": "(Filtrado de _MAX_ total Estudiantes)",
                "lengthMenu": "Mostrar _MENU_ Estudiantes",
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