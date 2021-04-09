<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{
    public function show($slug)
    {
        $category = Category::query()
                                ->where('slug', $slug)
                                ->first();

        $productsInCategory = Category::find($category->id);
        $productsInCategory = $productsInCategory->products()->paginate(24);

        return view('catalog.category')
                ->with('productsInCategory', $productsInCategory)
                ->with('category', $category);
    }

    public function showChainsPage()
    {       
        return view('catalog.chains');
    }
}
