<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminCatalogController extends Controller
{
    public function show($slug)
    {
            $category = Category::query()
                ->where('slug', $slug)
                ->first();

            if($category){
                $productsInCategory = Category::find($category->id);
                $productsInCategory = $productsInCategory->products()->paginate(24);
    
                return view('admin.catalog')
                    ->with('productsInCategory', $productsInCategory)
                    ->with('category', $category);
            } else {
                return back()->with('error', "Нет такой категории!");
            }           
        
    }

    public function destroy(Product $catalog) 
    {   
        if(file_exists('storage/img/catalog/' . $catalog->img)){
            unlink('storage/img/catalog/' . $catalog->img);
        }
        $catalog->categories()->detach();  
        $catalog->delete();
        return back()->with('success', "Позиция удалена из каталога!");
    }

    public function edit() 
    {      
        
    }
}
