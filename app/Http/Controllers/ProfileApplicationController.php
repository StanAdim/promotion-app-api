<?php

namespace App\Http\Controllers;

use App\Models\ProfileApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileApplicationController extends Controller
{
    public function store(Request $request){
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
        $latest = ProfileApplication::latest()->first();
        $tokenInit = 'ICTC-00';
        $initiaToken = '';
        if( $latest != null ){
            $initiaToken = $tokenInit.($latest->id + 1);
        }
        if( $latest == null ){
            $initiaToken = $tokenInit.(1);
        }
        $arrayToken = ["applicationCode"=>$initiaToken];
        $data = array_merge($data,$arrayToken);
        $newProfileApplication = ProfileApplication::create($data); 
        // Mail::to($newProfileApplication->email)->send(new ForumMail($newParticipator));
        return response()->json([
            'message'=> "Success",
            'data' => $newProfileApplication
        ],200);
    }
}
