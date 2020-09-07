<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllUsers()
    {
        $users = User::all();
        return response()->json([
            'data'=> UserResource::collection($users)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUser($id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }
        return response()->json([
            'message' => 'User found',
            'data' => new UserResource($user)
        ]);
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        if($request->title) {
            $user->title = $request->title;
        }
        if($request->first_name) {
            $user->first_name = $request->first_name;
        }
        if($request->last_name) {
            $user->last_name = $request->last_name;
        }
        if($request->email) {
            $user->email = $request->email;
        }
        if($request->password) {
            $user->password = $request->password;
        }
        if($request->office_telephone) {
            $user->office_telephone = $request->office_telephone;
        }
        if($request->mobile_number) {
            $user->mobile_number = $request->mobile_number;
        }
        if($request->permission) {
            $user->permission = $request->permission;
        }

        if($user->save()){
            return response()->json([
                'message' => 'User updated successfully',
                'data' => $user
            ]);
        }else{
            return response()->json([
                'message' => 'Error updating!'
            ]);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id)
    {
        $user = User::find($id);

        if($user->delete()){
            return response()->json([
                'message' => 'User Deleted Successfully!'
            ]);
            return new UserResource($user);
        }
    }
}
