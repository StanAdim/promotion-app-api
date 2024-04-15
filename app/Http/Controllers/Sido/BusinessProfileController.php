<?php

namespace App\Http\Controllers\Sido;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sido\BusinessProfileResource;
use App\Models\Sido\BusinessProfile;
use App\Models\Sido\PersonalProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessProfileController extends Controller
{
    public function store(Request $request , $slug)
    {
        $validator = Validator::make($request->all(), [
            'applicationCode' => 'required',
            'background' => 'required',
            'marketProblem' => 'required',
            'marketBase' => 'required',
            'prototypeDescription' => 'required',
            'marketSize' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=> 'Validation fails',
                'errors'=> $validator->errors()
            ],422);
        }
        $data = $validator->validate();
        $newBusinessProfile = BusinessProfile::create($data); 
        return response()->json([
            'message'=> "Business Profile Saved",
            'data' => $newBusinessProfile,
            'code'=> 200
        ],200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $newBusinessProfile = BusinessProfileResource::collection(BusinessProfile::where('applicationCode',$slug)->get())->first(); 
        if($newBusinessProfile){
            return response()->json([
                'message'=> "Business Profile",
                'data'=> $newBusinessProfile,
                'code' => 200
            ]);
        }
        else{
            return  response()->json([
                'message'=> "No Business Profile",
                'code'=> 300,
            ]);
        }

    }
    public function edit($id)
    {
        //
    }
    public function searchBusinessDetail($slug)
    {
        // $slug pass id of applicant
        $businessDetails = BusinessProfileResource::collection(BusinessProfile::where('applicationCode',$slug)->get())->first();
        if($businessDetails){
            return response()->json([
                'message'=> 'Applicant Business Detail ',
                'data' => $businessDetails,
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
            'applicationCode' => '',
            'background' => '',
            'marketProblem' => '',
            'marketBase' => '',
            'prototypeDescription' => '',
            'marketSize' => '',
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=> 'Validation fails',
                'errors'=> $validator->errors()
            ],422);
        }
        $data = $validator->validate();
        $isUpdated = BusinessProfile::where('id', $data['id'])->update($data);
        if($isUpdated){
            $dataUpdated = BusinessProfileResource::collection(BusinessProfile::where('id', $data['id'])->get())->first();
            return response()->json([
                'message'=> 'Business Data Updated',
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
