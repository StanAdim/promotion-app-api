<?php

namespace App\Http\Resources\Sido;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectionResource extends JsonResource
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
            'id'=> $this->id,
            'expectedRevenue'=> $this->expectedRevenue,
            'machineEquipment'=> $this->machineEquipment, //array
            'workingCapital'=> $this->workingCapital,
            'investmentPlan'=> $this->investmentPlan,
            'financingSource'=> $this->financingSource,
            'challenges'=> $this->challenges, //array
            'supportNeeded'=> $this->supportNeeded, 
            'applicationCode'=> $this->applicationCode, 
            'isFilled'=> $this->isFilled
        ];
    }
}
