@extends('adminlte::page')

@section('title', 'Configuracion')

@section('content_header')
<h1>Datos del sistema</h1>
<hr>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Bienvenido a la sección del configuracion del sistema.</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{url('/admin/configuracion/create')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Logo de la institucion</label><b> (*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>

                                    <input type="file" onchange="mostrarImagen(event)" accept="image/*" value="{{old('logo', $configuracion->logo ?? '')}}" name="logo">
                                    <br>
                                    <img id="preview" src="{{ isset($configuracion) && $configuracion->logo ? url($configuracion->logo) : '' }}" style="max-width: 300px; margin-top: 10px;">
                                    <script>
                                        const mostrarImagen = e =>
                                            document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                    </script>
                                </div>
                                @error('nombre')
                                <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre</label><b> (*)</b>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-university"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{old('nombre', $configuracion->nombre ?? '')}}" name="nombre" placeholder="Escribir nombre" >
                                        </div>
                                        @error('nombre')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Descripcion</label><b> (*)</b>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{old('descripcion', $configuracion->descripcion ?? '')}}" name="descripcion" placeholder="Escribir descripcion" required>
                                        </div>
                                        @error('nombre')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Direccion</label><b> (*)</b>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{old('direccion', $configuracion->direccion ?? '')}}" name="direccion" placeholder="Escribir direccion" required>
                                        </div>
                                        @error('nombre')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Telefono</label><b> (*)</b>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{old('telefono', $configuracion->telefono ?? '')}}" name="telefono" placeholder="Escribir telefono" required>
                                        </div>
                                        @error('nombre')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Divisa</label><b> (*)</b>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                            </div>

                                            <select name="divisa" id="divisa" class="form-control" required>
                                                <option value="">Seleccione una opción</option>
                                                @foreach ($divisas as $divisa)
                                                <option value="{{$divisa['symbol']}}" {{ old('divisa', $configuracion->divisa ?? '') == $divisa['symbol'] ? 'selected' : '' }}>
                                                    {{$divisa['name']." (".$divisa['symbol']}})
                                                </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('nombre')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Correo Electronico</label><b> (*)</b>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" value="{{old('correo_electronico', $configuracion->correo_electronico ?? '')}}" name="correo_electronico" placeholder="Escribir email" required>
                                        </div>
                                        @error('correo_electronico')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Sitio Web</label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{old('web', $configuracion->web ?? '')}}" name="web" placeholder="Escribir web">
                                        </div>
                                        @error('web')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('/admin')}}" class="btn btn-default"><i class="fas fa-arrow-left"></i> Cancelar</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
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