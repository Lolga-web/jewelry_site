<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\WorksController;
use App\Http\Controllers\ContactsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('index', [HomeController::class, 'index']);

Route::name('catalog.')
    ->prefix('catalog')
    ->group(function () {
        Route::get('/category/{slug}', [CatalogController::class, 'show'])->name('show');
    });

Route::get('works', [WorksController::class, 'index'])->name('works');
Route::get('contacts', [ContactsController::class, 'index'])->name('contacts');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
