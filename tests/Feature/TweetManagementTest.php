<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Tweet;

class TweetManagementTest extends TestCase
{	
	use RefreshDatabase;
	/** @test */ 
	public function a_tweet_can_be_added()
	{	
		// $this->withoutExceptionHandling();
		$response = $this->post('/tweets', [
			'tweet_title' => 'My first tweet',
			'tweet_body' => 'Yay! I can post whatever i want',
			'tweet_author' => 'John Doe',
		]);
		$tweet = Tweet::first();
		$this->assertCount(1, Tweet::all());
		$response->assertRedirect($tweet->path());
	}
	
	/** @test */
	public function a_tweet_title_is_required()
	{
		// $this->withoutExceptionHandling();
		$response = $this->post('/tweets', [
			'tweet_title' => '',
			'tweet_body' => 'Yay! I can post whatever i want',
			'tweet_author' => 'John Doe',
		]);
		$response->assertSessionHasErrors('tweet_title');
	}

		/** @test */
		public function a_tweet_body_is_required()
		{
			// $this->withoutExceptionHandling();
			$response = $this->post('/tweets', [
				'tweet_title' => 'My tweet tile',
				'tweet_body' => '',
				'tweet_author' => 'John Doe',
			]);
			$response->assertSessionHasErrors('tweet_body');
		}

		/** @test */
		public function a_tweet_author_is_required()
		{
			// $this->withoutExceptionHandling();
			$response = $this->post('/tweets', [
				'tweet_title' => 'My tweet tile',
				'tweet_body' => 'Yay! I can post whatever i want',
				'tweet_author' => '',
			]);
			$response->assertSessionHasErrors('tweet_author');
		}

		/** @test */ 
		public function a_tweet_can_be_updated()
		{	
			// $this->withoutExceptionHandling();
			$this->post('/tweets', [
				'tweet_title' => 'My first tweet',
				'tweet_body' => 'Yay! I can post whatever i want',
				'tweet_author' => 'John Doe',
			]);
			$tweet = Tweet::first();
			$response = $this->patch($tweet->path(), [
				'tweet_title' => 'First tweet',
				'tweet_body' => 'I can post whatever i want',
				'tweet_author' => 'John Doe',
			]);
			$this->assertEquals('First tweet', Tweet::first()->tweet_title);
			$this->assertEquals('I can post whatever i want', Tweet::first()->tweet_body);
			$this->assertEquals('John Doe', Tweet::first()->tweet_author);
			$response->assertRedirect($tweet->path());
		}

		/** @test */ 
		public function a_tweet_can_be_deleted()
		{	
			// $this->withoutExceptionHandling();
			$this->post('/tweets', [
				'tweet_title' => 'My first tweet',
				'tweet_body' => 'Yay! I can post whatever i want',
				'tweet_author' => 'John Doe',
			]);
			$tweet = Tweet::first();
			$response = $this->delete('/tweets/'. $tweet->id);
			$this->assertCount(0, Tweet::all());
			$response->assertRedirect('/tweets');
		}

}
