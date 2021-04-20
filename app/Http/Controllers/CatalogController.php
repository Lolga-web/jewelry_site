<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Filter;


class CatalogController extends Controller
{
    public function show(Request $request, $slug = null, $subslug = null)
    {
        $builder = Product::join('filters', 'products.id', '=', 'filters.product_id');
        $category = Category::query()->where('slug', $slug)->first();
        $subcategory = Subcategory::query()->where('slug', $subslug)->first();

        if($category){
            if($subslug){
                if($subcategory){
                    $builder->where('subcategory_id', $subcategory->id);
                } else {
                    return back();
                }
            } else {
                $builder->where('category_id', $category->id);
            }
    
            if ($request->has('stones')) { 
                $builder->where('stones', 1);
            }
            if ($request->has('nostones')) { 
                $builder->where('nostones', 1);
            }
            if ($request->has('pearls')) { 
                $builder->where('pearls', 1);
            }
        } else {
            return back();
        }
        
        $productsInCategory = $builder->paginate(24);

        return view('catalog.category')
                ->with('addFilters', $request->all())
                ->with('productsInCategory', $productsInCategory)
                ->with('subcategory', $subcategory)
                ->with('subslug', $subslug)
                ->with('category', $category);
    }

    public function showChainsPage()
    {       
        return view('catalog.chains');
    }
}
