<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Models\Tweet;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hashtags=  Hashtag::withCount('tweets')->orderBy('tweets_count','desc')->orderBy('created_at')->limit(5)->get();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hashtag = "#".$id;
        $hashtagModel = Hashtag::findOrFail($hashtag);
        $tweets = $hashtagModel->tweets;
        
        //this didn't work fortunatly
        //if it worked then the whole web app is vulnerable to stored xss lol
        // $tweets->map(
        //     function ($tweet) use ($hashtag)
        //     {
        //         $text = str_replace($hashtag, "<strong>$hashtag</strong>",$tweet->text);
        //         $tweet->text = $text;
        //         return $tweet;
        //     }
        // );
        return view('index',['tweets' => $tweets]);
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
