<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class AdminSubcategoryController extends Controller
{
    protected $title = 'подкатегории';

    public function index()
    {
        return view('admin.subcategory')->with('title', $this->title);
    }

    public function store(Request $request, Subcategory $subcategory)
    {
        $arr = $request->all();
        if(Subcategory::where('title', $arr['title'])->first()){
            return back()->with('error', "Подкатегория ".$arr['title']." уже существует.");
        }
        $subcategory->slug = Str::slug($arr['title'], '-');
        $subcategory->fill($arr)->save();

        return back()->with('success', "Подкатегория ".$arr['title']." добавлена!");
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $subcategory->slug = Str::slug($request->input('title'), '-');
        $subcategory->fill($request->all())->save();

        return back()->with('success', 'Подкатегория ' . $subcategory->title . ' изменена!');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return back()->with('success', "Подкатегория удалена!");
    }
}
