@extends('adminlte::page')

@section('title', 'Personal')

@section('content_header')
<h1>Listado de personal: {{$tipo}}</h1>
<hr>
@stop

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Personal registrado</h3>

                <div class="card-tools">
                    <a href="{{url('/admin/personal/create/'.$tipo)}}" class="btn btn-primary">Crear nuevo</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="" class="table table_bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($personals as $personal )

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <div class="row">

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
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@if ($errors->any())
<script>

</script>

@endif
@stop