<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validData = $this->validate($request, [
            'username' => 'required|exists:users',
            'password' => 'required'
        ]);


        if(! auth()->attempt($validData))
        {
            return response([
              'data' => 'information invalid',
              'status' => 'error'
            ],403);
        }

        auth()->user()->tokens()->delete();
        $token =  auth()->user()->createToken('Api token on Android')->accessToken;

        return new UserResource(auth()->user() , $token);

    }

    public function register(Request $request)
    {
        $validData = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'username' => 'required|string|min:6',
        ]);


        $user =  User::create([
            'name' => $validData['name'],
            'email' => $validData['email'],
            'username' => $validData['username'],
            'password' => bcrypt($validData['password']),

        ]);

        return new UserResource($user);
    }
}
