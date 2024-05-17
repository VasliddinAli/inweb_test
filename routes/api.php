<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\PagesController;
use App\Http\Controllers\Api\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




//============================= APIS
Route::controller(PagesController::class)->prefix('page')->group(function () {
    Route::post('add', 'createPage');
    Route::get('list', 'getPages');
    Route::get('detail/{id}', 'pageDetail');
    Route::put('update/{id}', 'updatePage');
    Route::delete('delete/{id}', 'deletePage');
});
Route::controller(CategoriesController::class)->prefix('category')->group(function () {
    Route::post('add', 'createCategory');
    Route::get('list', 'getCategories');
    Route::get('detail/{id}', 'categoryDetail');
    Route::put('update/{id}', 'updateCategory');
    Route::delete('delete/{id}', 'deleteCategory');
});
Route::controller(ProductsController::class)->prefix('product')->group(function () {
    Route::post('add', 'createProduct');
    Route::get('list', 'getProducts');
    Route::get('detail/{id}', 'productDetail');
    Route::put('update/{id}', 'updateProduct');
    Route::delete('delete/{id}', 'deleteProduct');
});
