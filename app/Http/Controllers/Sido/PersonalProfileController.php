<?php

namespace App\Http\Controllers\Sido;

use App\Http\Controllers\Controller;
use App\Models\Sido\PersonalProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PersonalProfileController extends Controller
{
    public function store(Request $request)
    {
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
        $newProfileApplication = PersonalProfile::create($data); 
        // Mail::to($newProfileApplication->email)->send(new ForumMail($newParticipator));
        return response()->json([
            'message'=> "Applicant Profile Saved",
            'data' => $newProfileApplication
        ],200);
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
