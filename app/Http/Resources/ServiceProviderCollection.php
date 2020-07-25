<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ServiceProviderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'providerName' => $this->providerName,
            'description' => $this->description,
            'phone' => $this->phone,
            'address' => $this->phone,
            'location' => $this->location
        ];
    }
}
