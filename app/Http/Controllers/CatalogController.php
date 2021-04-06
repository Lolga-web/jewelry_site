<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{
    public function show($slug)
    {
        $categories = Category::all();
        $category = Category::query()
                                ->where('slug', $slug)
                                ->first();

        $productsInCategory = Category::find($category->id);
        $productsInCategory = $productsInCategory->products()->paginate(24);

        return view('catalog.category')
                ->with('productsInCategory', $productsInCategory)
                ->with('category', $category->title)
                ->with('categories', $categories);
    }
}
