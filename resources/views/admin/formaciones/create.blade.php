@extends('adminlte::page')

@section('title', 'Formacion del personal')

@section('content_header')
<h1>Creacion de una nueva formacion</h1>
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
                <form action="{{url('/admin/personal/'.$id.'/formaciones/create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="personal_id" value="{{ $id }}" hidden>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Fotografia</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>

                                            <input
                                                type="file"
                                                onchange="mostrarImagen(event)"
                                                accept="image/*"
                                                name="archivo"
                                                required>
                                            <br>
                                            <img id="preview" src="" style="max-width: 150px; margin-top: 10px;">
                                            <script>
                                                const mostrarImagen = e =>
                                                    document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                            </script>
                                        </div>
                                        @error('foto')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="titulo">Titulo</label><b> (*)</b>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-certificate"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ old('titulo') }}" name="titulo" placeholder="Ingrese el titulo">
                                        </div>
                                        @error('titulo')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="institucion">Institución</label><b> (*)</b>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-university"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ old('institucion') }}" name="institucion" placeholder="Ingrese la institucion">
                                        </div>
                                        @error('institucion')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nivel">Nivel</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-layer-group"></i>
                                                </span>
                                            </div>
                                            <select name="nivel" id="nivel" class="form-control" required>
                                                <option value="" disabled selected>Seleccione el nivel...</option>
                                                <option value="Tecnico" {{old('nivel')== 'Tecnico' ? 'selected' : ''}}>Tecnico</option>
                                                <option value="Licenciatura" {{old('nivel')== 'Licenciatura' ? 'selected' : ''}}>Licenciatura</option>
                                                <option value="Maestria" {{old('nivel')== 'Maestria' ? 'selected' : ''}}>Maestria</option>
                                                <option value="Doctorado" {{old('nivel')== 'Doctorado' ? 'selected' : ''}}>Maestria</option>
                                            </select>
                                        </div>
                                        @error('nivel')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nivel">Fecha de Graduacion</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-layer-group"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control" name="fecha_graduacion" id="fecha_graduacion" value="{{ old('fecha_graduacion')}}">
                                        </div>
                                        @error('fecha_graduacion')
                                        <small style="color:red">{{$message}}</small>
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
                                <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fas fa-arrow-left"></i> Cancelar</a>
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
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
</script>
@stop