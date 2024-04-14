<?php

namespace App\Http\Resources\Sido;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessProfileResource extends JsonResource
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
            'id' => $this ->id,
            'applicationCode' => $this ->applicationCode,
            'isFilled' => $this ->isFilled,
            'background' => $this ->background,
            'marketProblem' => $this ->marketProblem,
            'marketBase' => $this ->marketBase,
            'prototypeDescription' => $this ->prototypeDescription,
            'marketSize' => $this ->marketSize,
        ];
    }
}
