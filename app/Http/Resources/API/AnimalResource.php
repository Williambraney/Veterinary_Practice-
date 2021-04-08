<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "owner_id" => $this->owner_id,
            "name" => $this->name,
            "type" => $this->type,
            "dob" => $this->dob, 
            "weight_kg" => $this->weight_kg,
            "height_metres" => $this->height_metres,
            "biteyness" => $this->biteyness,
            "treatments" => $this->treatment->pluck("name"),
        ];
    }
}
