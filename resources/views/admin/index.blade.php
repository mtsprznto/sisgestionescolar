@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<h1><b>Bienvenido:</b> {{Auth::user()->name}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{url('/img/colegio.gif')}}" alt="" width="70px">
            <div class="info-box-content">
                <span class="info-box-text"><b>Gestiones registradas</b></span>
                <span class="info-box-number">{{$total_gestiones}} gestiones</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{url('/img/calendario.gif')}}" alt="" width="70px">
            <div class="info-box-content">
                <span class="info-box-text"><b>Periodos registradas</b></span>
                <span class="info-box-number">{{$total_periodos}} periodos</span>
            </div>
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