<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;
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
     * Get the ingredients of the recipe.
     */
    public function ingredients(){
        return $this->belongsToMany(Ingredient::class)->withPivot('quantity');
    }
    
}