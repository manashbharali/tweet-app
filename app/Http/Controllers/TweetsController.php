<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function create(){
        return view('tweet.create');
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
