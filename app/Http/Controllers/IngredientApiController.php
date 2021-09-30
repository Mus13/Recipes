<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\IngredientResource;
use App\Models\Ingredient;

class IngredientApiController extends Controller
{
    //
    public function index(){
        return IngredientResource::collection(Ingredient::all());
    }
    
}
