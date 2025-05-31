@extends('adminlte::page')

@section('title', 'Paralelos')

@section('content_header')
<h1>Listado de paralelos</h1>
<hr>
@stop

@section('content')

<div class="row">
    <div class="col-md-10">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Paralelos registrados</h3>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Registro de un nuevo paralelo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{url('/admin/paralelos/create')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Grados</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                        </div>
                                                        <select name="grado_id_create" id="grado_id_create" class="form-control" required>
                                                            <option value="">Selecciona un grado</option>
                                                            @foreach ($grados as $grado)
                                                            <option value="{{$grado->id}}">{{$grado->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('grado_id_create')
                                                    <small style="color: red">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nombre del paralelo</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-clone"></i></span>
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
                            <th>Grados</th>
                            <th>Paralelos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grados as $grado )

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$grado->nombre}}</td>
                            <td>
                                @foreach ($grado->paralelos as $paralelo)

                                <span class="badge badge-info">{{$paralelo->nombre}}</span><br>
                                @endforeach

                            </td>
                            <td>
                                @foreach ($grado->paralelos as $paralelo)
                                <div class="row d-flex justify-center">

                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalUpdate{{ $paralelo->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>

                                    <form action="{{ url('/admin/paralelos/'.$paralelo->id) }}" method="POST" id="miFormulario{{ $paralelo->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn ml-2" data-id="{{ $paralelo->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </div>


                                <!-- Modal -->
                                <div class="modal fade" id="ModalUpdate{{ $paralelo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edición del paralelo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/paralelos/'.$paralelo->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Grados</label>
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="fas fa-list-alt"></i>
                                                                        </span>
                                                                    </div>
                                                                    <select name="grado_id" id="grado_id" class="form-control" required>
                                                                        <option value="">Selecciona un grado</option>
                                                                        @foreach ($grados as $grado)
                                                                        <option value="{{$grado->id}}" {{$grado->id == $grado->id ? "selected" : ""}}>
                                                                            {{$grado->nombre}}
                                                                        </option>


                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @error('grado_id')
                                                                <small style="color: red">{{$message}}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nombre del paralelo</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-clone"></i>
                                                            </span>
                                                            <input type="text" class="form-control" name="nombre" value="{{ $paralelo->nombre }}" placeholder="Escribe aquí..." required>
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
                                @endforeach
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