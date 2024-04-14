<?php

namespace App\Http\Resources\Sido;

use App\Models\Sido\BusinessProfile;
use App\Models\Sido\CompetitionStatus;
use App\Models\Sido\Projection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
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
            'businessDetails' => BusinessProfileResource::
                        collection(BusinessProfile::where('applicationCode', $this->id)->get())->first(),
            'competitorsDetails' => CompetitorResource::
                        collection(CompetitionStatus::where('applicationCode', $this->id)->get())->first(),
            'projectionDetails' => ProjectionResource::
                        collection(Projection::where('applicationCode', $this->id)->get())->first(),
            ];   
         }
}
