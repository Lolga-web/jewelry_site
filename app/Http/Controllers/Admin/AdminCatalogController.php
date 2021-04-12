<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Filter;
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

                $filters = Filter::all();
    
                return view('admin.catalog')
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
        $catalog->categories()->detach();  
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

        $id = $catalog->categories()->allRelatedIds();
        $catalog->categories()->updateExistingPivot($id, [
            'category_id' => $request->category_id,
        ]);

        $catalog->weight = $request->weight;

        // $catalog->category_id = $request->has('isPrivate');
        $catalog->fill($request->except(['category_id']))->save();
        return back()->with('success', 'Артикул ' . $catalog->article . ' изменен!');
    }
}
