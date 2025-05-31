@extends('adminlte::page')

@section('title', 'Gestiones')

@section('content_header')
<h1>Listado de gestiones educativas</h1>
<hr>
<a href="{{url('/admin/gestiones/create')}}" class="btn btn-primary">Crear nueva gestion</a>
@stop

@section('content')
<div class="row">

    @foreach ($gestiones as $gestion )

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{url('/img/colegio.gif')}}" width="70px" height="70px" alt="calendario">
            <div class="info-box-content">
                <span class="info-box-text"><b>Gestiones Educativas</b></span>

                <span class="info-box-number" style="color: #007bff; font-size:20pt">{{$gestion->nombre}}</span>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <form action="{{url('/admin/gestiones/'.$gestion->id)}}" method="post" id="form_{{$gestion->id}}">
                                @csrf
                                @method('DELETE')
                                <a href="{{url('/admin/gestiones/'.$gestion->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> Editar</a>
                                <button type="submit" class="btn btn-danger btn-sm delete-btn" data-id="{{ $gestion->id }}">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>

                            </form>

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
                                                    document.getElementById('form_' + id).submit();
                                                }
                                            });
                                        });
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>


</div>

@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    
</script>
@stop