@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 style="text-align: center"><strong>Crear Producto</strong></h1>
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
            <form action="{{route('products.store')}}" method="POST" id="formulario" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">

                   {{--  campo nombre --}}
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required>
                  </div>

                  <div class="form-group col-md-6">

                    {{--  campo precio --}}
                     <label for="precio">Precio</label>
                     <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio del producto" required>
                   </div>

                   <div class="form-group col-md-6">

                    {{--  campo codigo --}}
                     <label for="precio">Codigo</label>
                     <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo del producto" required>
                   </div>

                   <div class="form-group col-md-6">
                   {{--  campo marca --}}
                   <label for="precio">Marca</label>
                   <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca del producto" required>
                   </div>
                
                    <div class="form-group col-md-6">
                    {{--  campo Cantidad --}}
                    <label for="precio">Cantidad</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad del producto" required>
                    </div>
                    {{-- campo descripcion --}}   
                    <div class="form-group col-md-6">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>

                    <label for="precio">Categoria</label>    
                    <select class="form-control custom-select" style="width: 150px; margin-left: 20px;background-color: #D9D9D9;" name="categoriaID" id="categoriaID">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    {{-- campo imagen --}} 
                    <div class="form-group col-md-12">
                        <label for="fileInput">imagen</label>
                        <input type="file" class="form-control-file" id="fileInput" name="product_file">
                        <img id="previewImage" src="#" alt="Previsualización de imagen" style="display: none;">
                      </div>
 
                {{-- boton de creacion de producto --}}
                
               {{--  <button type="submit" class="btn-enviar" style="margin-left: auto; background-color: rgb(0, 255, 174)">Crear</button>
                <button type="button" class="btn-enviar" style="margin-right: 5;" onclick="window.location='{{ route('products.index') }}'">atras</button> --}}
                
                <div class="form-group col-md-12" style="text-align: right;">
                    <button type="submit" class="btn-enviar" style="margin-right: 10px; background-color: rgb(0, 255, 174)">Guardar</button>
                    <button type="button" class="btn-enviar" style="margin-left: 10px;" onclick="window.location='{{ route('products.index') }}'">Cancelar</button>
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

//metodo caragar imagen
    document.getElementById('fileInput').addEventListener('change', function(event) {
    var file = event.target.files[0]; // Obtener el archivo seleccionado
    var preview = document.getElementById('previewImage');

    // Verificar si se seleccionó un archivo
    if (file) {
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result; // Establecer la vista previa de la imagen
            preview.style.display = 'block'; // Mostrar la imagen previsualizada
        }

        reader.readAsDataURL(file); // Leer el archivo como una URL de datos
    } else {
        preview.style.display = 'none'; // Ocultar la imagen previsualizada si no se selecciona ningún archivo
    }
});





</script>




       

@stop