<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class Authentication extends Controller
{
    //
    public function __construct() {
        $this->middleware('EnsureTokenIsValid')->only('updateAvatar');
    }

    public function update(Request $r)
    {
    }

    public function register(Request $r)
    {
        $r->validate(['username' => 'required|min:3|max:20|string|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|between:10,25',
        'profile_id' =>'required|unique:users,profile_id',
    ]);
        $password = bcrypt($r->password);

        $user = User::create(['username'=>$r->username,
                'password' =>$password,
                'email' => $r->email,
                'profile_id' => $r->profile_id,
            ]);

        if($r->hasFile('avatar'))
        {
            $path = $r->file('avatar')->store('avatars','public');
            $user->avatar = $path;
            $user->save();
        }
        return $user;
    }

    public function login(Request $r){

        $r->validate([ 'email' => 'required',
                      'password' =>'required'
      ]);

        $user = User::where('email',$r->email)->first();
		if($user)
        $password = Hash::check($r->password, $user->password);

        if($user && $password){
           $user->api_token = Str::random(100) ;
           $user->save();
           return response()->json(['success' => true, "api_token"=>$user->api_token],201);
        }
        else
           return response()->json(['success' => false, 'message' => 'invalid email or password'], 401);
    }

    public function logout(Request $r){

        $user = User::where('api_token',$r->bearerToken())->first();
        if($user){
            $user->api_token ="";
            $user->save();
            return response()->json(['success'=>true,'message' =>'logout successfuly'] , 200);
        }
		return response()->json(['message' => 'you are not logged in'],200);
    }

    public  function updateAvatar(Request $request)
    {
        $flag = false;
        $user = $request->user();
        if($request->has('avatar'))
        {
            $request->validate(['avatar' => 'required|mimes:jpg,bmp,png,gif,jpeg']);
            $path = $request->file('avatar')->store('avatars','public');
            $user->avatar = $path;
            $flag = true;
        }
        if($request->has('password'))
        {
            $password = bcrypt($request->password);
            $user->password = $password;
            $flag = true;
        }
        if($flag)
        {
            $user->save();
            return response()->json(['success'=>true,'message' => "profile iformation has been updated"],201);
        }
        else
            return response()->json(['success'=>true,'message' => "there is no change to be updated"],200);

    }

}
