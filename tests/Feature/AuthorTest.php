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
//        $attributes = [
//          'first_name' => $this->faker->name,
//          'last_name' => $this->faker->name,
//          'about' => $this->faker->paragraph
//        ];
//        
//        $this->post('/authors/store', $attributes);
//        
//        $this->assertDatabaseHas('authors', $attributes);
        
        $params = [
          'first_name' => $this->faker->name,
          'last_name' => $this->faker->name,
          'about' => $this->faker->paragraph
        ];
        
//        $params = [
//          'first_name' => 'Peter',
//          'last_name' => 'Peterson',
//          'about' => 'Lorem ipsum'
//        ];
        
        factory(\App\Author::class, 2)->create()->each(function($a) {
            for ($i = 0; $i < 3; $i++) {
                $a->books()->save(factory(\App\Book::class)->make());
            }
        });
        
//        $this->assertDatabaseHas('authors', $params);
        
    }
        
    
}
