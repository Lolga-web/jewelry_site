<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;


class DBController extends Controller
{
    public function db()
    {
        set_time_limit(0); 

        // $products = $products->get();
        // foreach($products as $product){
        //     $categoryArr = explode(',', $product->category_id);
        //     foreach($categoryArr as $category){
        //         DB::table('products_by_categories')->insert([
        //             'product_id' => $product->id,
        //             'category_id' => $category
        //         ]);
        //     }
            
        // }

        // $productsInCategory = Category::find(8);
        // $productsInCategory = $productsInCategory->products()->get();
        // // dd($productsInCategory);
        // foreach($productsInCategory as $product){
        //             DB::table('product_by_categories')->insertOrIgnore([
        //                 'product_id' => $product->id,
        //                 'category_id' => 10,
        //             ]);
        //         }

        // $productsInCategory = Category::find(7);
        // $productsInCategory = $productsInCategory->products()->get();
        // // dd($productsInCategory);
        // foreach($productsInCategory as $product){
        //             DB::table('subcategory_product')->insertOrIgnore([
        //                 'product_id' => $product->id,
        //                 'subcategory_id' => 8,
        //             ]);
        //         }

        // $images = scandir('storage/img/works');
        // // dd($images);

        // for($i=2; $i<count($images); $i++){
        //     DB::table('works')->insertOrIgnore([
        //         'img' => $images[$i],
        //     ]);
        // }
           
      
    }
}
