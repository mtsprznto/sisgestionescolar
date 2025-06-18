@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<h1><b>Bienvenido:</b> {{Auth::user()->name}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$total_gestiones}}</h3>

                <p>Gestiones</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-tasks"></i>
            </div>
            <a href="{{url('admin/gestiones')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$total_periodos}}</h3>

                <p>Periodos</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-calendar-alt"></i>
            </div>
            <a href="{{url('admin/periodos')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$total_niveles}}</h3>

                <p>Niveles</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-layer-group"></i>
            </div>
            <a href="{{url('admin/niveles')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$total_grados}}</h3>

                <p>Grados</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-list-alt"></i>
            </div>
            <a href="{{url('admin/grados')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$total_paralelos}}</h3>

                <p>Paralelos</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-clone"></i>
            </div>
            <a href="{{url('admin/paralelos')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$total_turnos}}</h3>

                <p>Turnos</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-clock"></i>
            </div>
            <a href="{{url('admin/turnos')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$total_materias}}</h3>

                <p>Materias</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
            <a href="{{url('admin/materias')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$total_roles}}</h3>

                <p>Roles</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-user-check"></i>
            </div>
            <a href="{{url('admin/roles')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$total_personal_administrativo}}</h3>

                <p>Administrativos</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-user-cog "></i>
            </div>
            <a href="{{url('admin/personal/administrativo')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$total_personal_doncente}}</h3>

                <p>Docentes</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-user-cog"></i>
            </div>
            <a href="{{url('admin/personal/docente')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script></script>
@stop