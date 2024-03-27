<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user  = $request->all();
        // dd($request);
        $us = User::create($user);
        return response()->json([
            "msg" => "user added successfully !",
            "data" => $us,
        ], 201);
    }

    public function delete(User $user)
    {
        $id = $user->id;
        $us = User::find($id);
        // dd($id);
        $us->delete();
        return response()->json([
            "msg" => "user deleted !"
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        // dd($request);
        $id = $user->id;

        $user = User::find($id);

        if (!$user) {
            return response()->json([
                "message" => "user not found"
            ], 404);
        }

        $user->update($data);

        return response()->json([
            "message" => "User updated successfully",
            "user" => $user
        ]);
    }
}
