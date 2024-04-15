<?php

namespace App\Http\Resources\Sido;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonalProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return         [
            'id' => $this->id,
            'applicationCode' => $this->applicationCode,
            'fullName' => $this->fullName,
            'birthYear' => $this->birthYear,
            'nidaNumber' => $this->nidaNumber,
            'educationLevel' => $this->educationLevel,
            'BusinessRegStatus' => $this->BusinessRegStatus,
            'phoneNumber' => $this->phoneNumber,
            'email' => $this->email,
            'businessSector' => $this->businessSector,
            'businessName' => $this->businessName,
            'businessLocation' => $this->businessLocation,
            'createdTime' => date('h:i A', strtotime($this->created_at)),
            'createdDate' => date('F j, Y', strtotime($this->created_at)),
            ];
    }
}
