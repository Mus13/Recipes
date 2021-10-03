<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Step extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id'];
    /**
     * Get the recipe that owns the step.
     */
    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }

    public static function getMAxTimeTotal(){
        return SELF::selectRaw('recipe_id,SUM(time) as total')->groupBy('recipe_id')->orderBy('total','desc')->first()->total;
    }
}
