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
        $category = Category::query()->where('slug', $slug)->first();
        if($category){
            $productsInCategory = Product::join('filters', 'products.id', '=', 'filters.product_id')
                                ->where('category_id', $category->id)
                                ->paginate(24);
            return view('admin.catalog')
                    ->with('productsInCategory', $productsInCategory)
                    ->with('category', $category);  
        } else {
            return back()->with('error', "Нет такой категории!");
        }   
    }

    public function destroy(Product $catalog) 
    {   
        $filter = Filter::where('product_id', $catalog->id);
        $filter->delete();

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
        $catalog->fill($request->all())->save();

        $filters = Filter::query()->where('product_id', $catalog->id)->first();
        $filters->stones = $request->has('stones');
        $filters->nostones = $request->has('nostones');
        $filters->pearls = $request->has('pearls');
        $filters->save();

        return back()->with('success', 'Артикул ' . $catalog->article . ' изменен!');
    }
}
