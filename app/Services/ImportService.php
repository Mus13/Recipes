<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * Class UserService
 * @package App\Services
 */
class ImportService
{

    public function importData()
    {
        return Http::get('https://raw.githubusercontent.com/raywenderlich/recipes/master/Recipes.json')->object();
    }
}