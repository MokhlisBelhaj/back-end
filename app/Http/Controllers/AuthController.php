<?php

namespace App\Http\Controllers;

use App\Models\regions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'description' => 'nullable|string',
        'phone' => 'required|string|min:10',
        'adresse' => 'required|string|max:255',
        'image' => 'required',
        'regions'=>'required'
    ]);

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'description' => $validatedData['description'],
        'phone' => $validatedData['phone'],
        'adresse' => $validatedData['adresse'],
        'image'=>$validatedData['image'],
        'region_id'=>$validatedData['regions']

    ]);

    // Save the uploaded image to a specific directory
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $path = 'C:\Users\YC\Desktop\TheaMaroc\TheaMaroc-1\src\assets\img';
        $filename = $image->getClientOriginalName();
        $image->move($path, $filename);
        $user->image =$filename;
        $user->save();
    }

    $token = $user->createToken('Token Name')->plainTextToken;

    return response()->json(['token' => $token], 200);
}
public function getUsersByRegion($region_id)
{
    $users = User::where('region_id', $region_id)->get();

    return response()->json(['users' => $users]);
}
public function getUsers()
{
    $users = User::where('role',1)->get();

    return response()->json(['users' => $users]);
}


public function login(Request $request)
{
    // Get the user by email
    $user = User::where('email', $request->input('email'))->first();

    // Check if the user exists and is validated
    if (!$user || is_null($user->is_validated)) {
        return response()->json(['message' => 'Ton compte n\'est pas encore validé'], 401);
    } elseif ($user->is_validated == false) {
        return response()->json(['message' => 'Ton compte a été rejeté'], 401);
    } elseif ($user->is_validated == true) {
        // Attempt to authenticate the user
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Identifiants de connexion invalides'], 401);
        }

        // Generate a personal access token for the authenticated user
        $token = $user->createToken('MyAppToken')->plainTextToken;

        // Return the user details along with the access token
        return response()->json([
            'access_token' => $token,
            'user' => [
                'id'=> $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'image' => $user->image,
                'description' => $user->description,
                'phone' => $user->phone,
                'adresse' => $user->adresse,
                'role' => $user->role
            ]
        ]);
    }
}


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Token revoked'], 200);
    }
}
