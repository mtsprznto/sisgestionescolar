@extends('adminlte::page')

@section('title', 'Personal')

@section('content_header')
<h1>Creacion de un nuevo personal: {{$tipo}}</h1>
<hr>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos del formulario</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{url('/admin/personal/create')}}" method="POST" enctype="multipart/form-data"">
                    @csrf
                    <input type=" text" name="tipo" value="{{$tipo}}" hidden>
                    <div class="row">
                        <div class="col-md-3">
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
                                        name="foto"
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
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombre del rol</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                            </div>
                                            <select name="rol" id="rol_select" class="form-control">
                                                <option value="">Seleccione un rol...</option>
                                                @foreach ($roles as $rol)
                                                <option value="{{$rol->name}}">{{$rol->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('rol')
                                        <small class="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nombres" id="nombres" value="{{old('nombres')}}" placeholder="Ingrese nombres..." required>
                                        </div>
                                        @error('nombres')
                                        <small class="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{old('apellidos')}}" placeholder="Ingrese apellidos..." required>
                                        </div>
                                        @error('apellidos')
                                        <small class="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Cedula de identidad</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="ci" id="ci" value="{{old('ci')}}" placeholder="Ingrese ci..." required>
                                        </div>
                                        @error('ci')
                                        <small class="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" placeholder="Ingrese fecha nacimiento..." required>
                                        </div>
                                        @error('fecha_nacimiento')
                                        <small class="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Telefono</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="telefono" id="telefono" value="{{old('telefono')}}" placeholder="Ingrese telefono..." required>
                                        </div>
                                        @error('telefono')
                                        <small class="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Profesion</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-briefcase"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="profesion" id="profesion" value="{{old('profesion')}}" placeholder="Ingrese profesion..." required>
                                        </div>
                                        @error('profesion')
                                        <small class="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Ingrese email..." required>
                                        </div>
                                        @error('email')
                                        <small class="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">Direccion</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map-pin"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="direccion" id="direccion" value="{{old('direccion')}}" placeholder="Ingrese direccion..." required>
                                        </div>
                                        @error('direccion')
                                        <small class="color:red">{{$message}}</small>
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
                                <a href="{{url('/admin/personal/'.$tipo)}}" class="btn btn-default"><i class="fas fa-arrow-left"></i> Cancelar</a>
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
@stop