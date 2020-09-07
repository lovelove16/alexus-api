<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Probe;
use App\Http\Resources\Probe as ProbeResource;

class ProbeController extends Controller
{

    public function getAllProbes()
    {
        $probe = Probe::all();
        return response()->json([
            'data'=> ProbeResource::collection($probe)
        ]);
    }

    public function AddProbe(Request $request)
    {
        $probe = new Probe([
            "reference" => $request->reference,
            "active" => $request->active
        ]);

        if($probe->save()) {
            return response()->json([
                "message" => "Probe successfully added"
            ]);
        }
    }

    public function getSingleProbe(Request $request, $id)
    {

        $probe = Probe::find($id);
        if(!$probe){
            return response()->json([
                'message' => 'Probe not found',
            ], 404);
        }
        return response()->json([
            'message' => 'Probe found',
            'data' => new ProbeResource($probe)
        ]);
        
    }

    public function updateProbe(Request $request, $id)
    {
        $probe = Probe::find($id);
        if(!$probe){
            return response()->json([
                'message' => 'Probe not found',
            ], 404);
        }

        if($request->reference) {
            $probe->reference = $request->reference;
        }
        if($request->active) {
            $probe->active = $request->active;
        }

        if($probe->save()){
            return response()->json([
                'message' => 'Probe updated successfully',
                'data' => $probe
            ]);
        }else{
            return response()->json([
                'message' => 'Error updating!'
            ]);
        }
    }

    public function deleteProbe($id)
    {
        $probe = Probe::find($id);

        if($probe->delete()){
            return response()->json([
                'message' => 'Probe Deleted Successfully!'
            ]);

            return new ProbeResource($probe);
        }
    }
}
