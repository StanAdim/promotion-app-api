<?php

namespace App\Http\Controllers\Sido;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sido\ProjectionResource;
use App\Models\Sido\Projection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'applicationCode' => 'required',
            'expectedRevenue' => 'required',
            'machineEquipment' => 'required',
            'workingCapital' => 'required',
            'investmentPlan' => 'required',
            'financingSource' => 'required',
            'challenges' => 'required',
            'supportNeeded' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=> 'Validation fails',
                'errors'=> $validator->errors()
            ],422);
        }
        $data = $validator->validate();
        $newBusinessProfile = Projection::create($data); 
        return response()->json([
            'message'=> "Business Projection Saved",
            'data' => $newBusinessProfile
        ],200);
    }

    public function searchProjectionDetail($slug)
    {
        // $slug pass id of applicant
        $searchDetails = ProjectionResource::collection(Projection::where('applicationCode',$slug)->get())->first();
        if($searchDetails){
            return response()->json([
                'message'=> 'Projection Detail Found',
                'data' => $searchDetails,
                'code' => 200
            ]);
        }
        return response()->json([
            'message'=> 'Fails to Fetch Details',
            'code' => 300
        ]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'=> 'required',
            'expectedRevenue' => '',
            'machineEquipment' => '',
            'workingCapital' => '',
            'investmentPlan' => '',
            'financingSource' => '',
            'challenges' => '',
            'supportNeeded' => '',
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=> 'Validation fails',
                'errors'=> $validator->errors()
            ],422);
        }
        $data = $validator->validate();
        $isUpdated = Projection::where('id', $data['id'])->update($data);
        if($isUpdated){
            $dataUpdated = ProjectionResource::collection(Projection::where('id', $data['id'])->get())->first();
            return response()->json([
                'message'=> 'Projection Data Updated',
                'data' => $dataUpdated,
                'code' => 200
             ]);
        }
        return response()->json([
            'message'=> 'Data Updated Failed',
            'code' => 300
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
