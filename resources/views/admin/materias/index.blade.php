@extends('adminlte::page')

@section('title', 'Materias')

@section('content_header')
<h1>Listado de Materias</h1>
<hr>
@stop

@section('content')

<div class="row">
    <div class="col-md-10">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Materias registradas</h3>

                <div class="card-tools">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">
                        Crear nuevo
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Registro de una nueva materia</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{url('/admin/materias/create')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nombre de la materia</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="nombre_create" value="{{old('nombre_create')}}" placeholder="Escribe aqui..." required>

                                                    </div>
                                                    @error('nombre_create')
                                                    <small style="color: red">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="" class="table table_bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Materia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materias as $materia )

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$materia->nombre}}</td>

                            <td>
                                <div class="row d-flex justify-center">

                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalUpdate{{ $materia->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>

                                    <form action="{{ url('/admin/materias/'.$materia->id) }}" method="POST" id="miFormulario{{ $materia->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn ml-2" data-id="{{ $materia->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </div>


                                <!-- Modal -->
                                <div class="modal fade" id="ModalUpdate{{ $materia->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edición de la materia</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/materias/'.$materia->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                   
                                                    <div class="form-group">
                                                        <label for="">Nombre de la materia</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                                                            <input type="text" class="form-control" name="nombre" value="{{ $materia->nombre }}" placeholder="Escribe aquí..." required>
                                                        </div>
                                                        @error('nombre')
                                                        <small style="color: red">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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
                            </td>

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
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@if ($errors->any())
<script>
    $(document).ready(function() {
        let modalId = "{{ session('modal_id') }}"; // Obtener el ID del modal desde la sesión

        if (modalId) {
            $('#ModalUpdate' + modalId).modal('show'); // Muestra el modal de actualización si hay un ID
        } else {
            $('#ModalCreate').modal('show'); // Muestra el modal de creación si no hay ID
        }
    });
</script>

@endif
@stop