<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product_id)
{
    $validatedData = $request->validate([
        'code' => 'required|string',
        'name' => 'required|string',
        'brand' => 'required|string',
        'quantity' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
    ]);

    $product = Product::find($product_id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    $product->update($validatedData);

    return response()->json($product, 200);
}
public function saleProduct(Request $request, $product_id)
{
    $validatedData = $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::find($product_id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    if ($product->quantity < $validatedData['quantity']) {
        return response()->json(['error' => 'Insufficient product quantity'], 400);
    }

    $product->quantity -= $validatedData['quantity'];
    $product->save();

    return response()->json($product, 200);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
