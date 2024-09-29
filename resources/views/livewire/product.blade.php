



<div>

    <a href="{{ route('products.create') }}" class="btn btn-primary float-right" style="margin-bottom: 10px; border-radius: 18px;background-color: #5DA969; color: #ffffff;">Nuevo producto +</a>

    <select wire:model.live="categoryId" class="form-control custom-select" style="width: 150px; margin-left: 20px;background-color: #D9D9D9;">
        <option value="-1">todos</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    

    <div class="table-responsive" style="background-color: beige">

        
        <table class="table caption-top" id="table_productos">
            <caption></caption>
            <thead style="background-color: #000000; color: #ffffff;">
                <tr>
    
                    <th scope="col">id</th>
                    <th scope="col">imagen</th>
                    <th scope="col">nombre</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">precio(Bs)</th>
                    <th scope="col">marca</th>
                    <th scope="col">accion</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id}}</td>
                            <td>
                                <img src="{{$product->url}}" class="img-thumbnail" alt="..." style="height:100px;  ">
                            </td>
                            <td>{{ $product->name }}</td>
                            {{-- <td>{{ $product->url }}</td> --}}
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->brand }}</td>
    
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-light" ><i class="fa fa-pen"></i></a>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-light" ><i class="fa fa-eye"></i></a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light" onclick="return confirm('¿Esta seguro que desea elminar el producto?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    
    </div>
</div>
