<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Http\Resources\Hospital as HospitalResource;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();
        return response()->json([
            'data'=> HospitalResource::collection($hospitals)
        ]);
    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required | string'
        ]);

        $hospital = new Hospital([
            "code" => $request->code,
            "name" => $request->name,
            "office_address" => $request->office_address,
            "office_address_2" => $request->office_address_2,
            "office_suburb" => $request->office_suburb,
            "office_state" => $request->office_state,
            "postal_address" => $request->postal_address,
            "postal_address_2" => $request->postal_address_2,
            "postal_suburb" => $request->postal_suburb,
            "postal_state" => $request->postal_state,
            "office_telephone" => $request->office_telephone,
            "office_telephone_2" => $request->office_telephone_2,
            "office_facsmile" => $request->office_facsmile,
            "office_email" => $request->office_email,
            "contact_title" => $request->contact_title,
            "contact_first_name" => $request->contact_first_name,
            "contact_last_name" => $request->contact_last_name,
            "contact_mobile" => $request->contact_mobile,
            "contact_telephone" => $request->contact_telephone,
            "contact_facsmile" => $request->contact_facsmile,
            "website"=> $request->website,
            "num_rooms" => $request->num_rooms,
            "status" => $request->status   
        ]);

        if($hospital->save()) {
            return response()->json([
                "message" => "Hospital successfully added"
            ]);
        }
    }

    public function show(Request $request, $id)
    {
        //Get the hospital using ID
        $hospital = Hospital::find($id);
        if(!$hospital){
            return response()->json([
                'message' => 'Hospital not found',
            ], 404);
        }
        return response()->json([
            'message' => 'Hospital found',
            'data' => new HospitalResource($hospital)
        ]);
        
    

    }

    public function update(Request $request, $id)
    {
        $hospital = Hospital::find($id);
        if(!$hospital) {
            return response()->json([
                'message' => 'Hospital not found',
            ], 404);
        }
        if($request->code) {
            $hospital->code = $request->code;
        }
        if($request->name) {
            $hospital->name = $request->name;
        }
        if($request->office_address) {
            $hospital->office_address = $request->office_address;
        }
        if($request->office_address_2) {
            $hospital->office_address_2 = $request->office_address_2;
        }
        if($request->office_suburb) {
            $hospital->office_suburb = $request->office_suburb;
        }
        if($request->office_state) {
            $hospital->office_state = $request->office_state;
        }
        if($request->postal_address) {
            $hospital->postal_address = $request->postal_address;
        }
        if($request->postal_address_2) {
            $hospital->postal_address_2 = $request->postal_address_2;
        }
        if($request->postal_suburb) {
            $hospital->postal_suburb = $request->postal_suburb;
        }
        if($request->postal_state) {
            $hospital->postal_state = $request->postal_state;
        }
        if($request->office_telephone_2) {
            $hospital->office_telephone = $request->office_telephone_2;
        }
        if($request->office_facsmile) {
            $hospital->office_facsmile = $request->office_facsmile;
        }   
        if($request->office_email) {
            $hospital->office_email = $request->office_email;
        }
        if($request->contact_title) {
            $hospital->contact_title = $request->contact_title;
        }   
        if($request->contact_first_name) {
            $hospital->contact_first_name = $request->contact_first_name;
        }
        if($request->contact_last_name) {
            $hospital->contact_last_name = $request->contact_last_name;
        }
        if($request->contact_mobile) {
            $hospital->contact_mobile = $request->contact_mobile;
        }
        if($request->contact_telephone) {
            $hospital->contact_telephone = $request->contact_telephone;
        }
        if($request->contact_facsmile) {
            $hospital->contact_facsmile = $request->contact_facsmile;
        }
        if($request->website) {
            $hospital->website = $request->website;
        }
        if($request->num_rooms) {
            $hospital->num_rooms = $request->num_rooms;
        }
        if($request->status) {
            $hospital->status = $request->status;
        }
        
        if($hospital->save()){
            return response()->json([
                'message' => 'Hospital updated successfully',
                'data' => $hospital
            ]);
        }else{
            return response()->json([
                'message' => 'Error updating!'
            ]);
        }
        
        

    }

    public function destroy($id)
    {
        $hospital = Hospital::find($id);

        if($hospital->delete()){
            return response()->json([
                'message' => 'Hospital Deleted Successfully!'
            ]);
            return new HospitalResource($hospital);
        }
    }
}
