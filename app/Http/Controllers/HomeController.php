<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Step;
use App\Models\Type;
use App\Models\Ingredient;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if (!Recipe::exists()) {
            return redirect('/importData');
        }
        return view('home',['recipes' => Recipe::paginate(3),'types' => Type::all(), 'ingredients' => Ingredient::all() , 'maxTime' => Step::getMAxTimeTotal()]);
    }

}