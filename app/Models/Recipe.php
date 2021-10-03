<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Step;
use App\Models\Ingredient;

class Recipe extends Model
{
    use HasFactory;

    /**
     * Get the steps of the recipe.
     */
    public function steps(){
        return $this->hasMany(Step::class);
    }

    /**
     * Get the total of cook time of the recipe.
     */
    public function totalCookTime(){
        return $this->hasMany(Step::class)->selectRaw('recipe_id,SUM(time) as total')->groupBy('recipe_id')->orderBy('total')->first()->total;
    }

    /**
     * Get only the steps description of the recipe.
     */
    public function stepsDescription(){
        return $this->hasMany(Step::class)->orderBy('rank', 'asc')->select('id', 'description')->get();
    }

    /**
     * Get only the steps timers of the recipe.
     */
    public function stepsTimers(){
        return $this->hasMany(Step::class)->orderBy('rank', 'asc')->select('id', 'time')->get();
    }

    /**
     * Get the ingredients of the recipe.
     */
    public function ingredients(){
        return $this->belongsToMany(Ingredient::class)->withPivot('quantity');
    }
    
    /**
     * Get recipes by ingredients.
     */
    public static function getRecipesByIngredient($ingredients){
        return SELF::with('ingredients')
                ->whereHas('ingredients', function (Builder $query) use ($ingredients){ 
                    $query->whereIn('name',$ingredients);
                })->get();
    }

    /**
     * Get recipes where the cook time is less than the time given.
     */
    public static function getRecipesByTime($time){
        return Recipe::with('steps')
        ->whereHas('steps', function (Builder $query) use($time){
            $query->select('recipe_id')->groupBy('recipe_id')
                  ->havingRaw('SUM(time) <= '.$time.'');
        })->get();
    }

}