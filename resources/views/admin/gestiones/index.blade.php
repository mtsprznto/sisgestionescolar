@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Listado de gestiones educativas</h1>
<hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{url('/img/calendario.gif')}}" width="70px" alt="calendario">
            <div class="info-box-content">
                <span class="info-box-text"><b>Gestiones Educativa</b></span>

                <span class="info-box-number" style="color: green; font-size:20pt" >2025</span>
            </div>
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
<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
</script>
@stop