<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'product_name'=>$this->product_name,
            'product_description'=>$this->product_description,
            'brand_id'=>$this->brand_id,
            'category_id'=>$this->category_id,
            'created_at'=>$this->created_at,
            'image'=>$this->image,
            'price' => $this->price,
        ];
    }
}
