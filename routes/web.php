<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\WorksController;
use App\Http\Controllers\DBController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCatalogController;
use App\Http\Controllers\Admin\AdminSubcategoryController;
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
        Route::view('/chains', 'catalog.chains')->name('chains');
        Route::get('/{slug}/{subslug?}', [CatalogController::class, 'show'])->name('category.show');
    });

Route::view('/individual', 'individual')->name('individual');
Route::get('works', [WorksController::class, 'index'])->name('works');
Route::view('/contacts', 'contacts')->name('contacts');

Route::get('db', [DBController::class, 'db'])->name('db');

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::post('/', [AdminController::class, 'update'])->name('update');

        Route::resource('/catalog', AdminCatalogController::class)->only(['show', 'update', 'create', 'store', 'destroy']);
        Route::get('/search', [AdminCatalogController::class, 'search'])->name('search');
        
        Route::resource('/categories', AdminCategoryController::class)->only(['index', 'store', 'destroy']);

        Route::resource('/subcategories', AdminSubcategoryController::class)->only(['store', 'destroy']);

        Route::resource('/works', AdminWorksController::class);
    });

Auth::routes([
    'confirm' => false,
    'forgot' => false,
    'login' => true,
    'register' => false,
    'reset' => false,
    'verification' => false,
]);

