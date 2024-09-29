<?php

namespace App\Http\Controllers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
    {
        return view('products.index');
    }

    
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        /* dd($request); */
        /* dd($request->file('product_file')); */
        $url = $this->uploadImage($request->file('product_file'));
        $products = Product::create([
            'name' => $request['nombre'],
            'url' => $url,
            'code' => $request['codigo'],
            'price' => $request['precio'],
            'brand' => $request['marca'],
            'quantity' => $request['cantidad'],
            'description' => $request['descripcion'],
            'category_id' => $request['categoriaID'],
        ]);

        return redirect('products');
    }

    
    public function show($id)
    {
        $productoId = Product::findOrFail($id);
        return view('products.show',compact('productoId'));
    }

    
    public function edit($id)
    {
        $productoId = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('productoId','categories'));
    }

    
    public function update(Request $request,$id)
    {
       
        if($request->file('product_file') == null){
            $lista = [

                'name' => $request->nombre,
                'code' => $request->codigo,
                'price' => $request->precio,
                'brand' => $request->marca,
                'quantity' => $request->cantidad,
                'description' => $request->descripcion,
                'category_id' => $request->categoriaID,
    
            ];
        }else{
            $url = $this->uploadImage($request->file('product_file'));

            $lista = [
    
                'name' => $request->nombre,
                'url' => $url,
                'code' => $request->codigo,
                'price' => $request->precio,
                'brand' => $request->marca,
                'quantity' => $request->cantidad,
                'description' => $request->descripcion,
                'category_id' => $request->categoriaID,
    
            ];
        }

        Product::where('id', '=', $id)->update($lista);
        return redirect('products');
    }

    
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('products');
    }




    private function uploadImage($image)
    {
    /* $image = $request->file('product_file'); */
    $uploadedFileUrl = "";
        try {
            // Subir una imagen a Cloudinary
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
            // Haz lo que necesites con la URL de la imagen, como guardarla en la base de datos, etc.
            return $uploadedFileUrl;

        } catch (\Throwable $th) {
            dd($th);
            return $uploadedFileUrl; 
        }
    
    }
}
