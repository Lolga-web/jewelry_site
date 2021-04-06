<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;


class DBController extends Controller
{
    public function db(Product $products, Category $categories)
    {
        set_time_limit(0); 
        $products = $products->get();
        // dump($products);
        foreach($products as $product){
            $categoryArr = explode(',', $product->category_id);
            // dump(explode(',', $product->category_id));
            foreach($categoryArr as $category){
                DB::table('products_by_categories')->insert([
                    'product_id' => $product->id,
                    'category_id' => $category
                ]);
            }
            
        }
    }
}
