<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;
class RecipeApiController extends Controller
{
    
    public function index(){
        return RecipeResource::collection(Recipe::paginate(3));
    }

    public function indexByID($id){
        return new RecipeResource(Recipe::find($id));
    }

    public function getRecipesByIngredients($ingredients){
        $ingredients=json_decode($ingredients);
        $recipes = Recipe::with('ingredients')
        ->whereHas('ingredients', function (Builder $query) use($ingredients) {
            $query->whereIn('name',$ingredients);
        })
        ->get();
        return RecipeResource::collection($recipes);
    }

    public function getRecipesByTimer($time){
        $recipes = Recipe::with('steps')
        ->whereHas('steps', function (Builder $query) use($time){
            $query->select('recipe_id')->groupBy('recipe_id')
                  ->havingRaw('SUM(time) <= '.$time.'');
        })
        ->get();
        return RecipeResource::collection($recipes);
    }

}
