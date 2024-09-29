@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 style="text-align: center"><strong>Ver Producto</strong></h1>
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
           
                <div class="form-row">
                  <div class="form-group col-md-6">

                   {{--  campo nombre --}}
                    <label for="nombre">Nombre</label>
                    <p type="text">{{ $productoId->name }}</p>
                  </div>

                  <div class="form-group col-md-6">

                    {{--  campo precio --}}
                     <label for="precio">Precio</label>
                     <p type="text">{{ $productoId->price }}</p>
                   </div>

                   <div class="form-group col-md-6">

                    {{--  campo codigo --}}
                     <label for="precio">Codigo</label>
                     <p type="text">{{ $productoId->code }}</p>
                   </div>

                   <div class="form-group col-md-6">
                   {{--  campo marca --}}
                   <label for="precio">Marca</label>
                   <p type="text">{{ $productoId->brand }}</p>
                   </div>
                
                    <div class="form-group col-md-6">
                    {{--  campo Cantidad --}}
                    <label for="precio">Cantidad</label>
                    <p type="text">{{ $productoId->quantity }}</p>
                    </div>

                    {{-- campo descripcion --}}   
                    <div class="form-group col-md-6">
                    <label for="descripcion">Descripcion</label>
                    <p type="text">{{ $productoId->description }}</p>
                    </div>

                    <div class="form-group col-md-12">
                        {{--  campo imagen --}}
                        <label for="precio">Imagen</label><br>
                        <img src="{{$productoId->url}}" class="img-thumbnail" alt="..." style=" ">
                    </div>

                    {{-- campo categoria --}}   
                    {{-- <div class="form-group col-md-6">
                        <label for="descripcion">Categoria</label>
                        <p type="text">{{ $productoId->category_id }}</p>
                    </div> --}}

                    {{-- <label for="precio">Categoria</label>    
                    <select class="form-control custom-select" style="width: 150px; margin-left: 20px;background-color: #D9D9D9;" name="categoriaID" id="categoriaID">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select> --}}
                    
 
                {{-- boton de creacion de evento --}}
                
                
                <button type="button" class="btn-enviar" style="margin-left: auto;" onclick="window.location='{{ route('products.index') }}'">atras</button>
            
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

@section('plugins.Select2', true)

@section('js')
    



<script>
    document.addEventListener("DOMContentLoaded", function () {
        var formulario = document.getElementById("formulario");
        var descripcionInput = document.getElementById("descripcion");

        formulario.addEventListener("submit", function (event) {
            if (!descripcionInput.value.trim()) {
                alert("Por favor, ingresa una descripción.");
                event.preventDefault(); // Evita que el formulario se envíe si la validación falla
            }
        });
    });
</script>

       

@stop