<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;

class Type extends Model
{
    use HasFactory;

    /**
     * Get the ingredients of this type.
     */
    public function ingredients(){
        return $this->hasMany(Ingredient::class);
    }
}
