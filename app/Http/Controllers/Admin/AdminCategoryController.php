<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    protected $title = 'категории';

    public function index()
    {       
        return view('admin.category')->with('title', $this->title);
    }

    public function store(Request $request, Category $category) 
    {   
        $arr = $request->all();
        if(Category::where('title', $arr['title'])->first()){
            return back()->with('success', "Категория ".$arr['title']." уже существует.");
        }   
        $category->slug = Str::slug($arr['title'], '-');
        $category->fill($arr)->save();

        return back()->with('success', "Категория ".$arr['title']." добавлена!");
    }

    public function destroy(Category $category) 
    {   
        $category->delete();
        return back()->with('success', "Категория удалена!");
    }
}
