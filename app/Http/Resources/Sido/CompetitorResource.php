<?php

namespace App\Http\Resources\Sido;

use Illuminate\Http\Resources\Json\JsonResource;

class CompetitorResource extends JsonResource
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
