<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetsControllers extends Controller
{
    
    public function store(){
        Tweet::create($this->validateRequest());
    }

    public function update(Tweet $tweet){
		$tweet->update($this->validateRequest());
    }

    public function validateRequest()
    {
        return request()->validate([
            'tweet_title' =>'required|string',
            'tweet_body' =>'required|string',
            'tweet_author' => 'required',
        ]);
    }

}
