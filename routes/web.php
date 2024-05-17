<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return redirect()->route('welcome');
});
Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    Route::get('/pages', [PagesController::class, 'getPages'])->name('pages');
    Route::get('/add/page', [PagesController::class, 'addPage'])->name('add.page');
    Route::post('create/page', [PagesController::class, 'createPage'])->name('create.page');
    Route::get('edit/page/{id}', [PagesController::class, 'editPage'])->name('edit.page');
    Route::post('update/page/{id}', [PagesController::class, 'updatePage'])->name('update.page');
    Route::get('delete/page/{id}', [PagesController::class, 'deletePage'])->name('delete.page');

    Route::get('/categories', [CategoriesController::class, 'getCategories'])->name('categories');
    Route::get('/add/category', [CategoriesController::class, 'addCategory'])->name('add.category');
    Route::post('create/category', [CategoriesController::class, 'createCategory'])->name('create.category');
    Route::get('edit/category/{id}', [CategoriesController::class, 'editCategory'])->name('edit.category');
    Route::post('update/category/{id}', [CategoriesController::class, 'updateCategory'])->name('update.category');
    Route::get('delete/category/{id}', [CategoriesController::class, 'deleteCategory'])->name('delete.category');

    Route::get('/products', [ProductsController::class, 'getProducts'])->name('products');
    Route::get('/add/product', [ProductsController::class, 'addProduct'])->name('add.product');
    Route::post('create/product', [ProductsController::class, 'createProduct'])->name('create.product');
    Route::get('edit/product/{id}', [ProductsController::class, 'editProduct'])->name('edit.product');
    Route::post('update/product/{id}', [ProductsController::class, 'updateProduct'])->name('update.product');
    Route::get('delete/product/{id}', [ProductsController::class, 'deleteProduct'])->name('delete.product');
});
