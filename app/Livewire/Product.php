<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product as Producto;

class Product extends Component
{
    public $categoryId = -1; 

    public function render()
    {
        return view('livewire.product', [
            'products' => $this->getData(), 
            'categories' => $this->getCategory()
        ]);
    }

    //metodos creados 

    public function getData(){
        if($this->categoryId == -1){
            $products = Producto::all();
        }else{
            $products = Producto::where('category_id', $this->categoryId )->get();  
        }
        return $products;
         
    }

    public function getCategory(){
        $categories = Category::all(); 
        return $categories; 
    }
}
