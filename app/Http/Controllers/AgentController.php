<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{

    public function login(Request $request)
    {

        $attrs = $request->validate([
            'password' => 'required|string',
            'email' => 'required|string',

        ]);

        $user = User::where('email', $attrs['email'])->first();

        if ($user != null) {

            if (!Auth::attempt($attrs)) {
                return response([
                    'message' => 'Invalid Credentials'
                ], 403);
            }

            return response([
                'data' => $user,
                'token' => auth()->user()->createToken('secret')->plainTextToken
            ], 200);
        }

        return response([
            'message' => 'Invalid credentials.'
        ], 403);
    }






    public function register(Request $request)
    {

        $attrs = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'commune' => 'required|string',
            'gender' => 'required|string',
            'type' => 'required|string',


        ]);


        $user = User::create([

            'name' => $attrs['name'],
            'email'  => $attrs['email'],
            'password'  => bcrypt($attrs['password']),
            'phone'  => $attrs['phone'],
            'longitude' => $attrs['longitude'],
            'latitude'  => $attrs['latitude'],
            'commune'  => $attrs['commune'],
            'gender'  => $attrs['gender'],
            'notification_id'  => $request->notification_id,
            'type'=> $attrs['type']

        ]);


        return response([
            'data' => $user,
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ], 200);
    }



    public function getProfile(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'id' => 'required|string',
        ]);

        $user = User::where('id', $attrs['id'])->first();


        return response([
            'data' => $user,

        ], 200);
    }

    public function logout(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'id' => 'required|string',
            'token_id' => 'string'
        ]);

        $user = User::where('id', $attrs['id'])->first();

        $user->tokens()->where('id', $attrs['token_id'])->delete();

        return response([
            'data' => $user
        ], 200);
    }



}
