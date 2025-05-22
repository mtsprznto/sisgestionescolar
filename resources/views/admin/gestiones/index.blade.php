@extends('adminlte::page')

@section('title', 'Dashboard')

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
            <img src="{{url('/img/calendario.gif')}}" width="70px" height="70px" alt="calendario">
            <div class="info-box-content">
                <span class="info-box-text"><b>Gestiones Educativa</b></span>

                <span class="info-box-number" style="color: #007bff; font-size:20pt">{{$gestion->nombre}}</span>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{url('/admin/gestiones/'.$gestion->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> Editar</a>
                            <a href="{{url('/admin/gestiones/edit')}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Borrar</a>
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
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
</script>
@stop