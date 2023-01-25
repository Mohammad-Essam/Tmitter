<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('LoginOrCreateUser');
    }

    public function index()
    {
        $user = auth()->user();
        $tweets = collect($user->tweets);
        foreach ($user->following as $followed) {
            $tweets = $tweets->merge($followed->tweets);
        }
            return view('index',['tweets' => $tweets->sortBy('created_at')]);
    }

    public function like(Tweet $tweet)
    {
        $user = auth()->user();
        if($user)
        {
            $success = $user->like($tweet);
            return response($success,$success?201:200);
        }
    }

    public function unlike(Tweet $tweet)
    {
        $user = auth()->user();
        if($user)
        {
            $success = $user->unlike($tweet);
            return response($success,$success?201:200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return "tell me what you whant? \n what you really really want.";
        // dd($request);
        // dd($request);
        $tweet = auth()->user()->tweet($request->tweet);
        return view('components.tweet',['tweet' => $tweet]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
