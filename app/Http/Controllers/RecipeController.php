<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    //
    public function index($id){
        return view('recipe',['recipe' => Recipe::find($id) ]);
    }
}
