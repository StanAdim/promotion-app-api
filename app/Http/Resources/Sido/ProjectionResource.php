<?php

namespace App\Http\Resources\Sido;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
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
