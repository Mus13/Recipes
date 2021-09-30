<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    
}