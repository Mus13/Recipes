<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\RecipeController;

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

Route::get('/importData',[ImportController::class, 'store']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/recipes/id/{id}', [RecipeController::class, 'index']);


Route::post('/filters/ingredients', [FilterController::class, 'getIngredientsByTypes']);
Route::post('/filters/recipes/ingredients', [FilterController::class, 'filterByIngredients']);
Route::post('/filters/recipes/types', [FilterController::class, 'filterByTypes']);