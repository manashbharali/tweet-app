<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{   
    use RefreshDatabase;
	/** @test */ 
	public function only_logged_user_can_post_tweet()
	{
        $response = $this->get('/tweets/create')
        ->assertRedirect('/login');
    }
    
}
