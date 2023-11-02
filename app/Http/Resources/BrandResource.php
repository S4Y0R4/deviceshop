<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'brand_name'=>$this->brand_name,
            'brand_description'=>$this->brand_description,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            'product_list'=>ProductResource::collection($this->whenLoaded('products')),
        ];

    }
}
