<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;

class UserController extends Controller
{
    public function register(Request $request) {

		$data['name'] = $request->name;
		$data['email'] = $request->email;	
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);
        
        return response(['user'=> $user]);
        
    }

    public function login(Request $request) {

    	$loginData = $request->only(['email','password']);
    	
        try {
            if (!$token = JWTAuth::attempt($loginData)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function logout(Request $request) {
        
    	JWTAuth::invalidate(JWTAuth::parseToken());
		return \Response::json(['message' => 'Successfully logged out!'], 200);
    	
    }
}
