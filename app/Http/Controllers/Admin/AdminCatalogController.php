<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Filter;
use App\Http\Requests\ProductRequest;
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
                                ->where('subcategory_id', 1)
                                ->paginate(12);
            return view('admin.catalog')
                    ->with('products', $productsInCategory)
                    ->with('category', $category)
                    ->with('title', $this->title);  
        } else {
            return back()->with('error', "Нет такой категории!");
        }   
    }

    public function create() 
    {
        return view('admin.create')->with('title', 'добавить в каталог');
    }

    public function store(ProductRequest $request, Product $catalog, Filter $filters)
    {
        $request->validated(); 

        $url = null;
        if ($request->file('img')) {
            $url = $request->input('article') . '.jpg';
            Storage::putFileAs('public/img/catalog/', $request->file('img'), $url);
        }
        $catalog->img = $url;
        $result = $catalog->fill($request->all())->save();

        $filters->product_id = $catalog->id;
        $this->addFilters($filters, $request);

        if ($result){
            return back()->with('success', 'Артикул ' . $request->input('article') . ' добавлен!');
        } else {
            return back()->with('error', 'Ошибка добавления!');
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
        $this->addFilters($filters, $request);

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

    public function addFilters($filters, $request)
    {
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
        return $filters->save();
    }
}
