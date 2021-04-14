<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Filter;

class CatalogController extends Controller
{
    public function showCategory($slug)
    {
        $category = Category::query()
                                ->where('slug', $slug)
                                ->first();

        // $productsInCategory = Category::find($category->id);
        // $productsInCategory = $productsInCategory->products()->paginate(24);
        

        $productsInCategory = Product::with('filters')
                ->where('category_id', $category->id)
                ->paginate(24);

        return view('catalog.category')
                ->with('productsInCategory', $productsInCategory)
                ->with('subcategory', false)
                ->with('category', $category);
    }

    public function showSubcategory($slug)
    {
        $subcategory = Subcategory::query()
                                ->where('slug', $slug)
                                ->first();

        $category = Category::query()
                                ->where('id', $subcategory->category_id)
                                ->first();

        $productsInCategory = Subcategory::find($subcategory->id);
        $productsInCategory = $productsInCategory->products()->paginate(24);

        return view('catalog.category')
                ->with('productsInCategory', $productsInCategory)
                ->with('subcategory', $subcategory)
                ->with('category', $category);
    }

    public function showChainsPage()
    {       
        return view('catalog.chains');
    }
}
