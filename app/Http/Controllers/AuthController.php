<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request) {

        $fields = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'phone' => 'required|string'


        ]);
        $user = User::create([
            'firstname' => $fields['firstname'],
            'lastname' => $fields['lastname'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'phone' => $fields['phone']
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }
   public function logout(Request $request)
  {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            // 'firstname' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'

        ]);

        //check email
        $user = User::where('email', $fields['email'])->first();

        //Check password
        if(!$user || !Hash::check($fields['password'], $user->password))
        {
            return response([
                'message' => 'Incorrect Login/Password'
            ], 401);
        }


        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}
