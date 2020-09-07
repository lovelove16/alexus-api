<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HospitalRoom;
use App\Http\Resources\HospitalRoom as HospitalRoomResource;

class HospitalRoomController extends Controller
{
    public function getHospitalRooms()
    {
        $hopitalRooms = HospitalRoom::all();
        return response()->json([
            'data'=> HospitalRoomResource::collection($hopitalRooms)
        ]);
    }

    public function addHospitalRoom(Request $request)
    {
        $hospitalRoom = new HospitalRoom([
            'hospital_id' => $request->hospital_id,
            'room_name' => $request->room_name,
            'status' => $request->status
        ]);

        if(($hospitalRoom)->save()){
            return response()->json([
                "message" => "Hospital Rooms successfully added"
            ]);
        }
    }

    public function getSingleHospRoom(Request $request, $id)
    {
        $hospitalRoom = HospitalRoom::find($id);
        if(!$hospitalRoom){
            return response()->json([
                'message' => 'Hospital Room not found',
            ], 404);
        }
        return response()->json([
            'message' => 'Hospital Room found',
            'data' => new HospitalRoomResource($hospitalRoom)
        ]);
        
    }

    public function updateHospitalRoom(Request $request, $id)
    {
        $hospitalRoom = HospitalRoom::find($id);
        if(!$hospitalRoom){
            return response()->json([
                'message' => 'Hospital Room not found',
            ], 404);
        }

        if($request->hospital_id) {
            $hospitalRoom->hospital_id = $request->hospital_id;
        }
        if($request->room_name) {
            $hospitalRoom->room_name = $request->room_name;
        }
        if($request->status) {
            $hospitalRoom->status = $request->status;
        }

        if($hospitalRoom->save()){
            return response()->json([
                'message' => 'Hospital Room updated successfully',
                'data' => $hospitalRoom
            ]);
        }else{
            return response()->json([
                'message' => 'Error updating!'
            ]);
        }
    }

    public function deleteHospitalRoom($id)
    {
        $hospitalRoom = HospitalRoom::find($id);
        if($hospitalRoom->delete()){
            return response()->json([
                'message' => 'Hospital Room Deleted Successfully!'
            ]);

            return new HospitalRoomResource($hospitalRoom);
        }
    }
}
