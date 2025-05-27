@extends('adminlte::page')

@section('title', 'Turnos')

@section('content_header')
<h1>Listado de turnos</h1>
<hr>
@stop

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Turnos registrados</h3>

                <div class="card-tools">
                    <a href="{{url('/admin/turnos/create')}}" class="btn btn-primary">Crear nuevo turno</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="" class="table table_bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($turnos as $turno )

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$turno->nombre}}</td>
                            <td>

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

</script>

@endif
@stop