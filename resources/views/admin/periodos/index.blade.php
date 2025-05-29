@extends('adminlte::page')

@section('title', 'Periodos academicos')

@section('content_header')
<h1>Listado de periodos</h1>
<hr>
@stop

@section('content')

<div class="row">
    <div class="col-md-10">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Periodos registrados</h3>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Registro de un nuevo periodo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{url('/admin/periodos/create')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Gestiones</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                        </div>
                                                        <select name="gestion_id_create" id="gestion_id_create" class="form-control" required>
                                                            <option value="">Selecciona una gestion</option>
                                                            @foreach ($gestiones as $gestion)
                                                            <option value="{{$gestion->id}}">{{$gestion->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('gestion_id_create')
                                                    <small style="color: red">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nombre del periodo</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="nombre_create" value="{{old('nombre')}}" placeholder="Escribe aqui..." required>

                                                    </div>
                                                    @error('nombre')
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
                            <th>Gestion</th>
                            <th>Periodos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($gestiones as $gestion )

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$gestion->nombre}}</td>
                            <td>
                                @foreach ($gestion->periodos as $periodo)
                                <span class="badge badge-info">{{$periodo->nombre}}</span><br>
                                @endforeach

                            </td>

                            <td>
                                @foreach ($gestion->periodos as $periodo)
                                <div class="row d-flex justify-center">

                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalUpdate{{ $periodo->id }}">
                                        <i class="fas fa-pencil-alt"></i> 
                                    </button>

                                    <form action="{{ url('/admin/periodos/'.$periodo->id) }}" method="POST" id="miFormulario{{ $periodo->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn ml-2" data-id="{{ $periodo->id }}">
                                            <i class="fas fa-trash"></i> 
                                        </button>
                                    </form>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="ModalUpdate{{ $periodo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edición de un periodo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/periodos/'.$periodo->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Gestiones</label>
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                                    </div>
                                                                    <select name="gestion_id" id="gestion_id" class="form-control" required>
                                                                        <option value="">Selecciona una gestion</option>
                                                                        @foreach ($gestiones as $gestion)
                                                                        <option value="{{$gestion->id}}" {{$gestion->id == $periodo->gestion_id ? "selected": ""}}>
                                                                            {{$gestion->nombre}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @error('gestion_create')
                                                                <small style="color: red">{{$message}}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nombre del periodo</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                                            <input type="text" class="form-control" name="nombre" value="{{ $periodo->nombre }}" placeholder="Escribe aquí..." required>
                                                        </div>
                                                        @error('nombre')
                                                        <small style="color: red">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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