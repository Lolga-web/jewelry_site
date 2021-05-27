<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Filter;


class CatalogController extends Controller
{
    public function index()
    {
        //
    }
    
    public function show(Filter $filter, Request $request, $slug = null, $subslug = null)
    {
        $builder = Product::join('filters', 'products.id', '=', 'filters.product_id');
        
        $category = Category::query()->where('slug', $slug)->first();
        if($slug && !$category) return back();

        if($category->id == 14) return view('catalog.chains')
                                            ->with('category', $category)
                                            ->with('subcategory', null);

        $subcategory = Subcategory::query()->where('slug', $subslug)->first();
        if($subslug && !$subcategory) return back();

        if($subcategory) {
            $builder->where('subcategory_id', $subcategory->id);
        } elseif($category) {
            $builder->where('category_id', $category->id);
        } else {
            return back();
        }
    
        $builder = $filter->productByFilters($request, $builder);
       
        $products = $builder->paginate(24);

        return view('catalog.category')
                ->with('addFilters', $request->all())
                ->with('products', $products)
                ->with('category', $category)
                ->with('subcategory', $subcategory)
                ->with('subslug', $subslug);
    }

    public function search(Request $request)
    {
        if($request->has('article')){
            $article = trim(strip_tags($request->input('article'))) . '%';
            $products = Product::join('filters', 'products.id', '=', 'filters.product_id')->where('article', 'like', $article)->paginate(24);
            return view('catalog.search')
                    ->with('products', $products);  
        } else {
            return back();
        }
    }

}
