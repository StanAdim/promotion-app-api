<?php

namespace App\Http\Resources\Sido;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
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
