<?php

namespace App\Http\Controllers\Sido;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sido\ApplicationResource;
use App\Http\Resources\Sido\PersonalProfileResource;
use App\Models\Sido\PersonalProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PersonalProfileController extends Controller
{
    public function index(){
        $personalProfiles = ApplicationResource::collection(PersonalProfile::all());
        return response()->json([
            'message'=> 'Personal Profiles',
            'data' => $personalProfiles
        ]);
    }
    public function store(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|max:225|min:3',
            'birthYear' => 'required',
            // 'nidaNumber' => 'required|max:20|min:20',
            'nidaNumber' => 'required',
            'educationLevel' => 'required',
            'BusinessRegStatus' => 'required',
            // 'phoneNumber' => 'required|max:12|min:12|unique:profile_applications',
            'phoneNumber' => 'required',
            'email' => 'required|email|unique:profile_applications',
            'businessSector' => '',
            'businessName' => '',
            'businessLocation' => '',
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=> 'Validation fails',
                'errors'=> $validator->errors()
            ],422);
        }
        $data = $validator->validate();
        $initiaToken = strtoupper(Str::random(3).'-'.Str::random(4));
        $arrayToken = ["applicationCode"=>$initiaToken];
        $data = array_merge($data,$arrayToken);
        $newApplication = PersonalProfile::create($data); 
        // Mail::to($newApplication->email)->send(new ForumMail($newParticipator));
        return response()->json([
            'message'=> "Applicant Profile Saved",
            'data' => $newApplication
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $appplication = ApplicationResource::collection(PersonalProfile::where('id',$slug)->get())[0];
        return response()->json([
            'message'=> 'Application Details',
            'data' => $appplication
        ]);
    }

    public function searchApplicationCode($slug)
    {
        $appplication = PersonalProfileResource::collection(PersonalProfile::where('applicationCode',$slug)->get())->first();
        
        return response()->json([
            'message'=> 'Application Details',
            'data' => $appplication
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'=> 'required',
            'fullName' => 'required|max:225|min:3',
            'birthYear' => 'required',
            // 'nidaNumber' => 'required|max:20|min:20',
            'nidaNumber' => 'required',
            'educationLevel' => 'required',
            'BusinessRegStatus' => 'required',
            // 'phoneNumber' => 'required|max:12|min:12|unique:profile_applications',
            // 'phoneNumber' => 'required',
            // 'email' => 'required|email|unique:profile_applications',
            'businessSector' => '',
            'businessName' => '',
            'businessLocation' => '',
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=> 'Validation fails',
                'errors'=> $validator->errors()
            ],422);
        }
        $data = $validator->validate();
        $isUpdated = PersonalProfile::where('id', $data['id'])->update($data);
        if($isUpdated){
            $dataUpdated = PersonalProfileResource::collection(PersonalProfile::where('id', $data['id'])->get())->first();
            return response()->json([
                'message'=> 'Application Data Updated',
                'data' => $dataUpdated,
                'code' => 200
             ]);
        }
        return response()->json([
            'message'=> 'Updated Failed',
            'code' => 300
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
