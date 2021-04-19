<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class WorksController extends Controller
{
    public function index()
    {
        $images =  Work::paginate(24);
        
        return view('works')->with('images', $images);
    }
}
