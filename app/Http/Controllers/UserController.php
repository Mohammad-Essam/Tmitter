<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserInfo()
    {
        return [auth()->user(),['session' => session()->all()]];
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $credential = $r->validate(['username' => 'required|min:3|max:20|string|unique:users',
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($profile_id)
    {
        //eager loading the tweets
        $user = User::where('profile_id',$profile_id)->with("tweets")->first();
        return view('profile',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function follow(User $user)
    {
        auth()->user()->follow($user);
        return redirect('/');
    }

    public function unfollow(User $user)
    {
        auth()->user()->unfollow($user);
        return redirect('/');
    }
}
