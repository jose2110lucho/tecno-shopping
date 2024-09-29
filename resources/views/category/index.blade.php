@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 style="text-align: center"><strong>Lista De Categorias</strong></h1>
@stop

@section('content')


    <a href="{{ route('categories.create') }}" class="btn btn-primary float-right" style="margin-bottom: 10px; border-radius: 18px;background-color: #5DA969; color: #ffffff;">Nuevo categoria +</a>


    <div class="table-responsive" style="background-color: beige">

        
        <table class="table caption-top" id="table_categories">
            
            <thead style="background-color: #000000; color: #ffffff;">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">accion</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id}}</td>
                            <td>{{ $category->name }}</td>
    
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-light" ><i class="fa fa-pen"></i></a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light" onclick="return confirm('¿Esta seguro que desea elminar esta categoria?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
 
@stop
