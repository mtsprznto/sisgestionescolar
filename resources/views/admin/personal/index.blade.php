@extends('adminlte::page')

@section('title', 'Personal')

@section('content_header')
<h1>Listado de personal: {{$tipo}}</h1>
<hr>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Personal registrado</h3>

                <div class="card-tools">
                    <a href="{{url('/admin/personal/create/'.$tipo)}}" class="btn btn-primary">Crear nuevo</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table_bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Rol</th>
                            <th>Apellidos y nombres</th>
                            <th>Carnet Identidad</th>
                            <th>Fecha de nacimiento</th>
                            <th>Telefono</th>
                            <th>Profesion</th>
                            <th>Correo</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($personals as $personal )

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$personal->usuario->roles->pluck('name')->implode(', ')}}</td>
                            <td>{{$personal->apellidos}} {{$personal->nombres}}</td>
                            <td>{{$personal->ci}}</td>
                            <td>{{$personal->fecha_nacimiento}}</td>
                            <td>{{$personal->telefono}}</td>
                            <td>{{$personal->profesion}}</td>
                            <td>{{$personal->usuario->email}}</td>
                            <td>
                                <img src="{{ url($personal->foto) }}" width="100px" alt="foto">
                            </td>
                            <td>
                                <div class="row">

                                    <a href="{{url('/admin/personal/show/'.$personal->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a>
                                    <a href="{{url('/admin/personal/'.$personal->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> Editar</a>

                                    <form action="{{ url('/admin/personal/'.$personal->id) }}" method="POST" id="miFormulario{{ $personal->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn" data-id="{{ $personal->id }}">
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
</style>

@stop

@section('js')
<script>
    $(function() {
        $('#example1').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay informacion",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Personal",
                "infoEmpty": "Mostrando 0 a 0 de Personal",
                "infoFiltered": "(Filtrado de _MAX_ total Personal)",
                "lengthMenu": "Mostrar _MENU_ Personal",
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
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
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