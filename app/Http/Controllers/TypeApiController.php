<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TypeResource;
use App\Models\Type;

class TypeApiController extends Controller
{
    
    public function index(){
            return TypeResource::collection(Type::all());
    }


}
