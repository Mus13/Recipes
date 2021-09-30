<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\IngredientWithQuantityResource;
use App\Http\Resources\TimerResource;
use App\Http\Resources\StepResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'ingredients' => IngredientWithQuantityResource::collection($this->ingredients),
            //I would have suggested putting the timer in the same object as the step's description
            //for reciever's better understanding. but i'm going to stick to the structure given
            //in the response from the API. 
            'steps' => StepResource::collection($this->stepsDescription()),
            'timers' => TimerResource::collection($this->stepsTimers()),
            'imageURL' => $this->imageURL,
            'originalURL' => $this->originalURL
        ];
    }
}
