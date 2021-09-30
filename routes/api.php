<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeApiController;
use App\Http\Controllers\IngredientApiController;
use App\Http\Controllers\RecipeApiController;

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



Route::get('/types', [TypeApiController::class, 'index']);

Route::get('/ingredients', [IngredientApiController::class, 'index']);

Route::get('/recipes', [RecipeApiController::class, 'index']);
Route::get('/recipes/id/{id}', [RecipeApiController::class, 'indexByID']);
//It is Defenitly not recomended to send jsons or arrays in get requests but i did it like this for easier testing for you :)
Route::get('/recipes/ingredients/{ingredients}', [RecipeApiController::class, 'getRecipesByIngredients']);
Route::get('/recipes/time/{time}', [RecipeApiController::class, 'getRecipesByTimer']);

