<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployeeCollection extends ResourceCollection
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
            'employeeName' => $this->employeeName,
            'email' => $this->email,
            'password' => $this->password,
            'description' => $this->description,
            'designation' => $this->designation
        ];
    }
}
