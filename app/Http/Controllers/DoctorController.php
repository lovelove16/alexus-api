<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Http\Resources\Doctor as DoctorResource;

class DoctorController extends Controller
{

    public function getAllDoctors()
    {
        $doctors = Doctor::all();
        return response()->json([
            'data'=> DoctorResource::collection($doctors)
        ]);
    }

    public function addDoctor(Request $request)
    {
        $doctor = new Doctor([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "title" => $request->title,
            "office_address" => $request->office_address,
            "office_address_2" => $request->office_address_2,
            "office_suburb" => $request->office_suburb,
            "office_state" => $request->office_state,
            "office_postcode" => $request->office_postcode,
            "postal_address" => $request->postal_address,
            "postal_address_2" => $request->postal_address_2,
            "postal_suburb" => $request->postal_suburb,
            "postal_state" => $request->postal_state,
            "postal_post_code" => $request->postal_post_code,
            "office_telephone" => $request->office_telephone,
            "office_telephone_2" => $request->office_telephone_2,
            "office_facsmile" => $request->office_facsmile,
            "office_email" => $request->office_email,
            "mobile" => $request->mobile

        ]);

        if($doctor->save()) {
            return response()->json([
                "message" => "Doctor successfully added"
            ]);
        }
        
    }

    public function getSingleDoctor($id)
    {
        $doctor = Doctor::find($id);
        if(!$doctor){
            return response()->json([
                'message' => 'Doctor not found',
            ], 404);
        }
        return response()->json([
            'message' => 'Doctor found',
            'data' => new DoctorResource($doctor)
        ]);
        
    }

    public function updateDoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        if(!$doctor){
            return response()->json([
                'message' => 'Doctor not found',
            ], 404);
        }

        if($request->first_name) {
            $doctor->first_name = $request->first_name;
        }
        if($request->last_name) {
            $doctor->last_name = $request->last_name;
        }
        if($request->title) {
            $doctor->title = $request->title;
        }
        if($request->office_address) {
            $doctor->office_address = $request->office_address;
        }
        if($request->office_address_2) {
            $doctor->office_address_2 = $request->office_address_2;
        }
        if($request->office_suburb) {
            $doctor->office_suburb = $request->office_suburb;
        }
        if($request->office_state) {
            $doctor->office_state = $request->office_state;
        }
        if($request->office_postcode) {
            $doctor->office_postcode = $request->office_postcode;
        }
        if($request->postal_address) {
            $doctor->postal_address = $request->postal_address;
        }
        if($request->postal_address_2) {
            $doctor->postal_address_2 = $request->postal_address_2;
        }
        if($request->postal_suburb) {
            $doctor->postal_suburb = $request->postal_suburb;
        }
        if($request->postal_state) {
            $doctor->postal_state = $request->postal_state;
        }
        if($request->postal_post_code) {
            $doctor->postal_post_code = $request->postal_post_code;
        }
        if($request->office_telephone) {
            $doctor->office_telephone = $request->office_telephone;
        }
        if($request->office_telephone_2) {
            $doctor->office_telephone_2 = $request->office_telephone_2;
        }
        if($request->office_facsmile) {
            $doctor->office_facsmile = $request->office_facsmile;
        }
        if($request->office_email) {
            $doctor->office_email = $request->office_email;
        }
        if($request->mobile) {
            $doctor->mobile = $request->mobile;
        }

        if($doctor->save()){
            return response()->json([
                'message' => 'Doctor updated successfully',
                'data' => $doctor
            ]);
        }else{
            return response()->json([
                'message' => 'Doctor updating!'
            ]);
        }
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::find($id);

        if($doctor->delete()){
            return response()->json([
                'message' => 'Doctor Deleted Successfully!'
            ]);

            return new DoctorResource($doctor);
        }
    }
}
