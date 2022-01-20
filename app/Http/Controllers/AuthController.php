<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    public function register(Request $request)
    {
        /*$data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);*/

        $user = User::where('email', $request->email)->first();


        if (!$user) {
            Log::alert($request);
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'firstname' => $request->firstName,
                'lastname' => $request->lastName,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'city' => $request->city,
                'country' => $request->country,
                'birthdate' => $request->birth,
                'love_item' => $request->loveItem,
                'like_item' => $request->likeItem,
                'hate_item' => $request->hateItem
            ]);
            $response = [
                'message' => 'ok',
            ];
            return $response;
        } else {
            $response = [
                'message' => 'Cet email est déjà utilisé...',
            ];
            return $response;
        }
    }
}
