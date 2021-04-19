<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\WorksController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DBController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCatalogController;
use App\Http\Controllers\Admin\AdminFilterController;
use App\Http\Controllers\Admin\AdminWorksController;

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
        Route::get('/{slug}/{subslug?}', [CatalogController::class, 'show'])->name('category.show');
        Route::get('/chains', [CatalogController::class, 'showChainsPage'])->name('chains');
    });

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::resource('/catalog', AdminCatalogController::class);
        
        Route::resource('/categories', AdminCategoryController::class);

        Route::resource('/filters', AdminFilterController::class);

        Route::resource('/works', AdminWorksController::class);
    });


Route::view('/individual', 'individual')->name('individual');
Route::get('works', [WorksController::class, 'index'])->name('works');
Route::get('contacts', [ContactsController::class, 'index'])->name('contacts');

Route::get('db', [DBController::class, 'db'])->name('db');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
