@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 style="text-align: center"><strong>Crear Categoria</strong></h1>
@stop

@section('content')

    <style>
        .card {
            background-color: #ffffff; /* Color de fondo del card */
            padding: 20px; /* Espaciado interno del card */
            margin: 20px; /* Margen exterior del card */
            border-radius: 10px; /* Bordes redondeados del card */
        }
    </style>

    <div class="card" style="background-color: beige">
        <div class="card-body" style="background-color: beige">
            <form action="{{route('categories.store')}}" method="POST" id="formulario">
                @method('post')
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-12">

                   {{--  campo nombre --}}
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoria" required>
                  </div>

                  
                </div>
                {{-- boton de creacion de evento --}}
                <div class="form-group col-md-12" style="text-align: right;">
                    <button type="submit" class="btn-enviar" style=" margin-right: 10px; background-color: rgb(0, 255, 174)">Crear</button>
                    <button type="button" class="btn-enviar" style="margin-left: 10px;" onclick="window.location='{{ route('categories.index') }}'">atras</button>
                </div>
                
            </form>
        </div>
    </div>
    
    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

      <style>
          .centro{
              display:flex;
              justify-content: center;
              margin:2rem;
          }

          .btn-enviar{
              background-color:#ffffff;
              padding:0.56em;
              border-radius:8px;
              width:7rem;
          }

          .photo{
            margin:auto;
          }
      </style>
    
@stop

{{-- @section('plugins.Select2', true) --}}

@section('js')
    





       

@stop