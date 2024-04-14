<?php

namespace App\Http\Resources\Sido;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompetitorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this -> id, 
            'competitors' => $this -> competitors, //array
            'competitiveAdvantage' => $this -> competitiveAdvantage,
            'marketStrategy' => $this -> marketStrategy,
            'teamCapacity' => $this -> teamCapacity,
            'applicationCode' => $this -> applicationCode,
            'isFilled' => $this -> isFilled,
            //Attachments
        ];
    }
}
