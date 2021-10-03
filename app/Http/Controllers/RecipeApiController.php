<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;

class RecipeApiController extends Controller
{
    
    public function index(){
        return RecipeResource::collection(Recipe::paginate(3));
    }

    public function indexByID($id){
        return new RecipeResource(Recipe::find($id));
    }

    public function getRecipesByIngredients($ingredients){
        $recipes = Recipe::getRecipesByIngredient(json_decode($ingredients));
        return RecipeResource::collection($recipes);
    }

    public function getRecipesByTimer($time){
        $recipes = Recipe::getRecipesByTime($time);
        return RecipeResource::collection($recipes);
    }

}
