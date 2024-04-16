<?php

namespace App\Http\Controllers\Sido;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sido\CompetitorResource;
use App\Models\Sido\CompetitionStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompetitionStatusController extends Controller
{
    public function store(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'applicationCode' => 'required',
            'competitors' => 'required',
            'competitiveAdvantage' => 'required',
            'marketStrategy' => 'required',
            'teamCapacity' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=> 'Validation fails',
                'errors'=> $validator->errors()
            ],422);
        }
        $data = $validator->validate();
        $newCompetitionStatus = CompetitionStatus::create($data); 
        return response()->json([
            'message'=> "Competition Profile Saved",
            'data' => $newCompetitionStatus
        ],200);
    }


    public function searchCompetitionDetail($slug)
    {
        // $slug pass id of applicant
        $queryDetails = CompetitorResource::collection(CompetitionStatus::where('applicationCode',$slug)->get())->first();
        if($queryDetails){
            return response()->json([
                'message'=> 'Competition Business Detail Found',
                'data' => $queryDetails,
                'code' => 200
            ]);
        }
        return response()->json([
            'message'=> 'Fails to Fetch Details',
            'code' => 300
        ]);
    }

    public function update(Request $request,$slug)
    {


        $validator = Validator::make($request->all(), [
            'competitors' => '',
            'competitiveAdvantage' => '',
            'marketStrategy' => '',
            'teamCapacity' => '',
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=> 'Validation fails',
                'errors'=> $validator->errors()
            ],422);
        }
        $data = $validator->validate();
        $competitionDetails = CompetitorResource::collection(CompetitionStatus::where('applicationCode',$slug)->get())->first();
        if($competitionDetails){
            $isUpdated = CompetitionStatus::where('id', $competitionDetails->id)->update($data);
            if($isUpdated){
                $competitionDetail = CompetitorResource::collection(CompetitionStatus::where('applicationCode',$slug)->get())->first();
                return response()->json([
                    'message'=> 'Competition Data Updated',
                    'data' => $competitionDetail,
                    'code' => 200
                 ]);
            }
        }

        return response()->json([
            'message'=> 'Data Updated Failed',
            'code' => 300
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
