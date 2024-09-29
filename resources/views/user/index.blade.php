@extends('adminlte::page')

@section('title', 'Perfil de Usuario')

@section('content_header')
    <h1 style="text-align: center">Perfil de Usuario</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-3">
        <!-- Perfil de Usuario -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset('img/user_default.png') }}"  {{-- Cambia la ruta por la imagen real del usuario --}}
                         alt="Foto de Perfil del Usuario"
                         class="img-thumbnail">
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center">{{ $user->email }}</p>

                
                <a href="#" class="btn btn-primary btn-block"><b>Seguir</b></a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Información Detallada -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuración</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <!-- Tab de Actividad -->
                    <div class="tab-pane active" id="activity">
                        <!-- Aquí podrías incluir la actividad reciente del usuario -->
                        <p>Aquí va la actividad reciente del usuario...</p>
                    </div>
                    <!-- /.tab-pane -->

                    <!-- Tab de Configuración -->
                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Nombre" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <!-- Más campos de configuración si es necesario -->
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Guardar Cambios</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Perfil de usuario cargado!'); </script>
@stop