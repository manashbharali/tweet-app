<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Author;


class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
    /** @test */ 
    public function an_author_can_be_created()
    {
		$this->withoutExceptionHandling();
        $this->post('/authors', [
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'bio' => 'Im a writer',
        ]);
        $this->assertCount(1, Author::all());
    }

}
