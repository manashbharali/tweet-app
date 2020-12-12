<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $tweets =  Tweet::orderBy('created_at', 'DESC')->get();
        return view('tweet.index')->with('tweets', $tweets);
    }
    
    public function create(){
        // return Tweet::all();
        return view('tweet.create');
    }

    public function edit(){
        return view('tweet.edit');
    }

    public function view($id){
        $tweet =  Tweet::find($id);
        return view('tweet.view')->with('tweet', $tweet);
    }

    public function store(){
        $tweet = Tweet::create($this->validateRequest());
        return redirect($tweet->path());
    }

    public function update(Tweet $tweet){
        $tweet->update($this->validateRequest());
        return redirect($tweet->path());
    }

    public function destroy(Tweet $tweet){
        $tweet->delete();
        return redirect('/tweets');
    }

    public function validateRequest()
    {
        return request()->validate([
            'tweet_title' =>'required|string',
            'tweet_body' =>'required|string',
            'tweet_user' => 'required',
        ]);
    }

}
