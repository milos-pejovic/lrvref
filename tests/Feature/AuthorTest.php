<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorTest extends TestCase
{
    
    use WithFaker, DatabaseTransactions;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIfAuthorCreationWorks()
    {
        $attributes = [
          'first_name' => $this->faker->name,
          'last_name' => $this->faker->name,
          'about' => $this->faker->paragraph
        ];
        
        $this->post('/authors/store', $attributes);
        
        $this->assertDatabaseHas('authors', $attributes);
        
    }
}
