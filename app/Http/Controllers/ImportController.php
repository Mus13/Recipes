<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Services\ImportService;
use App\Models\Recipe;
use App\Models\Step;
use App\Models\Type;
use App\Models\Ingredient;

class ImportController extends Controller
{
    
    public function store(){
        $data=(new ImportService)->importData();
        foreach ($data as $key => $recipe) {
            $rank=1;
            $newRecipe=new Recipe();
            $newRecipe->name=$recipe->name;
            $newRecipe->imageURL=isset($recipe->imageURL)?$recipe->imageURL:'';
            $newRecipe->originalURL=isset($recipe->originalURL)?$recipe->originalURL:'';
            $newRecipe->save();
            foreach ($recipe->ingredients as $key => $ingredient) {
                $type= Type::firstOrCreate(['name' => $ingredient->type]);
                $newIngredient= Ingredient::firstOrCreate(['name' => $ingredient->name,'type_id' => $type->id]);
                $newRecipe->ingredients()->attach($newIngredient,['quantity' => $ingredient->quantity]);
            }
            
            for ($i=0; $i < sizeof($recipe->steps) ; $i++) { 
                $newStep= new Step();
                $newStep->description=$recipe->steps[$i];
                $newStep->time=$recipe->timers[$i];
                $newStep->rank=$rank;
                $newStep->recipe_id=$newRecipe->id;
                $newStep->save();
            }
        }
        return redirect('/home');
    }
}
