<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Storage;

class AdminWorksController extends Controller
{
    protected $title = 'наши работы';

    public function index()
    {       
        $images =  Work::paginate(24);
        return view('admin.works')
            ->with('images', $images)
            ->with('title', $this->title);
    }

    public function destroy(Work $work) 
    {   
        if(file_exists('storage/img/works/' . $work->img)){
            unlink('storage/img/works/' . $work->img);
        }

        $work->delete();
        return back()->with('success', "Позиция удалена!");
    }

    public function update(Request $request, Work $work) 
    {   
        $work->fill($request->all())->save();

        return back()->with('success', 'Позиция изменена!');
    }

    public function store(Request $request, Work $work) 
    {   

        $img = null;
        if ($request->file('img')) {

            $id = $work->insertGetId(['priority' => $request->input('priority')]);

            $url = $id . '.jpg';
            Storage::putFileAs('public/img/works/', $request->file('img'), $url);
            
            $work->where('id', $id)->update(['img' => $url]);
            return back()->with('success', "Позиция добавлена!");
        }
        return back()->with('error', "Необходимо добавить изображение!");
    }
}
