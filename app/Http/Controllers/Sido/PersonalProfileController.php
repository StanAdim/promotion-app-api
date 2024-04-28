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
        $personalProfiles = PersonalProfileResource::collection(PersonalProfile::all()->sortBy('fullName'));
        return response()->json([
            'message'=> 'Sido applicants: Found',
            'data' => $personalProfiles
        ]);
    }
    public function store(Request $request) {
        // return $request;
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|max:225|min:3',
            'birthYear' => 'required',
            'nidaNumber' => '',
            // 'nidaNumber' => 'required',
            'educationLevel' => 'required',
            'BusinessRegStatus' => 'required',
            'phoneNumber' => 'required|starts_with:+255|max:13|min:10|unique:personal_profiles',
            // 'phoneNumber' => 'required',
            'email' => 'required|email|unique:personal_profiles',
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
    public function show($slug){
        $appplication = ApplicationResource::collection(PersonalProfile::where('id',$slug)->get())[0];
        if($appplication){
            return response()->json([
                'message'=> 'Application Details: Found',
                'data' => $appplication,
                'code' => 200
            ]);
        }
        return response()->json([
            'message'=> 'Application Not Found',
            'code' => 300
        ]);

    }
    public function submitApplication($slug)    {
        $appplication = PersonalProfile::where('id',$slug)->get()->first();
        if($appplication){
            PersonalProfile::where('id', $slug)->update([
                'submissionStatus' => true
            ]);
            return response()->json([
                'message'=> 'Application Submitted Successful',
                'code' => 200
            ]);
        }
        return response()->json([
            'message'=> 'Application Not Found',
            'code' => 300
        ]);

    }

    public function searchApplicationCode($slug){
        $appplication = PersonalProfileResource::collection(PersonalProfile::where('applicationCode',$slug)->get())->first();
        if($appplication){
            return response()->json([
                'message'=> 'Applicant Details:  Found',
                'data' => $appplication,
                'code'=> 200
            ]);
        }
        return response()->json([
            'message'=> 'Something is Wrong! CODE UNAVAILABLE',
            'code'=> 300
        ]);
    }
    public function handleSearchByName($slug){
        $searchResults = PersonalProfileResource::collection(PersonalProfile::where('fullName', 'like', "%$slug%")->get());
        if($searchResults){
            return response()->json([
                'message'=> 'Applicants Details:  Found',
                'data' => $searchResults,
                'code'=> 200
            ]);
        }
        return response()->json([
            'message'=> 'Something is Wrong! CODE UNAVAILABLE',
            'code'=> 300
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
