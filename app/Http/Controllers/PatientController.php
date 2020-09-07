<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Http\Resources\Patient as PatientResource;

class PatientController extends Controller
{
    public function getAllPatients()
    {
        $patients = Patient::all();
        return response()->json([
            'data'=> PatientResource::collection($patients)
        ]);
    }

    public function addPatient(Request $request)
    {
        $patient = new Patient([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "second_name" => $request->second_name,
            "title" => $request->title,
            "date_of_birth" => $request->date_of_birth,
            "address_1" => $request->address_1,
            "address_2" => $request->address_2,
            "suburb" => $request->suburb,
            "state" => $request->state,
            "post_code" => $request->post_code,
            "status" => $request->status,
        ]);

        if($patient->save()) {
            return response()->json([
                "message" => "Patient successfully added"
            ]);
        }
    }   

    public function getSinglePatient(Request $request, $id)
    {
        $patient = Patient::find($id);
        if(!$patient){
            return response()->json([
                'message' => 'Patient not found',
            ], 404);
        }
        return response()->json([
            'message' => 'Patient found',
            'data' => new PatientResource($patient)
        ]);
        
    }

    public function updatePatient(Request $request, $id)
    {
        $patient = Patient::find($id);
        if(!$patient){
            return response()->json([
                'message' => 'Probe not found',
            ], 404);
        }

        if($request->first_name) {
            $patient->first_name = $request->first_name;
        }
        if($request->last_name) {
            $patient->last_name = $request->last_name;
        }
        if($request->second_name) {
            $patient->second_name = $request->second_name;
        }
        if($request->title) {
            $patient->title = $request->title;
        }
        if($request->date_of_birth) {
            $patient->date_of_birth = $request->date_of_birth;
        }
        if($request->address_1) {
            $patient->address_1 = $request->address_1;
        }
        if($request->address_2) {
            $patient->address_2 = $request->address_2;
        }
        if($request->suburb) {
            $patient->suburb = $request->suburb;
        }
        if($request->state) {
            $patient->state = $request->state;
        }
        if($request->post_code) {
            $patient->post_code = $request->post_code;
        }
        if($request->status) {
            $patient->status = $request->status;
        }

        if($patient->save()){
            return response()->json([
                'message' => 'Patient updated successfully',
                'data' => $patient
            ]);
        }else{
            return response()->json([
                'message' => 'Patient updating!'
            ]);
        }
    }

    public function deletePatient($id)
    {
        $patient = Patient::find($id);

        if($patient->delete()){
            return response()->json([
                'message' => 'Patient Deleted Successfully!'
            ]);

            return new PatientResource($patient);
        }
    }
}
