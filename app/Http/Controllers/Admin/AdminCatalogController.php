<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Filter;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;

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

            $subcategories = Subcategory::query()
                ->where('category_id', $category->id)
                ->get();
            $filters = Filter::all();

            return view('admin.catalog')
                ->with('subcategories', $subcategories)
                ->with('filters', $filters)
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
        $catalog->delete();
        return back()->with('success', "Позиция удалена из каталога!");
    }

    public function update(Request $request, Product $catalog) 
    {      
        $url = $catalog->img;
        if ($request->file('img')) {
            unlink('storage/img/catalog/' . $catalog->img);
            $url = $catalog->article . '.jpg';
            Storage::putFileAs('public/img/catalog/', $request->file('img'), $url);
        }
        $catalog->img = $url;

        // $catalog->category_id = $request->has('isPrivate');
        $catalog->fill($request->all())->save();
        return back()->with('success', 'Артикул ' . $catalog->article . ' изменен!');
    }
}
