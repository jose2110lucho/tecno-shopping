<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = DB::table('categories')->insertGetId(['name' => "celulares"]);
        $category2 = DB::table('categories')->insertGetId(['name' => "laptops"]);
        $category3 = DB::table('categories')->insertGetId(['name' => "smartwatch"]);
        
        DB::table('products')->insert([
            [
                'code' => "rferf3",
                'name' => "huawei p30 lite",
                'url' => "",
                'brand' => "huawei",
                'description' => "telefono movil inteligente",
                'quantity' =>125,
                'price' =>1200,
                'category_id' =>$category1,
            ],
            [
                'code' => "rferf4",
                'name' => "leonovo er2",
                'url' => "",
                'brand' => "lenovo",
                'description' => "laptop core i5",
                'quantity' =>125,
                'price' =>6000,
                'category_id' =>$category2,
            ],
            [
                'code' => "rferf5",
                'name' => "dual lite",
                'url' => "",
                'brand' => "samsung",
                'description' => "reloj inteligente",
                'quantity' =>125,
                'price' =>2400,
                'category_id' =>$category3,
            ],
        ]);
    }
}
