<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'price'  => $this->price,
            'status'  => $this->status,
            'stock'  => $this->stock,
            'description'  => $this->description,
            'images' => $this->images,
        ];
    }
}
