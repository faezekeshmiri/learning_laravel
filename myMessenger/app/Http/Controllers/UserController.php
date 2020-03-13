<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

class UserController extends Controller
{
   public function create(Request $request ){
	   $u = new User();
	   $u->user_name = $request->input('user_name');
	   $u->phone_number = $request->input('phone_number');
	   $u->password = $request->input('password');
	   $u->bio = $request->input('bio');
	   
	   $u->save();
	   return response()->json($u);
   }

   public function register(Request $request){
	$validator = Validator::make($request->all(), [
		'phone_number' => 'required|min:11|numeric',
		'user_name' => 'required',
		'password'=> 'required|min:6'
	]);
	if ($validator->fails()){
		return response()->json($validator->messages());
	}
	
	$user = new User();
	$user->user_name = $request->get('user_name');
	$user->phone_number = $request->get('phone_number');
	$user->password = bcrypt($request->get('password'));
	$user->bio = null;
	User::create([
	'user_name' => $request->get('user_name'),
	'phone_number' => $request->get('phone_number'),
	'password' => bcrypt($request->get('password')),
	]);
	$token = JWTAuth::fromUser($user);
	return response()->json(compact('token'));
   }

   public function login(Request $request){
	$validator = Validator::make($request->all(), [
		'phone_number' => 'required|min:11|numeric',
		'password'=> 'required|min:6'
	]);
	if ($validator->fails()){
		return response()->json($validator->messages());
	}
	$credentials = $request->only('phone_number','password');
	if (! $token = JWTAuth::attempt($credentials)) {
		return Response::json(['error' => 'invalid_credentials'], 401);
	}
	return response()->json(compact('token'));
   }



}
