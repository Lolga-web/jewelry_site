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
    protected $title = 'каталог';

    public function show($slug)
    {   
        $category = Category::query()->where('slug', $slug)->first();
        if($category){
            $productsInCategory = Product::join('filters', 'products.id', '=', 'filters.product_id')
                                ->where('category_id', $category->id)
                                ->paginate(12);
            return view('admin.catalog')
                    ->with('products', $productsInCategory)
                    ->with('category', $category)
                    ->with('title', $this->title);  
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
        $filters->male = $request->has('male');
        $filters->female = $request->has('female');
        $filters->newborn = $request->has('newborn');
        $filters->zodiac = $request->has('zodiac');
        $filters->love = $request->has('love');
        $filters->muslim = $request->has('muslim');
        $filters->enamel = $request->has('enamel');
        $filters->save();

        return back()->with('success', 'Артикул ' . $catalog->article . ' изменен!');
    }

    public function search(Request $request)
    {
        if($request->has('article')){
            $article = $request->input('article') . '%';
            $products = Product::join('filters', 'products.id', '=', 'filters.product_id')->where('article', 'like', $article)->paginate(12);
            return view('admin.catalog')
                    ->with('products', $products)
                    ->with('title', $this->title);  
        } else {
            return back()->with('error', 'Неверные параметры поиска');
        }
    }
}
