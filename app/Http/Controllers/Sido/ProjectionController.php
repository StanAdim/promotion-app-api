<?php

namespace App\Http\Controllers\Sido;

use App\Http\Controllers\Controller;
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
