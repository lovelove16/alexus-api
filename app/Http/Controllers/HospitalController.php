<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Http\Resources\Hospital as HospitalResource;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return response()->json([
            'data'=> HospitalResource::collection($hospitals)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hospital = $request->isMethod('put') ? Hospital::findOrFail
        ($request->id) : new Article;

        $request->code = $request->input('code');
        $request->name = $request->input('name');

        if($hospital->save()){
            return new HospitalResource($hospital);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get the hospital using ID
        $hospital = Hospital::findOrFail($id);
        return new HospitalResource($hospital);

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
        $hospital = Hospital::findOrFail($id);

        if($hospital->delete()){
            return new HospitalResource($hospital);
        }
    }
}
