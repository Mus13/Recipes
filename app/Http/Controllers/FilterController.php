<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Type;
use App\Models\Recipe;
use App\Models\Ingredient;

class FilterController extends Controller
{
    //
    public function getIngredientsByTypes(Request $request){
        $types=Type::find($request->data);
        $ingredients=collect(new Ingredient);
        foreach ($types as $key => $type) {
            foreach ($type->ingredients as $key => $ingredient) {
                $ingredients->push($ingredient);
            }
        }
        $returnHTML= view('layouts.selector', ['data' => $ingredients,'name' => 'ingredientSelector'])->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    public function filterByIngredients(Request $request){
        $time=$request->time;
        $ingredients=Ingredient::find($request->ingredients);
        $recipesByIngredient=Recipe::getRecipesByIngredient($ingredients->pluck('name'));
        $recipesByTime=Recipe::getRecipesByTime($time);
        $recipes=$recipesByIngredient->intersect($recipesByTime);
        $paginator = new Paginator($recipes, 3);
        $returnHTML=  view('layouts.card', ['recipes' => $paginator])->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    public function filterByTypes(Request $request){
        $time=$request->time;
        $types=Type::find($request->types);
        $ingredients=collect(new Ingredient);
        foreach ($types as $key => $type) {
            foreach ($type->ingredients as $key => $ingredient) {
                $ingredients->push($ingredient);
            }
        }
        $returnHTML=  view('layouts.card', ['recipes' => Recipe::paginate(4)]);
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

}
