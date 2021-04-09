<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorksController extends Controller
{
    public function index()
    {
        $images =  DB::table('works')->paginate(24);
        
        return view('works')->with('images', $images);
    }
}
