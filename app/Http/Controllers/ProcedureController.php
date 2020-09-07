<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Procedure;
use App\Http\Resources\Procedure as ProcedureResource;

class ProcedureController extends Controller
{

    public function getAllProcedures()
    {
        $procedures = Procedure::all();
        return response()->json([
            'data'=> ProcedureResource::collection($procedures)
        ]);
    }

    public function addProcedure(Request $request)
    {
        $procedure = new Procedure([
            'procedure_type' => $request->procedure_type,
            'description' => $request->description,
            'time_required' => $request->time_required,
            'status' => $request->status
        ]);
        if(($procedure)->save()){
            return response()->json([
                "message" => "Procedure successfully added"
            ]);
        }
    }


    public function getSingleProcedure(Request $request, $id)
    {
        $procedure = Procedure::find($id);
        if(!$procedure){
            return response()->json([
                'message' => 'Procedure not found',
            ], 404);
        }
        return response()->json([
            'message' => 'Procedure found',
            'data' => new ProcedureResource($procedure)
        ]);
    }

    public function updateProcedure(Request $request, $id)
    {
        $procedure = Procedure::find($id);
        if(!$procedure){
            return response()->json([
                'message' => 'Procedure not found',
            ], 404);
        }

        if($request->procedure_type) {
            $procedure->procedure_type = $request->procedure_type;
        }

        if($request->description) {
            $procedure->description = $request->description;
        }

        if($request->time_required){
            $procedure->time_required = $request->time_required;
        }
        if($request->status){
            $procedure->status = $request->status;
        }

        if(($procedure)->save()){
            return response()->json([
                'message' => 'Procedure updated successfully',
                'data' => $procedure
            ]);
        }else{
            return response()->json([
                'message' => 'Error updating!'
            ]);
        }


    }

    public function destroyProcedure($id)
    {
        $procedure = Procedure::find($id);

        if($procedure->delete()){
            return response()->json([
                'message' => 'Probe Deleted Successfully!'
            ]);

            return new ProcedureResource($procedure);
        }
    }
}
