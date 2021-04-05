<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function show()
    {
        return view('catalog.category');
    }
}
