<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;
use App\Models\Type;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name','type_id'];
    /**
     * Get the recipes that use this ingredient.
     */
    public function recipes(){
        return $this->belongsToMany(Recipe::class)->withPivot('quantity');
    }

    /**
     * Get the type that owns the ingredient.
     */
    public function type(){
        return $this->belongsTo(Type::class);
    }

}
